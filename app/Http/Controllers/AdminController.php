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
        if($findCustomer)
        {
            $findCustomer->approved = 1;
            $findCustomer->update();
            if($findCustomer)
            {
                return redirect()->back()->with('success', 'Customer Approved');
            }
        }
    }

    public function reject($id)
    {

        $findCustomer = Customer::find($id);
        if($findCustomer)
        {
            $findCustomer->approved = 2;
            $findCustomer->update();
            if($findCustomer)
            {
                return redirect()->back()->with('success', 'Customer Rejectd');
            }
        }
    }


    public function edit($id)
    {
        $findCustomer = Customer::find($id);
        return view('Admin.customeredit' , compact('findCustomer'));
    }

    public function editSubmit(request $request , $id)
    {
        $findCustomer = Customer::find($id);
        if($findCustomer)
        {
            $findCustomer->name = $request->input('name');
            $findCustomer->email = $request->input('email');
            $findCustomer->contact = $request->input('contact');
            $findCustomer->update();
            if($findCustomer)
            {
                return redirect()->route('admin.customerlist')->with('success', 'Customer details successfully updated');
            }
            else
            {
                return redirect()->back()->with('error', 'Customer details not updated');
            }
        }
    }



}
