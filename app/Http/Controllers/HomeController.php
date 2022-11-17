<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;



class HomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['isReceptionist'] = true;
        $data['companies'] = Company::with('companyBranches.queues.user')->get();
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
