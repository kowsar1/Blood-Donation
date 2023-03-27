<?php

namespace App\Http\Controllers;

use App\Models\AcceptRequest;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class AcceptRequestController extends Controller
{
    public function accept($accept_id)
    {
        dd($accept_id);
       AcceptRequest::create([        
            'name' =>'name',
            "request_id"=> $accept_id,
            'user_id' => auth('customer')->user()->id,
            'status' => 'accepted',
            'User_name' => auth('customer')->user()->name
        ]);
        notify()->success('Thanks for your donation');

        return redirect()->route('home');
    
   
}
}
