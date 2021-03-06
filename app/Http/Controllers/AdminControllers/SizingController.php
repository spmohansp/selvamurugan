<?php

namespace App\Http\Controllers\AdminControllers;

use App\Sizing;
use App\SizingBeam;
use App\SubCustomer;
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

    public function EditSizing($id){
        $Sizing = Sizing::findorfail($id);
        return view('admin.sizing.EditSizing',compact('Sizing'));
    }

     public function UpdateSizing($id,Request $request){
        $request->validate([
            'date' => 'required',
            'lab_length' => 'required',
            'palsekaram' => 'required',
            'warp_weight' => 'required',
            'gegam' => 'required',
        ]);
        try {
            $Sizing =  Sizing::FindorFail($id);
            $Sizing->date = request('date');
            $Sizing->lab_length = request('lab_length');
            $Sizing->palsekaram = request('palsekaram');
            $Sizing->warp_weight = request('warp_weight');
            $Sizing->gegam = request('gegam');
            $Sizing->save();
            return back()->with('success','Sizing Updated Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
    
    public function SizingSetList($id){
        $Sizing = Sizing::findorfail($id);
        $SubCustomers = SubCustomer::where('customer_id',$Sizing->Warping->customer_id)->get();
        $SizingBeams = SizingBeam::where([['sizing_id',$id]])->get();
        $SizingBeamsLastData = SizingBeam::orderBy('beam_number','desc')->first();
        return view('admin.sizing.sizingSetList',compact('Sizing','SizingBeams','SizingBeamsLastData','SubCustomers'));
    }

    public function AddSizingBeamSetList($id,Request $request){
        $request->validate([
            'gw' => 'required|min:1|regex:/^\d*(\.\d{1,2})?$/',
            'tw' => 'required|min:1|regex:/^\d*(\.\d{1,2})?$/',
            'meter' => 'required|min:0',
            'beam_number' => 'required',
        ]);
        try {
            $SizingBeam = new SizingBeam;
            $SizingBeam->gw = request('gw');
            $SizingBeam->tw = request('tw');
            $SizingBeam->nw = round(request('gw') - request('tw'),2);
            $SizingBeam->kuri = request('kuri');
            $SizingBeam->meter = request('meter');
            $SizingBeam->beam_number = request('beam_number');
            $SizingBeam->kanchi = request('kanchi');
            $SizingBeam->name = request('name');
            $SizingBeam->sub_customer_id = request('sub_customer_id');
            $SizingBeam->sizing_id = $id;
            $SizingBeam->warping_id = @Sizing::findorfail($id)->Warping->id;
            $SizingBeam->customer_id = @Sizing::findorfail($id)->Warping->customer_id;
            $SizingBeam->save();
            return back()->with('success','Sizing Beam Added Successfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditSizingSetList($id){
        $SizingSetList = SizingBeam::FindorFail($id);
        $SubCustomers = SubCustomer::where('customer_id',$SizingSetList->customer_id)->get();
        return view ('admin.sizing.EditSizingSetList',compact('SizingSetList','SubCustomers'));
    }

    public function UpdateSizingBeamSetList($id,Request $request){
        $request->validate([
            'gw' => 'required|min:1|regex:/^\d*(\.\d{1,2})?$/',
            'tw' => 'required|min:1|regex:/^\d*(\.\d{1,2})?$/',
            'meter' => 'required|min:0',
            'beam_number' => 'required',
        ]);
        try {
            $SizingBeam =  SizingBeam::FindorFail($id);
            $SizingBeam->gw = request('gw');
            $SizingBeam->tw = request('tw');
            $SizingBeam->nw = round(request('gw') - request('tw'),2);
            $SizingBeam->kuri = request('kuri');
            $SizingBeam->meter = request('meter');
            $SizingBeam->beam_number = request('beam_number');
            $SizingBeam->kanchi = request('kanchi');
            $SizingBeam->name = request('name');
            $SizingBeam->sub_customer_id = request('sub_customer_id');
            $SizingBeam->save();
            return redirect(route('admin.ViewSizingSetList',$SizingBeam->sizing_id))->with('success','Sizing Beam Updated Successfully!');
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
