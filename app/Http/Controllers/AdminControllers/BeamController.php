<?php

namespace App\Http\Controllers\AdminControllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeamController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCustomerBeam(){
        return view('admin.IncommingProduct.beam.view');
    }

    public function AddCustomerBeam(){
        $Customers = Customer::get()->all();
        return view('admin.IncommingProduct.beam.add',compact('Customers'));
    }
}
