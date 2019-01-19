<?php
namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Chemical;
use App\IncomeChemical;
use Illuminate\Http\Request;

class ChemicalController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllincomeChemicals(){
        $IncomeChemicals = IncomeChemical::get()->all();
        return view('admin.IncommingProduct.chemical.view',compact('IncomeChemicals'));
    }

    public function AddIncomeChemical(){
        $Chemicals = Chemical::get()->all();
        return view('admin.IncommingProduct.chemical.add',compact('Chemicals'));
    }

    public function saveIncomeChemical(){
        try {
            $IncomeChemical = new IncomeChemical;
            $IncomeChemical->unit_id = request('unit_id');
            $IncomeChemical->date = request('date');
            $IncomeChemical->chemical_id = request('chemical_id');
            $IncomeChemical->cost = request('cost');
            $IncomeChemical->count = request('count');
            $IncomeChemical->total = request('cost') * request('count');
            $IncomeChemical->note = request('note');
            $IncomeChemical->save();
            return back()->with('success','Incomming Chemical Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditIncomeChemical($id){
        $IncomeChemicals = IncomeChemical::FindorFail($id);
        $Chemicals = Chemical::get()->all();
        return view('admin.IncommingProduct.chemical.edit',compact('IncomeChemicals','Chemicals'));
    }

    public function UpdateIncomeChemical($id){
        try {
            $IncomeChemical = IncomeChemical::FindorFail($id);
            $IncomeChemical->unit_id = request('unit_id');
            $IncomeChemical->date = request('date');
            $IncomeChemical->chemical_id = request('chemical_id');
            $IncomeChemical->cost = request('cost');
            $IncomeChemical->count = request('count');
            $IncomeChemical->total = request('total');
            $IncomeChemical->note = request('note');
            $IncomeChemical->save();
            return back()->with('success','Incomming Chemical Updated Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function DeleteIncomeChemical($id){
        try {
        $IncomeChemical = IncomeChemical::FindorFail($id);
        $IncomeChemical->delete();
        return back()->with('success','Incomming Chemical Deleted Successfully!!');
    }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
