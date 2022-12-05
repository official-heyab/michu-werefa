<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Advertisement;

class AdvertisementController extends Controller{

    public function __construct(){

    }

    public function store(Request $request){
        $ad = new Advertisement;
        $ad->title = $request->input('title');
        $ad->desc = $request->input('desc');
        $ad->link = $request->input('link');
        $isChecked = ($request->input('isCurrent') == 'on') ? 1 : 0;
        $ad->isCurrent = $isChecked;;
        $ad->save();
        if($ad->isCurrent) $this->updateCurrentAd($ad->id);
        return redirect()->back()->with('success','Advertisement Created');

    }

    public function update(Request $request){
        $ad = Advertisement::find($request->input('id'));
        $ad->title = $request->input('title');
        $ad->desc = $request->input('desc');
        $ad->link = $request->input('link');
        $isChecked = ($request->input('isCurrent') == 'on') ? 1 : 0;
        $ad->isCurrent = $isChecked;
        $ad->save();
        if($ad->isCurrent) $this->updateCurrentAd($ad->id);
        return redirect()->back()->with('success','Advertisement Updated');
    }


    public function delete(Request $request){
        $ad = Advertisement::find($request->input('id'));
        $ad->delete();
        if($ad->isCurrent) $this->randomCurrentAd();
        return redirect()->back()->with('success','Advertisement Deleted');
    }

    public function updateCurrentAd($adID){
        foreach(Advertisement::where('isCurrent', '=', 1)->get() as $currentAd){
            if($currentAd->id != $adID){
                $currentAd->isCurrent = false;
                $currentAd->save();
            }
        }
    }

    public function randomCurrentAd(){
        $ad = Advertisement::inRandomOrder()->first();
        $ad->isCurrent = true;
        $ad->save();
    }

}
