<?php

namespace App\Http\Controllers\AdminControllers;

use App\SizingBeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FullBeamDeleveryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function showFullBeamDeleveryList(){
        return view('admin.delevery.fullBeamDelevery.view');
    }

    public function AddFullBeamDelevery(){
        return view('admin.delevery.fullBeamDelevery.add');
    }

    public function SizingBeamNonDeleverList(){
        $sizingBeams= SizingBeam::where([['sizing_id',request('Sizing_set_id')]])->whereNull('delevery_id')->get();
        $FinalDatas = '<select id="Non_Delever_Sizing_Beam" class="form-control SearchableDropDownSelect">';
        if(!empty($sizingBeams)){
            foreach($sizingBeams as $sizingBeam){
                $FinalDatas .= '<option value="'.$sizingBeam->id.'">'.$sizingBeam->beam_number.'</option>';
            }
        }
        return $FinalDatas.'</select>';
    }

    public function getNonDeleveredSizingBeamDetail(){
        $sizingBeam= SizingBeam::where([['id',request('sizing_beam_id')]])->whereNull('delevery_id')->first();
        if(!empty($sizingBeam)){
            return '<tr><input type="hidden" name="sizing_beam_id[]" value="'.$sizingBeam->id.'">'.
                        '<td>'.$sizingBeam->beam_number.'</td>'.
                        '<td>'.$sizingBeam->meter.'</td>'.
                        '<td><button type="button" class="btn btn-danger btn-sm RemoveSizingBeam">X</button></td>'.
                    '</tr>';
        }
    }

    public function AddCustomerFullBeamDelevery(){
        return request()->all();
    }
}
