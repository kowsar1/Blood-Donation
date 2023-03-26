<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function request(Request $request)
    { {
            // dd($request->all());
            //         $request->validate([
            //             'name' => 'required',
            //             'product_price' => 'required|numeric',
            //             'product_stock' => 'required|numeric',
            //             'category_id' => 'required',
            //             'phone'=>'regex:/^\\+?[1-9][0-9]{7,14}$/',

            // //            'image'=>'required|mimes:jpeg,jpg,png,gif'
            //             'image'=>'required'
            //         ]);

            // $fileName=null;
            // if($request->hasFile('image'))
            // {
            //     // generate name
            //     $fileName=date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storeAs('/uploads/',$fileName);
            // }


            ModelsRequest::create([
                'name' => $request->name,
                'user_id' => auth('customer')->user()->id,
                // 'image' => $fileName,
                'status' => 'Inactive',
                'blood' => $request->blood,
                'description' => $request->description,
                'mobile' => $request->phone,
                'address' => $request->address,
                'User_name' => auth('customer')->user()->name
            ]);
            notify()->success('Blood request create  successfully, Waiting for Admin Approval');

            return redirect()->route('home');
        }
    }
    public function bloodrequest()
    {
        if (\request()->ajax()) {
            $customers = ModelsRequest::all();
            return \Yajra\DataTables\Facades\DataTables::of($customers)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('request.update', $row->id) . '" class="edit btn btn-success btn-sm">Accept</a>
                        <a href="' . route('request.reject', $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.user.blood_request');
    }
    public function update($blood_id)
    {
        // dd('update');
        $approve = ModelsRequest::find($blood_id);

        $approve->update([
            'status' => 'active',
        ]);

        notify()->success('Request Varified');
        return redirect()->route('blood.request');
    }
    public function reject(int $sell_id)
    {
        $test = ModelsRequest::find($sell_id);
        if ($test) {
            $test->delete();
            notify()->success('Request  Rejected  successfully');
            return redirect()->route('blood.request');
        } else {
            notify()->error('Request not found');
            return redirect()->route('blood.request');
        }
    }
    public function checkrequest()
    {
        // dd('request');
        if (\request()->ajax()) {
            $users = ModelsRequest::where('status','active')->get();
            return \Yajra\DataTables\Facades\DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm">Accept</a>
                        <a href="" class="delete btn btn-danger btn-sm">Delete</a>
                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('frontend.pages.request_check');
    }
}
