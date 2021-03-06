<?php

namespace App\Http\Controllers\AdminControllers;

use App\Sizing;
use App\Warping;
use App\WarpingYarn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WarpingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function ShowAllWarpings(){
        $Warpings = Warping::orderBy('date','desc')->get()->all();
        return view('admin.warping.view',compact('Warpings'));
    }

    public function AddWarping(){
        return view('admin.warping.add');
    }

    public function SaveWarping(Request $request){
        $request->validate([
            'date' => 'required|date',
            'set_number' => 'required|unique:warpings',
        ]);
        try {
            $Warping = new Warping;
            $Warping->unit_id = request('unit_id');
            $Warping->customer_id = request('customer_id');
            $Warping->sub_customer_id = request('sub_customer_id');
            $Warping->date = request('date');
            $Warping->set_number = request('set_number');
            $Warping->ilai = request('ilai');

            $WarpingDatas=array();$warpingYarnUsage=0;
            if(!empty(request('warping'))){
                foreach (request('warping') as $warping){
                    $WarpingData=array();
                    $WarpingData['totalBeemWeight'] = @$warping['totalBeemWeight'];
                    $WarpingData['emptyBeemWeight'] = @$warping['emptyBeemWeight'];
                    $WarpingData['totalWeight'] = @$warping['totalBeemWeight'] - @$warping['emptyBeemWeight'];
                    $WarpingData['warpingGeagam'] = @$warping['warpingGeagam'];
                    $WarpingData['warperName'] = @$warping['warperName'];
                    array_push($WarpingDatas,$WarpingData);
                    $warpingYarnUsage += @$warping['totalBeemWeight'] - @$warping['emptyBeemWeight'];
                }
            }

            $warpingYarnTotal=0;
            if(!empty(request('WarpingYarn'))){
                foreach (request('WarpingYarn') as $WarpingYarn){
                    $warpingYarnTotal += @$WarpingYarn['total_bag'] * @$WarpingYarn['total_kg_bag'];
                }
            }

            $Warping->warping_details = serialize($WarpingDatas);
            $Warping->total_yarn_weight = $warpingYarnTotal;
            $Warping->warping_used_yarn_weight = $warpingYarnUsage;
            $Warping->remaining_cone_weight = $warpingYarnTotal-$warpingYarnUsage;
            $Warping->note = request('note');
            $Warping->save();

            if(!empty(request('WarpingYarn'))){
                foreach (request('WarpingYarn') as $warpingYarn){
                   $WarpingYarn = new WarpingYarn;
                    $WarpingYarn->company_id = @$warpingYarn['company_id'];
                    $WarpingYarn->yarn_count = @$warpingYarn['yarn_count'];
                    $WarpingYarn->total_bag = @$warpingYarn['total_bag'];
                    $WarpingYarn->total_kg_bag = @$warpingYarn['total_kg_bag'];
                    $WarpingYarn->yarn_total_kg = @$warpingYarn['total_bag'] * @$warpingYarn['total_kg_bag'];
                    $WarpingYarn->customer_id = request('customer_id');
                    $WarpingYarn->sub_customer_id = request('sub_customer_id');
                    $WarpingYarn->warping_id = @$Warping->id;
                    $WarpingYarn->save();
                }
            }

            $Sizing = new Sizing;
            $Sizing->warping_id = $Warping->id;
            $Sizing->save();

            return back()->with('success','Warping Added Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function EditWarping($id){
        $Warping = Warping::findorfail($id);
        return view('admin.warping.edit',compact('Warping'));
    }

    public function UpdateWarping($id,Request $request){
        $request->validate([
            'date' => 'required|date',
            'set_number' => 'required',
        ]);
        try {
            $Warping = Warping::findorfail($id);
            $Warping->unit_id = request('unit_id');
            $Warping->customer_id = request('customer_id');
            $Warping->sub_customer_id = request('sub_customer_id');
            $Warping->date = request('date');
            $Warping->set_number = request('set_number');
            $Warping->ilai = request('ilai');

            $WarpingDatas=array();$warpingYarnUsage=0;
            if(!empty(request('warping'))){
                foreach (request('warping') as $warping){
                    $WarpingData=array();
                    $WarpingData['totalBeemWeight'] = @$warping['totalBeemWeight'];
                    $WarpingData['emptyBeemWeight'] = @$warping['emptyBeemWeight'];
                    $WarpingData['totalWeight'] = @$warping['totalBeemWeight'] - @$warping['emptyBeemWeight'];
                    $WarpingData['warpingGeagam'] = @$warping['warpingGeagam'];
                    $WarpingData['warperName'] = @$warping['warperName'];
                    array_push($WarpingDatas,$WarpingData);
                    $warpingYarnUsage += @$warping['totalBeemWeight'] - @$warping['emptyBeemWeight'];
                }
            }

            $warpingYarnTotal=0;
            if(!empty(request('WarpingYarn'))){
                foreach (request('WarpingYarn') as $WarpingYarn){
                    $warpingYarnTotal += @$WarpingYarn['total_bag'] * @$WarpingYarn['total_kg_bag'];
                }
            }
            $Warping->warping_details = serialize($WarpingDatas);
            $Warping->total_yarn_weight = $warpingYarnTotal;
            $Warping->warping_used_yarn_weight = $warpingYarnUsage;
            $Warping->remaining_cone_weight = $warpingYarnTotal-$warpingYarnUsage;
            $Warping->note = request('note');
            $Warping->save();

            if(!empty(request('WarpingYarn'))) {
                foreach(request('WarpingYarn') as $WarpingYarn) {
                    if(isset($WarpingYarn['warping_id'])) {
                        $WarpingYarnIds[] = $WarpingYarn['warping_id'];
                    }
                }
                $WarpingYarnDetails = WarpingYarn::where([['warping_id', $Warping->id]])->get()->all();
                foreach ($WarpingYarnDetails as $WarpingYarnDetail){
                    if(!in_array($WarpingYarnDetail->id, $WarpingYarnIds)){
                        WarpingYarn::where([['id',$WarpingYarnDetail->id]])->first()->delete();
                    }
                }
                foreach (request('WarpingYarn') as $warpingYarns){
                    if(!isset($warpingYarns['warping_id'])){
                        $WarpingYarn = new WarpingYarn;
                        $WarpingYarn->company_id = @$warpingYarns['company_id'];
                        $WarpingYarn->yarn_count = @$warpingYarns['yarn_count'];
                        $WarpingYarn->total_bag = @$warpingYarns['total_bag'];
                        $WarpingYarn->total_kg_bag = @$warpingYarns['total_kg_bag'];
                        $WarpingYarn->yarn_total_kg = @$warpingYarns['total_bag'] * @$warpingYarns['total_kg_bag'];
                        $WarpingYarn->customer_id = request('customer_id');
                        $WarpingYarn->sub_customer_id = request('sub_customer_id');
                        $WarpingYarn->warping_id = @$Warping->id;
                        $WarpingYarn->save();
                    }else{
                        $WarpingYarn = WarpingYarn::findorfail($warpingYarns['warping_id']);
                        $WarpingYarn->company_id = @$warpingYarns['company_id'];
                        $WarpingYarn->yarn_count = @$warpingYarns['yarn_count'];
                        $WarpingYarn->total_bag = @$warpingYarns['total_bag'];
                        $WarpingYarn->total_kg_bag = @$warpingYarns['total_kg_bag'];
                        $WarpingYarn->yarn_total_kg = @$warpingYarns['total_bag'] * @$warpingYarns['total_kg_bag'];
                        $WarpingYarn->customer_id = request('customer_id');
                        $WarpingYarn->sub_customer_id = request('sub_customer_id');
                        $WarpingYarn->save();
                    }
                }

            }else{
                $WarpingYarnDetails = WarpingYarn::where([['warping_id', 1]])->get()->all();
                foreach ($WarpingYarnDetails as $WarpingYarnDetail){
                    WarpingYarn::findorfail($WarpingYarnDetail->id)->delete();
                }
            }

            return back()->with('success','Warping Updated Successfully!!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

 }
