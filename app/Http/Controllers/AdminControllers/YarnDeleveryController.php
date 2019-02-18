<?php

namespace App\Http\Controllers\AdminControllers;

use App\YarnDelevery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YarnDeleveryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllYarnDelevery(){
        $DeleveryYarns = YarnDelevery::get()->all();
        return view('admin.delevery.yarnDelevery.view',compact('DeleveryYarns'));
    }

    public function AddCustomerYarnDelevery(){
        return view('admin.delevery.yarnDelevery.add');
    }


    public function SaveYarnDelevery(Request $request){
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'company_id' => 'required|exists:companies,id',
            'color' => 'required',
            'yarn_count' => 'required',
        ]);
        try {
            $IncomeYarn = new YarnDelevery;
            $IncomeYarn->unit_id = request('unit_id');
            $IncomeYarn->customer_id = request('customer_id');
            $IncomeYarn->sub_customer_id = request('sub_customer_id');
            $IncomeYarn->date = request('date');
            $IncomeYarn->company_id = request('company_id');
            $IncomeYarn->total_bag = request('total_bag');
            $IncomeYarn->total_kg_bag = request('total_kg_bag');
            $IncomeYarn->net_weight = request('total_bag') * request('total_kg_bag');
            $IncomeYarn->color = request('color');
            $IncomeYarn->yarn_count = request('yarn_count');
            $IncomeYarn->note = request('note');
            $IncomeYarn->save();
            return back()->with('success','Yarn Delevery Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleveryYarnEdit($id){
        $YarnDelevery = YarnDelevery::FindorFail($id);
        return view('admin.delevery.yarnDelevery.edit',compact('YarnDelevery'));
    }

    public function DeleveryYarnUpdate($id , Request $request){
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'sub_customer_id' => 'nullable|exists:sub_customers,id',
            'date' => 'required',
            'company_id' => 'required|exists:companies,id',
            'color' => 'required',
            'yarn_count' => 'required',
        ]);
        try {
            $IncomeYarn = YarnDelevery::FindorFail($id);
            $IncomeYarn->unit_id = request('unit_id');
            $IncomeYarn->customer_id = request('customer_id');
            $IncomeYarn->sub_customer_id = request('sub_customer_id');
            $IncomeYarn->date = request('date');
            $IncomeYarn->company_id = request('company_id');
            $IncomeYarn->total_bag = request('total_bag');
            $IncomeYarn->total_kg_bag = request('total_kg_bag');
            $IncomeYarn->net_weight = request('net_weight');
            $IncomeYarn->color = request('color');
            $IncomeYarn->yarn_count = request('yarn_count');
            $IncomeYarn->note = request('note');
            $IncomeYarn->save();
            return back()->with('success','Delevery Yarn Updated Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleveryYarnDelete($id){
        try {
            YarnDelevery::FindorFail($id)->delete();
            return back()->with('success', 'Delevery Yarn Removed Successfully!!');
        } catch (Exception $e) {
            return back()->with('danger', 'Something went wrong!');
        }
    }
}
