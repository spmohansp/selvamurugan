<?php

namespace App\Http\Controllers\AdminControllers;

use App\Chemical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChemicalProductsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllCustomerChemicalProduct(){
        $Chemicals = Chemical::all();
        return view('admin.master.chemical.view',compact('Chemicals'));
    }

    public function AddChemical(){
        return view('admin.master.chemical.add');
    }


    public function saveChemical(Request $request){
        $request->validate([
            'chemical_name' => 'required|unique:chemicals',
        ]);

        try {
            $Chemical = new Chemical;
            $Chemical->chemical_name = request('chemical_name');
            $Chemical->save();
            return back()->with('success','Chemical Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditChemical($id){
        $Chemical =Chemical::FindorFail($id);
        return view('admin.master.chemical.edit',compact('Chemical'));
    }

    public function UpdateChemical(Request $request,$id){
        $request->validate([
            'chemical_name' => 'required',
        ]);
        try {
            $Chemical =Chemical::FindorFail($id);
            $Chemical->chemical_name = request('chemical_name');
            $Chemical->save();
            return back()->with('success','Chemical Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleteChemical($id){
        try{
            Chemical::FindorFail($id)->delete();
            return back()->with('success','Chemical Deleted Successfully');
        }catch(Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
