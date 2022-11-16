<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use DB;
use App\Models\CompanyCategory;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\Receptionists;
use App\Models\Roles;
use App\Models\User;


class AdminController extends Controller{

    public function __construct(){

    }

    public function index(){
        return view('admin.home');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function companyCategories(){
        $data['categories'] = CompanyCategory::all();
        return view('admin.companyCategories',$data);
    }


    public function companies(){
        $data['companies'] = Company::all();
        $data['categories'] = CompanyCategory::all();
        return view('admin.companies',$data);
    }

    public function companyBranches(){
        $data['companies'] = Company::all();
        $data['companyBranches'] = CompanyBranch::with('queues.user')->get();
        $data['receptionists'] = User::whereHas(
            'roles', function($q){
                $q->where('name', 'receptionist');
            }
        )->get();

        return view('admin.companyBranches',$data);
    }

    public function users(){
        $data['users'] = User::with('queues.companyBranch')->whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();

        $data['companyBranches'] = CompanyBranch::all();
        $data['roles'] = Roles::all();
        return view('admin.user',$data);
    }

    public function receptionists(){

        $data['users'] = User::whereHas(
            'roles', function($q){
                $q->where('name', 'receptionist');
            }
        )->get();

        $data['companyBranches'] = CompanyBranch::all();
        $data['roles'] = Roles::all();
        return view('admin.receptionists',$data);
    }

    public function admins(){
        $data['users'] = User::whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
            }
        )->get();

        $data['companyBranches'] = CompanyBranch::all();
        $data['roles'] = Roles::all();
        return view('admin.admins',$data);
    }






}
