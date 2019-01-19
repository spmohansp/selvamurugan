<?php

namespace App\Http\Controllers\AdminControllers;

use App\Company;
use App\IncomeYarn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YarnController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllCustomerYarn(){
        $IncomeYarns = IncomeYarn::get()->all();
        return view('admin.IncommingProduct.yarn.view',compact('IncomeYarns'));
    }

    public function AddCustomerYarn(){
        $Companies = Company::get()->all();
        return view('admin.IncommingProduct.yarn.add',compact('Companies'));
    }


    public function SaveCustomerYarn(){
        try {
            $IncomeYarn = new IncomeYarn;
            $IncomeYarn->unit_id = request('unit_id');
            $IncomeYarn->customer_id = request('customer_id');
            $IncomeYarn->sub_customer_id = request('sub_customer_id');
            $IncomeYarn->date = request('date');
            $IncomeYarn->yarn_type = request('yarn_type');
            $IncomeYarn->company_id = request('company_id');
            $IncomeYarn->total_bag = request('total_bag');
            $IncomeYarn->total_kg_bag = request('total_kg_bag');
            $IncomeYarn->net_weight = request('net_weight');
            $IncomeYarn->color = request('color');
            $IncomeYarn->yarn_count = request('yarn_count');
            $IncomeYarn->note = request('note');
            $IncomeYarn->save();
            return back()->with('success','Customer Income Yarn Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function IncomeYarnEdit($id){
        $IncomeYarn = IncomeYarn::FindorFail($id);
        return view('admin.IncommingProduct.yarn.edit',compact('IncomeYarn'));
    }

    public function IncomeYarnUpdate($id){
        try {
            $IncomeYarn = IncomeYarn:: FindorFail($id);
            $IncomeYarn->unit_id = request('unit_id');
            $IncomeYarn->customer_id = request('customer_id');
            $IncomeYarn->sub_customer_id = request('sub_customer_id');
            $IncomeYarn->date = request('date');
            $IncomeYarn->yarn_type = request('yarn_type');
            $IncomeYarn->company_id = request('company_id');
            $IncomeYarn->total_bag = request('total_bag');
            $IncomeYarn->total_kg_bag = request('total_kg_bag');
            $IncomeYarn->net_weight = request('net_weight');
            $IncomeYarn->color = request('color');
            $IncomeYarn->yarn_count = request('yarn_count');
            $IncomeYarn->note = request('note');
            $IncomeYarn->save();
            return back()->with('success','Customer Income Yarn Udpated  Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function IncomeYarnDelete($id){
        try {
            $IncomeYarn = IncomeYarn::FindorFail($id);
            $IncomeYarn->delete();
            return back()->with('success','Customer Income Yarn Deleted  Successfully!!');
        } catch (Exception $e) {
            return back()->with('danger', 'Something went wrong!');
        }
    }


}
