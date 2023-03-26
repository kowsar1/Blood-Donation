<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Webcontrol extends Controller
{
    public function webHome()
    {
        return view('frontend.pages.home');
    }

    public function registration_patient(Request $request)
    {
        // dd($request->all());
        Customer::create([
            'name' => $request->name,
            'email' => $request->customer_email,
            'password' => bcrypt($request->customer_password),
            'mobile' => $request->phone,
            'address' => $request->address,
            'blood' => $request->blood,
            'role' => 'Patient'
        ]);
        return redirect()->back();

        notify()->success('Patient Registration Success.');
    }
    public function registration_donar(Request $request)
    {
        //  dd($request->all());
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:customers',

            'dob' => 'required|date|before:2001-04-15'

        ]);
        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->customer_password),
            'mobile' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'blood' => $request->blood,
            'role' => 'Donar'
        ]);
        notify()->success('Donar Registration Success.');

        return redirect()->back();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->except('_token');
        if (auth('customer')->attempt($credentials)) {
            notify()->success('Login success');
            return redirect()->back();
        }
        notify()->error('invalid password');
        return redirect()->back();
    }
    public function customer_logout()
    {
        // dd('habijabi');
        auth('customer')->logout();
        notify()->success('Logout success');

        return redirect()->route('home');
    }
    public function profile()
    {
        // dd('profile');
        return view('frontend.profile');
    }
    public function updateProfile(Request $request)
    {
       //validation
    //    dd($request->all());

        $customer=Customer::find(auth('customer')->user()->id);
        $customer->update([
           'name'=>$request->name,
           'address'=>$request->address,
           'mobile'=>$request->phone,
        ]);

        notify()->success('User profile updated.');
        return redirect()->back();
    }
}
