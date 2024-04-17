<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;

class AdminController extends Controller
{
    public function adminDashboard()
    {

    }

    public function customerList()
    {
        // dd(1);
        $customerList = Customer::all();
        return view('Admin.customerlist', compact('customerList'));
    }
}
