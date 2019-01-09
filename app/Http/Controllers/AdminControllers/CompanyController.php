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

    public function EditCompany($id){
        $Company = Company::FindorFail($id);
        return view('admin.master.company.edit',compact('Company'));
    }

    public function UpdateCompany($id){       
       try {
            $Company = Company::FindorFail($id);
            $Company->company_name = request('company_name');
            $Company->company_address = request('company_address');
            $Company->save();
            return back()->with('success','Company Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleteCompany($id){
         try {
            $Company = Company::FindorFail($id);
            $Company->delete();
            return back()->with('success','Company Deleted Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }

    }
    
}    
