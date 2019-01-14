<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizingController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllSizing(){
        return view('admin.sizing.view');
    }
}
