<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

session_start();

class adminsController extends Controller
{
    protected $admin;
    protected $request; 
    protected $admin_email;
 

    
    public function __construct(Admin $admin)
    {
        $this->admin=$admin;
    }
    public function index()
    {

    }
   
    public function dashboard(Request $request)
    {
        if (session::get('admin_email') ) {

            return View ('admin.dashboard');
        }

        else
        { 

         $admin_email = $request->admin_email;
         $admin_password =$request->admin_password;

        $admins=$this->admin->all()
        ->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)
        ->first();
        if ($admins) {

                session::put('admin_name',$admins->admin_name);
                session::put('admin_id',$admins->admin_id);
                session::put('admin_email',$admins->admin_email);

                return redirect()->route('admins.dashboard');
            }

            else
            {
        
               session::put('msg','ایمیل یا رمز شما اشتباه هست ');
               return redirect()->route('admins.login');
            }

        
        }
    }
    public function login()
    {   
        return View ('admin.login');
    }

    public function destroy($id)
    {
        //
    }
}
