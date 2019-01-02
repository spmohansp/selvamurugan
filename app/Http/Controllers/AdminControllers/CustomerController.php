<?php

namespace App\Http\Controllers\AdminControllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCustomer(){
        $Customers = Customer::orderBy('name')->get()->all();
        return view('admin.master.customer.view',compact('Customers'));
    }

    public function AddCustomer(){
        return view('admin.master.customer.add');
    }

    public function SaveCustomer(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|max:10|unique:customers',
            'address' => 'required',
            'gst' => 'required',
        ]);
        try {
            $Customer = new Customer;
            $Customer->name = request('name');
            $Customer->mobile = request('mobile');
            $Customer->address = request('address');
            $Customer->gst = request('gst');
            $Customer->save();
            return back()->with('success','Customer Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
