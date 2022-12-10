<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\User;
use App\Models\Advertisement;



class HomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['isReceptionist'] = false;
        if(Auth::user() != null){
            $data['isReceptionist'] = User::isReceptionist(Auth::user()->id);
            $data['isAdmin'] = User::isAdmin(Auth::user()->id);
        }

        $data['companies'] = Company::with('companyBranches.queues.user')->get();
        $data['categories'] = CompanyCategory::all();
        $data['ad'] = Advertisement::where('isCurrent', '=', 1)->first();

        return view('home',$data);
    }

    public function welcome(){
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function services(){
        return view('services');
    }

}
