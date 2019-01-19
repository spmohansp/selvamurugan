<?php

namespace App\Http\Controllers\AdminControllers;

use App\Customer;
use App\IncomeBeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeamController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCustomerBeam(){
        $Beams = IncomeBeam::all();
        return view('admin.IncommingProduct.beam.view',compact('Beams'));
    }

    public function AddCustomerBeam(){
        $Customers = Customer::get()->all();
        return view('admin.IncommingProduct.beam.add',compact('Customers'));
    }

    public function saveIncomeBeam(Request $request){
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'beam_total' => 'required',
        ]);
        try {
            $IncomeBeam = new IncomeBeam;
            $IncomeBeam->unit_id = request('unit_id');
            $IncomeBeam->customer_id = request('customer_id');
            $IncomeBeam->sub_customer_id = request('sub_customer_id');
            $IncomeBeam->date = request('date');
            $IncomeBeam->beam_total = request('beam_total');
            $IncomeBeam->beam_inch = request('beam_inch');
            $IncomeBeam->note = request('note');
            $IncomeBeam->save();
            return back()->with('success','Income Beam Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function IncomeBeamEdit($id)
    {
       $IncomeBeam = IncomeBeam::FindorFail($id);
       return view('admin.IncommingProduct.beam.edit',compact('IncomeBeam'));
    }

    public function  IncomeBeamUpdate($id,Request $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'beam_total' => 'required',
        ]);
        try {
            $IncomeBeam = IncomeBeam::FindorFail($id);
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

    public function IncomeBeamDelete($id){
        try {
        $IncomeBeam = IncomeBeam::FindorFail($id);
        $IncomeBeam->delete();
        return back()->with('success','Income Beam Deleted Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }

    }

}
