<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\Receptionist;
use App\Models\Queue;

class CompanyController extends Controller{

    public function __construct(){

    }

    public function index(){
        $data['companies'] = Company::with('queues.user')->get();
        $data['receptionists'] = Receptionist::all();


        // Return the appropriate page according to the authentication
        return view('admin.company',$data);
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

    public function addReceptionist(Request $request){
        $receptionist = new Receptionist;
        $receptionist->name = $request->input('name');
        $receptionist->email = $request->input('email');
        $receptionist->phone = $request->input('phone');
        $receptionist->company_id = $request->input('id');
        $receptionist->password = Hash::make($request->input('password'));
        $receptionist->save();

        return redirect()->back()->with('success','Receptionist Added');
     }

    public function updateReceptionist(Request $request){
        $receptionist = Receptionist::find($request->input('id'));
        $receptionist->name = $request->input('name');
        $receptionist->email = $request->input('email');
        $receptionist->phone = $request->input('phone');
        $receptionist->save();

        return redirect()->back()->with('success','Receptionist Updated');
    }

    public function deleteReceptionist(Request $request){
        $receptionist = Receptionist::find($request->input('id'));
        $receptionist->delete();
        return redirect()->back()->with('success','Receptionist Deleted');
    }

    public function nextPerson(Request $request){
        $companyID = $request->input('id');
        $queue = Queue::where([
            ['company_id', '=', $companyID],
            ['status', '=', 'Waiting']
        ]);

        if($queue->count()==0)
            return redirect()->back()->with('error','There is NO queue');

        $queue = $queue->first();
        $queue->status = 'Done';
        $queue->save();
        return redirect()->back()->with('success','Next person in front');
    }
}
