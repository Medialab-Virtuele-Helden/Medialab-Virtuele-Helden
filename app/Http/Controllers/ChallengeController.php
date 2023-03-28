<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use DateTime;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\View\View;

use App\Models\Challenge;
use App\Models\Post;


class ChallengeController extends Controller
{
    public function index(): View {
        $challenges = Challenge::all();

        return view('challenge.index', compact('challenges'));
    }

    public function show(string $id): View {
        $challenge = Challenge::findOrFail($id);

        $amountPosts = $this->countPostsWithinChallengePeriod($challenge);

        $progress = $amountPosts / $challenge->challenge_goal * 100;

        return view('challenge.show', compact('challenge', 'amountPosts', 'progress'));
    }

    public function create(): View {
        if (Auth::check()) {
            return view('challenge.create');
        }
        abort(401);
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'start-date' => 'required|date',
            'end-date' => 'required|date|after:start_date',
            'challenge-goal' => 'required|numeric',
            'reward' => 'required'
        ]);

        $organiser = Auth::id(); // Get current user id to store as organiser

        $today = new DateTime('now');
        $today->format('F-j-Y H:i:s');

        if ($validated['start-date'] < $today)
            $status = 0; // future
        else if ($validated['start-date'] > $today && $validated['start-date'] < $validated['end-date']) {
            $status = 1; // running
        } else if ($validated['end-date'] > $today) {
            $status = 2; // past
        }

        $challenge = new Challenge([
            'title' => $validated['title'],
            'organiser' => $organiser,
            'status' => $status,
            'content' => $validated['content'],
            'start_date' => $validated['start-date'],
            'end_date' => $validated['end-date'],
            'challenge_goal' => $validated['challenge-goal'],
            'reward' => $validated['reward']
        ]);

        if ($challenge->save()) {
            return redirect()->route('challenge.show', ['id' => $challenge->id])->with('status', 'Challenge has been created!');
        }
        return redirect()->route('challenge.create', ['challenge' => $challenge])->with('status', 'Something went wrong, try again.');
    }

    public function edit(string $id): View {
        if (Auth::check()) {
            $challenge = Challenge::findOrFail($id);
            return view('challenge.edit', compact('challenge'));
        }
        abort(401);
    }

    public function update(Request $request, string $id): RedirectResponse {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'start-date' => 'required|date',
            'end-date' => 'required|date|after:start_date',
            'challenge-goal' => 'required|numeric',
            'reward' => 'required'
        ]);

        $challenge = Challenge::findOrFail($id);

        $challenge->title = $validated['title'];
        $challenge->content = $validated['content'];
        $challenge->start_date = $validated['start-date'];
        $challenge->end_date = $validated['end-date'];
        $challenge->challenge_goal = $validated['challenge-goal'];
        $challenge->reward = $validated['reward'];

        if ($challenge->save()) {
            return redirect()->route('challenge.show', ['id' => $challenge->id])->with('status', 'Challenge has been edited!');
        }
        return redirect()->route('challenge.edit', ['challenge' => $challenge])->with('status', 'Something went wrong, try again.');
    }

    //Up for discussion
    /* public function destroy(string $id): RedirectResponse
    {
        if (Auth::check()) {
        Challenge::destroy($id);
        return redirect('challenge')->with('flash_message', 'Challenge deleted!');
        }
        abort(401);
    }
    */ 

    
    private function countPostsWithinChallengePeriod($challenge) {
        return Post::all()->whereBetween('created_at', [$challenge->start_date, $challenge->end_date])->count();
    }
}
