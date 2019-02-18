<?php

namespace App\Http\Controllers\AdminControllers;

use App\EmptyBeamDelevery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmptyBeamDeleveryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCustomerEmptyBeamDelevery(){
        $EmptyBeams = EmptyBeamDelevery::all();
        return view('admin.delevery.EmptybeamDelevery.view',compact('EmptyBeams'));
    }

    public function AddCustomerEmptyBeamDelevery(){
        return view('admin.delevery.EmptybeamDelevery.add');
    }

    public function saveEmptyBeamDelevery(Request $request){
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'beam_total' => 'required',
        ]);
        try {
            $IncomeBeam = new EmptyBeamDelevery;
            $IncomeBeam->unit_id = request('unit_id');
            $IncomeBeam->customer_id = request('customer_id');
            $IncomeBeam->sub_customer_id = request('sub_customer_id');
            $IncomeBeam->date = request('date');
            $IncomeBeam->beam_total = request('beam_total');
            $IncomeBeam->beam_inch = request('beam_inch');
            $IncomeBeam->note = request('note');
            $IncomeBeam->save();
            return back()->with('success','Empty Beam Delevery Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EmptyBeamDeleveryEdit($id){
        $EmptyBeamDelevery = EmptyBeamDelevery::FindorFail($id);
        return view('admin.delevery.EmptybeamDelevery.edit',compact('EmptyBeamDelevery'));
    }

    public function EmptyBeamDeleveryUpdate($id,Request $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'beam_total' => 'required',
        ]);
        try {
            $IncomeBeam = EmptyBeamDelevery::FindorFail($id);
            $IncomeBeam->unit_id = request('unit_id');
            $IncomeBeam->customer_id = request('customer_id');
            $IncomeBeam->sub_customer_id = request('sub_customer_id');
            $IncomeBeam->date = request('date');
            $IncomeBeam->beam_total = request('beam_total');
            $IncomeBeam->beam_inch = request('beam_inch');
            $IncomeBeam->note = request('note');
            $IncomeBeam->save();
            return back()->with('success','Income Beam Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EmptyBeamDeleveryDelete($id){
        try {
            EmptyBeamDelevery::FindorFail($id)->delete();
            return back()->with('success','Empty Beam Delevery Deleted Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }

    }
}
