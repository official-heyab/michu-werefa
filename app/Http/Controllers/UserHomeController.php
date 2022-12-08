<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\User;
use Auth;
use App\Models\Advertisement;
use App\Models\CompanyCategory;


class UserHomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['isReceptionist'] = false;
        if(Auth::user() != null)
            $data['isReceptionist'] = User::isReceptionist(Auth::user()->id);

        $data['companies'] = Company::with('companyBranches.queues.user')->get();
        $data['categories'] = CompanyCategory::all();
        $data['ad'] = Advertisement::where('isCurrent', '=', 1)->first();
        return view('home',$data);
    }

    public function profile(){
        $data['isReceptionist'] = false;
        if(Auth::user() != null)
            $data['isReceptionist'] = User::isReceptionist(Auth::user()->id);

        $data['user'] = User::with('queues.companyBranch')->where('id', Auth::user()->id)->get()[0];
        $data['companyBranches'] = CompanyBranch::all();
        // echo "<pre>";
        // print_r($data['user']);
        // echo "</pre>";
        return view('profile', $data);
    }

}
