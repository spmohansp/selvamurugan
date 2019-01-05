<?php

namespace App\Http\Controllers\AdminControllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YarnController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllCustomerYarn(){
        return view('admin.IncommingProduct.yarn.view');
    }

    public function AddCustomerYarn(){
        $Companies = Company::get()->all();
        return view('admin.IncommingProduct.yarn.add',compact('Companies'));
    }
}
