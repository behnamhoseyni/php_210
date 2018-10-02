<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Controllers\SuperAdminController;
use App\Models\customer;
use App\Http\Requests\CustomerRequest;

session_start();

class CustomerController extends Controller
{
    public function __construct(customer $customer)
    {
        $this->customer = $customer;
    }

    public function auth()
    {
        return View('pages.customer_auth');
    }

    public function register(CustomerRequest $request)

    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_tel'] = $request->customer_tel;
        $data['customer_password'] = $request->customer_password;

        $insertedId =$this->customer->insertGetId($data);

        session::put('customer_id', $insertedId);
        return redirect('/cart/checkout');
    }


    public function login(Request $request)
    {
        if( $resutl = $this->customer
            ->where('customer_email', $request->customer_email)
            ->where('customer_password', $request->customer_password)
            ->first());
            {

            session::put('customer_email', $resutl->customer_email);
            session::put('customer_name', $resutl->customer_name);
            session::put('customer_id', $resutl->customer_id);

            return redirect('/cart/checkout');
        }
    }


    public function logout()
    {
        if (session::get('customer_id')) {
            session::put('customer_id', null);
            session::put('customer_email', null);
            session::put('customer_name', null);

            return Redirect::to('/');
        }
    }
}
