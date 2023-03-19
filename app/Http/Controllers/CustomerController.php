<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function patient_list()
    {
        if(\request()->ajax())
        {
            $customers=Customer::where('role','Patient')->get();
            return \Yajra\DataTables\Facades\DataTables::of($customers)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.customer.patient_list');
    }
    public function donar_list()
    {
        if(\request()->ajax())
        {
            $customers=Customer::where('role','Donar')->get();
            return \Yajra\DataTables\Facades\DataTables::of($customers)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.customer.donar_list');
    }
}
