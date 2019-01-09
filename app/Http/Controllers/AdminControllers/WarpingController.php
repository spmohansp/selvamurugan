<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarpingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllWarpings(){
        return view('admin.warping.view');
    }

    public function AddWarping(){
        return view('admin.warping.add');
    }
}
