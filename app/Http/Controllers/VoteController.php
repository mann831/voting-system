<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Show the age verification form (home page).
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the name and age of each submitted vote.
     */
    public function submissions()
    {
        $votes = Vote::query()->latest()->get(['id', 'voter_name', 'age', 'candidate']);

        return view('submissions', compact('votes'));
    }

    /**
     * Delete a submitted vote.
     */
    public function destroy(Vote $vote)
    {
        $vote->delete();

        return redirect()->route('submissions')->with('success', 'Submission deleted.');
    }   

    /**
     * Validate the user's age.
     * If age >= 18, redirect to vote page with age and name in session.
     * If age < 18, redirect back with error.
     */
    public function checkAge(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
        ]);

        $age = (int) $request->input('age');
        $name = $request->input('name');

        if ($age >= 18) {
            $request->session()->put('voter_name', $name);
            $request->session()->put('voter_age', $age);
            $request->session()->put('age_verified', true);

            return redirect()->route('vote')->with('success', "Welcome, {$name}! You are eligible to vote.");
        }

        return redirect()->route('home')->with('error', 'You must be 18 or older to vote.');
    }

    /**
     * Show the voting form.
     * Only accessible if session has verified age >= 18.
     */
    public function showVotePage(Request $request)
    {
        if (!$request->session()->get('age_verified') || $request->session()->get('voter_age') < 18) {
            return redirect()->route('home')->with('error', 'You must verify your age before voting.');
        }

        $name = $request->session()->get('voter_name');
        $age = $request->session()->get('voter_age');

        return view('vote', compact('name', 'age'));
    }

    /**
     * Save the vote to the database and show success message.
     */
    public function submitVote(Request $request)
    {
        $request->validate([
            'candidate' => 'required|string|in:Candidate A,Candidate B,Candidate C',
        ]);

        $name = $request->session()->get('voter_name');
        $age = $request->session()->get('voter_age');

        if (!$name || !$age || $age < 18) {
            return redirect()->route('home')->with('error', 'Invalid session. Please verify your age again.');
        }

        $vote = Vote::create([
            'voter_name' => $name,
            'age' => $age,
            'candidate' => $request->input('candidate'),
        ]);

        // Clear voting session data
        $request->session()->forget(['voter_name', 'voter_age', 'age_verified']);

        return view('success', [
            'voterName' => $vote->voter_name,
            'candidate' => $vote->candidate,
        ]);
    }
}