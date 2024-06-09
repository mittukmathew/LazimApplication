<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifySanctumToken
{
   
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::user() || ! $request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        return $next($request);
    }
}
