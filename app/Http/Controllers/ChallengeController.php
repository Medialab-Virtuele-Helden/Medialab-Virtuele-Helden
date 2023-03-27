<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Challenge;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $challenges = Challenge::all();
        return view ('challenges.index')->compact('challenges');
    }
    public function create(): View
    {
        if (Auth::check()) {
        return view('challenge.create');
        }
        abort(401);
    }

    public function store(Request $request): RedirectResponse
    {
        // $validated = $request->validate([
            //information
        // ]);
        $input = $request->all();
        Challenge::create($input);
        return redirect('challenge')->with('flash_message', 'Challenge Added!');
    }

    public function show(string $id): View
    {
        $challenge = Challenge::findOrFail($id);
        return view('challenges.show')->with('challenges', $challenge);
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
