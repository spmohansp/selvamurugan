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
        return view('admin.IncommingProduct.chemical.view');
    }

    public function AddChemical(){
        $Chemicals = Chemical::get()->all();
        return view('admin.IncommingProduct.chemical.add',compact('Chemicals'));
    }

    public function saveChemical(){
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

}
