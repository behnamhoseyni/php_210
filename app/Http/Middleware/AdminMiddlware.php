<?php

namespace Admin\App\Http\Middleware;
session_start();

use Closure;

class AdminMiddlware
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
        $admin_auth_email = Session::get('admin_email');
        if ($admin_auth_email) {
           return;
        }else
        {
            session::put('msg','for access here you must login first ');
            return Redirect::to('/admin')->send();
        }
    }
}
