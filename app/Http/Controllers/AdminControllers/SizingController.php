<?php

namespace App\Http\Controllers\AdminControllers;

use App\Sizing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizingController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllSizing(){
        $Sizings = Sizing::get()->all();
        return view('admin.sizing.view',compact('Sizings'));
    }
}
