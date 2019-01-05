<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCompanies(){
        $Companies = Company::get()->all();
        return view('admin.master.company.view',compact('Companies'));
    }

    public function AddCompany(){
        return view('admin.master.company.add');
    }

    public function saveCompany(Request $request){
        $request->validate([
            'company_name' => 'required|unique:companies',
        ]);
        try {
            $Company = new Company;
            $Company->company_name = request('company_name');
            $Company->company_address = request('company_address');
            $Company->save();
            return back()->with('success','Company Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
