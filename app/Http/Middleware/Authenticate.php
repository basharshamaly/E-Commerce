<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                session()->flash('fail', 'you must login first');
                return route('admin.login');
            }
            if ($request->routeIs('seller.*')) {
                session()->flash('fail', 'you must login first');
                return route('seller.login');
            }
        }
    }
}
