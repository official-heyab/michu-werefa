<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;



class HomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['companies'] = Company::with('queues.user')->get();
        return view('home',$data);

        //Return the appropriate home page according to the authentication
        return view('admin.home');
    }

    public function userHome(){
        $data['companies'] = Company::with('queues.user')->get();
        return view('home',$data);
    }

    public function adminHome(){
        return view('admin.home');
    }

    public function dashboard(){
        return view('dashboard');
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
