<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class CheckReferral
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
        if ($request->hasCookie('referral')) {
            return $next($request);
        } else {
            if ($request->query('ref')) {
                Visitor::create([
                  'referred_by' => $request->query('ref'),
                ]);
                return redirect($request->fullUrl())->withCookie(cookie('referral', $request->query('ref'), 1440));
            }
        }
        return $next($request);
    }
}
