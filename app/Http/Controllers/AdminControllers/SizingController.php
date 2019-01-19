<?php

namespace App\Http\Controllers\AdminControllers;

use App\Sizing;
use App\SizingBeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizingController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }


    public function ShowAllSizing(){
        $Sizings = Sizing::orderBy('warping_id','desc')->get()->all();
        return view('admin.sizing.view',compact('Sizings'));
    }


    public function SizingSetList($id){
        $Sizing = Sizing::findorfail($id);
        $SizingBeams = SizingBeam::where([['sizing_id',$id]])->get()->all();
        $SizingBeamsLastData = SizingBeam::orderBy('beam_number','desc')->first();
        return view('admin.sizing.sizingSetList',compact('Sizing','SizingBeams','SizingBeamsLastData'));
    }

    public function AddSizingBeamSetList($id,Request $request){
        $request->validate([
            'gw' => 'required',
            'meter' => 'required',
            'beam_number' => 'required|unique:sizing_beams',
        ]);
        try {
            $SizingBeam = new SizingBeam;
            $SizingBeam->gw = request('gw');
            $SizingBeam->tw = request('tw');
            $SizingBeam->nw = request('nw');
            $SizingBeam->kuri = request('kuri');
            $SizingBeam->meter = request('meter');
            $SizingBeam->beam_number = request('beam_number');
            $SizingBeam->kanchi = request('kanchi');
            $SizingBeam->name = request('name');
            $SizingBeam->sizing_id = $id;
            $SizingBeam->save();
            return back()->with('success','Sizing Beam Added Successfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditSizingSetList($id){
        $SizingSetList = SizingBeam::FindorFail($id);
        return view ('admin.sizing.EditSizingSetList',compact('SizingSetList'));
    }

    public function UpdateSizingBeamSetList($id,Request $request){
        $request->validate([
            'gw' => 'required',
            'meter' => 'required',
            'beam_number' => 'required',
        ]);
        try {
            $SizingBeam =  SizingBeam::FindorFail($id);
            $SizingBeam->gw = request('gw');
            $SizingBeam->tw = request('tw');
            $SizingBeam->nw = request('nw');
            $SizingBeam->kuri = request('kuri');
            $SizingBeam->meter = request('meter');
            $SizingBeam->beam_number = request('beam_number');
            $SizingBeam->kanchi = request('kanchi');
            $SizingBeam->name = request('name');
            $SizingBeam->save();
            return back()->with('success','Sizing Beam Updated Successfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }



    public function DeleteSizingBeamSetList($id){
        try {
            SizingBeam::findorfail($id)->delete();
            return back()->with('success','Sizing Beam Deleted Successfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }


}
