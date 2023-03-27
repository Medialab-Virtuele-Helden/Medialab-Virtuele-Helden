<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use DateTime;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\View\View;

use App\Models\Challenge;


class ChallengeController extends Controller
{
    public function index(): View {
        $challenges = Challenge::all();

        return view('challenge.index', compact('challenges'));
    }

    public function show(string $id): View {
        $challenge = Challenge::findOrFail($id);

        return view('challenge.show', compact('challenge'));
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
            return redirect()->route('challenge.show', ['id' => $challenge->id])->with('status', 'Post has been created!');
        }
        return redirect()->route('challenge.create', ['challenge' => $challenge])->with('status', 'Something went wrong, try again.');
    }
 
    public function edit(string $id): View
    {
        if (Auth::check()) {
        $challenge = Challenge::findOrFail($id);
        return view('challenges.edit')->with('challenges', $challenge);
        }
        abort(401);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $challenge = Challenge::findOrFail($id);
        // $validated = $request->validate([
            //information
        // ]);
        $input = $request->all();
        $challenge->update($input);
        return redirect('challenge')->with('flash_message', 'challenge Updated!');  
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
}
