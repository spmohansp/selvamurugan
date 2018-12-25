<?php

namespace App\Http\Controllers\AdminControllers;

use App\Customer;
use App\SubCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCustomerController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllSubCustomer(){
        return view('admin.master.subCustomer.view');
    }

    public function AddSubCustomer(){
        $Customers = Customer::get()->all();
        return view('admin.master.subCustomer.add',compact('Customers'));
    }

    public function getSubCustomerData(){
        $SubCustomers = SubCustomer::where('customer_id',request('Customer_id'))->get();
        $FinalDatas = '<select name="sub_customer_id" class="form-control" required> <option value="">Select Sub Customer</option>';
        if(!empty($SubCustomers)){
            foreach($SubCustomers as $SubCustomer){
                $FinalDatas .= '<option value="'.$SubCustomer->id.'">'.$SubCustomer->name.'</option>';
            }
        }
        return $FinalDatas.'</select>';
    }


    public function SaveSubCustomer(Request $request){
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required',
            'mobile' => 'required|min:10|max:10|unique:sub_customers',
            'address' => 'required',
        ]);

        try {
            $SubCustomer = new SubCustomer;
            $SubCustomer->customer_id = request('customer_id');
            $SubCustomer->name = request('name');
            $SubCustomer->mobile = request('mobile');
            $SubCustomer->address = request('address');
            $SubCustomer->save();
            return back()->with('success','Sub Customer Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
