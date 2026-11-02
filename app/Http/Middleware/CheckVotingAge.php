<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVotingAge
{
    /**
     * Handle an incoming request.
     *
     * Check session for verified voter (age >= 18).
     * If not verified, redirect to home with error message.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->get('age_verified') || $request->session()->get('voter_age') < 18) {
            return redirect()->route('home')->with('error', 'You must be 18 or older to vote.');
        }

        return $next($request);
    }
}
