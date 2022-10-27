<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyCategory;

class CompanyCategoryController extends Controller{

    public function __construct(){

    }

    public function store(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);
        $category = new CompanyCategory;
        $category->name = $request->input('name');
        $category->save();
        return redirect()->back()->with('success','Company Category Created');

    }

    public function update(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);

        $category = CompanyCategory::find($request->input('id'));
        $category->name = $request->input('name');
        $category->save();
        return redirect()->back()->with('success','Company Category Updated');
    }


    public function delete(Request $request){
        $category = CompanyCategory::find($request->input('id'));
        $category->delete();
        return redirect()->back()->with('success','Company Category Deleted');
    }

}
