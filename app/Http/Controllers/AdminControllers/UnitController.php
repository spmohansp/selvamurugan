<?php

namespace App\Http\Controllers\AdminControllers;

use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllUnits(){
        $Customer = Unit::all();
        return view('admin.master.unit.view',compact('Customer'));
    }

    public function AddUnit(){
        return view('admin.master.unit.add');
    }


    public function SaveUnit(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|max:10',
            'address' => 'required',
        ]);

        try {
            $Units = new Unit;
            $Units->name = request('name');
            $Units->mobile = request('mobile');
            $Units->address = request('address');
            $Units->gst = request('gst');
            $Units->save();
            return back()->with('success','Unit Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditUnits($id){
        $Units = Unit::FindorFail($id);
         return view('admin.master.unit.edit',compact('Units'));
    }

    public function UpdateUnits(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10|max:10',
            'address' => 'required',
        ]);
        try {
            $Units = Unit::FindorFail($id);
            $Units->name = request('name');
            $Units->mobile = request('mobile');
            $Units->address = request('address');
            $Units->gst = request('gst');
            $Units->save();
            return back()->with('success','Unit Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
