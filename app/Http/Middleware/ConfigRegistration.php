<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class ConfigRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Config::get('my_config.registration_allowed')){
            if ($request->ajax()) {
                return response('Registration not allowed', 401);
            } else {
                return redirect('/')->withErrors('Registration is not allowed by admin.'    );
            }
        }
        return $next($request);
    }
}
