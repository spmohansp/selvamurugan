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


    public function ShowAllincomeChemicals(){
        return view('admin.IncommingProduct.chemical.view');
    }

    public function AddChemical(){
        $Chemicals = Chemical::get()->all();
        return view('admin.IncommingProduct.chemical.add',compact('Chemicals'));
    }

}
