<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller{

    public function __construct(){

    }

    public function store(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $company = new Company;
        $company->company_category_id = $request->input('category');
        $company->name = $request->input('name');
        $company->ticket_price = $request->input('price');
        $company->logo = $imageName;
        $company->desc = $request->input('desc');
        $company->save();
        return redirect()->back()->with('success','Company Created');

    }

    public function update(Request $request){
        $company = Company::find($request->input('id'));

        if(request()->image!=null){
            $image_path = public_path("images/{$company->logo}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }


        $company->company_category_id = $request->input('category');
        $company->name = $request->input('name');
        $company->ticket_price = $request->input('price');
        $company->desc = $request->input('desc');
        $company->save();
        return redirect()->back()->with('success','Company Updated');
    }


    public function delete(Request $request){
        $company = Company::find($request->input('id'));
        //delete image
        $image_path = public_path("images/{$company->logo}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $company->delete();
        return redirect()->back()->with('success','Company Deleted');
    }

}
