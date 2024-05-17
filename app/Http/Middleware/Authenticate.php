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
        if (!$request->expectsJson()) {
            // return route('admin.login');
            if ($_SERVER['REQUEST_URI'] == '/account/home') {
                return route('account.login');
            }
            if ($_SERVER['REQUEST_URI'] == '/admin/dashboard') {
                return route('admin.login');
            }
        }
    }
}
