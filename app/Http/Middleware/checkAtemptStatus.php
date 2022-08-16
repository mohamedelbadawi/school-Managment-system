<?php

namespace App\Http\Middleware;

use App\Models\Atempt;
use Closure;
use Illuminate\Http\Request;

class checkAtemptStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (!Atempt::where('student_id', auth('student')->id())->where('quiz_id', $request->route()->parameter('quiz')->id)->count()) {
            return $next($request);
        } else {
            return redirect()->back()->with(['error' => 'you can\'t attempt this quiz ']);
        }
    }
}
