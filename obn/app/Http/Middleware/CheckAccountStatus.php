<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('user')->check() && (Auth::guard('user')->user()->account_status == 'Verified' || Auth::guard('user')->user()->account_status == 'verified') && Auth::guard('user')->user()->tax_status == 'inactive') {
			return $next($request);
		}
		
		return redirect('/user/account/status');
        
    }
}
