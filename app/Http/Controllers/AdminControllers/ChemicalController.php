<?php
namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Chemical;
use Illuminate\Http\Request;

class ChemicalController extends Controller
{

	public function __construct(){
        $this->middleware('admin');
    }

     public function ShowAllCustomerChemical(){
     	$Customers = Chemical::all();
    	return view('admin.master.chemical.view',compact('Customers'));
    }

    public function AddChemical()
    {
    	return view('admin.master.chemical.add');
    }
    public function saveChemical(Request $request)
    {
    	$request->validate([
            'chemical_name' => 'required',
            
        ]);
        try {
            $Customer = new Chemical;
            $Customer->chemical_name = request('chemical_name');
            $Customer->save();
            return back()->with('success','Chemical Addes Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditChemical($id)
    {
    	$Customer =Chemical::FindorFail($id);
    	return view('admin.master.chemical.edit',compact('Customer')); 
    }

    public function UpdateChemical(Request $request,$id)
    {
    	$Customer =Chemical::FindorFail($id);
    	$request->validate([
            'chemical_name' => 'required',
         ]);
         try {
         	$Customer->chemical_name = request('chemical_name');
            $Customer->save();
            return back()->with('success','Chemical Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleteChemical($id)
    {
	    	try{
	    	$Customer = Chemical::FindorFail($id)->delete();
	    	return back()->with('success','Chemical Deleted Successfully');
	    }catch(Exception $e){
	    	return back()->with('danger','Something went wrong!');
	    }
	}
}
