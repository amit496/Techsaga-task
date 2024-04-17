<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Auth;
class AdminController extends Controller
{
    public function adminDashboard()
    {
        if(Auth::guard('user')->check())
        {
            return view('Admin.dashboard');
        }

        return redirect()->route('customer.login');

    }

    public function customerList()
    {
        // dd(1);
        $customerList = Customer::all();
        return view('Admin.customerlist', compact('customerList'));
    }

    public function approved($id)
    {

        $findCustomer = Customer::find($id);
        $customerList = Customer::all();
        return view('Admin.customerlist', compact('customerList'));
    }



}
