<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyCategory;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\BranchReceptionist;
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
        $data['companyBranches'] = CompanyBranch::with('branchQueues')->get();
        $data['receptionists'] = BranchReceptionist::all();
        return view('admin.companyBranches',$data);
    }

    public function users(){
        $data['users'] = User::with('branchQueues.companyBranch')->get();
        $data['companyBranches'] = CompanyBranch::all();
        return view('admin.user',$data);
    }






}
