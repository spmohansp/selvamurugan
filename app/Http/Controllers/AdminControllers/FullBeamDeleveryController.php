<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FullBeamDeleveryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function showFullBeamDeleveryList(){
        return view('admin.delevery.fullBeamDelevery.view');
    }

    public function AddFullBeamDelevery(){
        return view('admin.delevery.fullBeamDelevery.add');
    }
}
