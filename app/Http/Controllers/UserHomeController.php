<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\User;
use Auth;


class UserHomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['isReceptionist'] = true;
        $data['companies'] = Company::with('companyBranches.queues.user')->get();
        return view('home',$data);
    }

    public function profile(){
        $data['isReceptionist'] = true;
        $data['user'] = User::with('queues.companyBranch')->where('id', Auth::user()->id)->get()[0];
        $data['companyBranches'] = CompanyBranch::all();
        // echo "<pre>";
        // print_r($data['user']);
        // echo "</pre>";
        return view('profile', $data);
    }

}
