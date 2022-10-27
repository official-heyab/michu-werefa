<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanyController extends Controller{

    public function __construct(){

    }

    public function store(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);
        $company = new Company;
        $company->name = $request->input('name');
        $company->ticket_price = $request->input('price');
        $company->logo = "noimage.jpg";
        $company->desc = $request->input('desc');
        $company->save();
        return redirect()->back()->with('success','Company Created');

    }

    public function update(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);

        $company = Company::find($request->input('id'));
        $company->name = $request->input('name');
        $company->ticket_price = $request->input('price');
        $company->desc = $request->input('desc');
        $company->save();
        return redirect()->back()->with('success','Company Updated');
    }


    public function delete(Request $request){
        $company = Company::find($request->input('id'));
        $company->delete();
        return redirect()->back()->with('success','Company Deleted');
    }

}
