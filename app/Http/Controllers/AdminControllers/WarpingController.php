<?php

namespace App\Http\Controllers\AdminControllers;

use App\Sizing;
use App\Warping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarpingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllWarpings(){
        $Warpings = Warping::orderBy('date','desc')->get()->all();
        return view('admin.warping.view',compact('Warpings'));
    }

    public function AddWarping(){
        return view('admin.warping.add');
    }

    public function SaveWarping(Request $request){
        $request->validate([
            'date' => 'required|date',
            'set_number' => 'required|unique:warpings',
        ]);
        try {
            $Warping = new Warping;
            $Warping->unit_id = request('unit_id');
            $Warping->customer_id = request('customer_id');
            $Warping->sub_customer_id = request('sub_customer_id');
            $Warping->date = request('date');
            $Warping->set_number = request('set_number');
            $Warping->yarn_count = request('yarn_count');
            $Warping->ilai = request('ilai');
            $Warping->total_bag = request('total_bag');
            $Warping->total_kg_bag = request('total_kg_bag');
            $Warping->total_weight = request('total_kg_bag') * request('total_bag');
            $Warping->rewainding_weight = request('rewainding_weight');
            $Warping->baby_cone_weight = request('baby_cone_weight');
            $Warping->net_weight = request('rewainding_weight') + request('baby_cone_weight') + (request('total_kg_bag') * request('total_bag'));
            $Warping->warping = serialize(request('warping'));
            $Warping->note = request('note');
            $Warping->save();

            $Sizing = new Sizing;
            $Sizing->warping_id = $Warping->id;
            $Sizing->save();

            return back()->with('success','Warping Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditWarping($id){
        $Warping = Warping::findorfail($id);
        return view('admin.warping.edit',compact('Warping'));
    }

    public function UpdateWarping($id,Request $request){
        $request->validate([
            'date' => 'required|date',
            'set_number' => 'required',
        ]);
//        dd(request()->all());
        try {
            $Warping = Warping::findorfail($id);
            $Warping->unit_id = request('unit_id');
            $Warping->customer_id = request('customer_id');
            $Warping->sub_customer_id = request('sub_customer_id');
            $Warping->date = request('date');
            $Warping->set_number = request('set_number');
            $Warping->yarn_count = request('yarn_count');
            $Warping->ilai = request('ilai');
            $Warping->total_bag = request('total_bag');
            $Warping->total_kg_bag = request('total_kg_bag');
            $Warping->total_weight = request('total_kg_bag') * request('total_bag');
            $Warping->rewainding_weight = request('rewainding_weight');
            $Warping->net_weight = request('rewainding_weight') + request('baby_cone_weight') + (request('total_kg_bag') * request('total_bag'));
            $Warping->warping = serialize(request('warping'));
            $Warping->note = request('note');
            $Warping->save();
            return back()->with('success','Warping Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }






}
