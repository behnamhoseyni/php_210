<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();


class SuperAdminController extends Controller
{
    //

    public static function AdminAuthCheck()
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
