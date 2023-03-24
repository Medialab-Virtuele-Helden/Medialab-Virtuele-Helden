<?php

namespace App\Http\Controllers;

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
        return view ('challenges.index')->with('challenges', $challenges);
    }
    public function create(): View
    {
        return view('challenge.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Challenge::create($input);
        return redirect('challenge')->with('flash_message', 'Challenge Added!');
    }

    public function show(string $id): View
    {
        $challenge = Challenge::find($id);
        return view('challenges.show')->with('challenges', $challenge);
    }
 
    public function edit(string $id): View
    {
        $challenge = Challenge::find($id);
        return view('challenges.edit')->with('challenges', $challenge);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $challenge = Challenge::find($id);
        $input = $request->all();
        $challenge->update($input);
        return redirect('challenge')->with('flash_message', 'challenge Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        hallenge::destroy($id);
        return redirect('challenge')->with('flash_message', 'Challenge deleted!');
    }
}
