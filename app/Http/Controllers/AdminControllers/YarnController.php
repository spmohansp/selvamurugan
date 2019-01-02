<?php

namespace App\Http\Controllers\AdminControllers;

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
        return view('admin.IncommingProduct.yarn.add');
    }
}
