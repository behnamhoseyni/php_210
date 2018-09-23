<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function Admin()
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
