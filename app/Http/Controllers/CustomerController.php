<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Session;

class CustomerController extends Controller
{
    public function customerDashboard()
    {

        if(Auth::guard('customer')->check())
        {
            return view('customer.dashboard');
        }

        return redirect()->route('customer.login');

    }




    public function customerProfile()
    {

    }


}
