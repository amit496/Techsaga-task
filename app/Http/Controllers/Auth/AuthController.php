<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use Session;
class AuthController extends Controller
{

    public function customerLogin()
    {
        return view('customer.Auth.login');
    }


    // Generate OTP
    public function generateOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mail' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
        }

        $otp = mt_rand(100000, 999999);
        $findMail = Customer::where('email', $request->input('mail'))->first();

        if ($findMail) {
            $findMail->otp = $otp;
            $findMail->save();

            return response()->json(['success' => true, 'otp' => $otp, 'message' => 'Please enter OTP number ' . $otp]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }
    }



    public function customerLoginSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
        $user = Customer::where('email', $request->email)->first();
        if ($user && $user->otp == $request->otp) {
            Auth::guard('customer')->login($user);
            Session::put('email', $request->email);
            return response()->json(['success' => true, 'message' => 'Login successful']);
        } else {
            return response()->json(['success' => false, 'errors' => ['Invalid credentials']]);
        }
    }


    public function customerRegister()
    {
        return view('customer.Auth.register');
    }

    public function customerRegisterSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255|unique:users,email|unique:customers,email',
            'contact' => 'required|numeric',
            'password' => 'required|string|min:6',
            'confirmpassword' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $customerRecord = new Customer();
        $customerRecord->name = $request->input('name');
        $customerRecord->email = $request->input('email');
        $customerRecord->contact = $request->input('contact');
        $customerRecord->password = Hash::make($request->input('password'));
        $customerRecord->save();

        if($customerRecord)
        {
            return response()->json(['success' => true, 'message' => 'Registration successful! You can now login.']);
        }
        else
        {
            return response()->json(['success' => false, 'errors' => 'Somthing wrong, please try again!'] );
        }
    }

    public function customerlogout()
    {

        Auth::logout();
        return redirect()->route('customer.login');
    }



    // Admin Authetication

    public function adminLogin()
    {
        return view('Admin.Auth.login');
    }

    public function adminLoginSubmit( Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::guard('user')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            Session::put('email', $request->email);
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->back()->ith('message', 'Username & Password is incorrect');
        }

    }

    public function adminlogout()
    {
        
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

