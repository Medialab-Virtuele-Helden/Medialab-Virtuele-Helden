<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

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

        if ($post->save()) {
            return redirect()->route('post.show', ['id' => $post->id])->with('status', 'Post has been created!');
        }

        return redirect()->route('post.create', ['post' => $post])->with('status', 'Something went wrong, try again.');
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
            return redirect()->route('post.edit', ['post' => $post])->with('status', 'Post has been edited!');
        }

        return redirect()->route('post.edit', ['post' => $post])->with('status', 'Something went wrong, try again.');
    }

    public function likePost(string $id) {
        // check post
        // add like
    }
}
