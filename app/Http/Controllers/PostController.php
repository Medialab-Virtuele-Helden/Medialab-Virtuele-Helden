<?php

namespace App\Http\Controllers;
use DateTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Challenge;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('post.posts', compact('posts'));
    }

    public function show(string $id) {
        $post = Post::findOrFail($id);
        return view('post.post', compact('post'));
    }

    public function create() {
        if (Auth::check()) {
            return view('post.create');
        }
        abort(401); // user is unathourized
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'content'=> 'required'
        ]);
        $author = Auth::id();

        $post = new Post([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $author
        ]);

        $x = $this->linkAuthorToChallenge($post);
        
        if ($post->save()) {
            return redirect()->route('post.show', ['id' => $post->id])->with('status', 'Post has been created!');
        }

        return redirect()->route('post.create', ['post' => $post])->with('status', $x);
    }

    public function edit(string $id) {
        $post = Post::findOrFail($id);

        if (Auth::check() && Auth::id() == $post->author) {
            return view('post.edit', compact('post'));
        }
        abort(401); // user is unathourized
    }

    public function update(string $id, Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'content'=> 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validated['title'];
        $post->content = $validated['content'];

        if ($post->save()) {
            return redirect()->route('post.show', ['id' => $post->id])->with('status', 'Post has been edited!');
        }

        return redirect()->route('post.edit', ['post' => $post])->with('status', 'Something went wrong, try again.');
    }

    private function linkAuthorToChallenge(Post $post) {
        $postDate = new DateTime($post->created_at);

        $activeChallenge = Challenge::where('status', '=', '1')->get()->first();
        $startDate = new DateTime($activeChallenge->start_date);
        $endDate = new DateTime($activeChallenge->end_date);

        $author = $post->user;

        if (
            $activeChallenge &&
            $postDate->getTimestamp() < $endDate->getTimestamp() &&
            $postDate->getTimestamp() > $startDate->getTimestamp() &&
            !$author->participated_challenges->contains($activeChallenge->id)
        ) {
            $author->participated_challenges()->attach($activeChallenge->id);
            return 'attached';
        }
    }
}
