<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyBranch;
use App\Models\BranchReceptionist;
use App\Models\UserQueue;



class CompanyBranchController extends Controller{

    public function __construct(){

    }


    public function store(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);
        $branch = new CompanyBranch;
        $branch->name = $request->input('name');
        $branch->company_id = $request->input('company');
        $branch->estimated_queue_time = $request->input('queue_time');
        $branch->working_hours = $request->input('working_hours');
        $branch->desc = $request->input('desc');
        $branch->save();
        return redirect()->back()->with('success','Company Branch Created');

    }

    public function update(Request $request){
        // $this->validate($request,[
        //     'name'=>'required'
        // ]);

        $branch = CompanyBranch::find($request->input('id'));
        $branch->company_id = $request->input('company');
        $branch->name = $request->input('name');
        $branch->estimated_queue_time = $request->input('queue_time');
        $branch->working_hours = $request->input('working_hours');
        $branch->desc = $request->input('desc');
        $branch->save();
        return redirect()->back()->with('success','Company Branch Updated');
    }


    public function delete(Request $request){
        $branch = CompanyBranch::find($request->input('id'));
        $branch->delete();
        return redirect()->back()->with('success','Company Branch Deleted');
    }

    public function addReceptionist(Request $request){
        $receptionist = new BranchReceptionist;
        $receptionist->name = $request->input('name');
        $receptionist->email = $request->input('email');
        $receptionist->phone = $request->input('phone');
        $receptionist->company_branch_id = $request->input('id');
        $receptionist->password = Hash::make($request->input('password'));
        $receptionist->save();

        return redirect()->back()->with('success','Receptionist Added');
     }

    public function updateReceptionist(Request $request){
        $receptionist = BranchReceptionist::find($request->input('id'));
        $receptionist->name = $request->input('name');
        $receptionist->email = $request->input('email');
        $receptionist->phone = $request->input('phone');
        $receptionist->save();

        return redirect()->back()->with('success','Receptionist Updated');
    }

    public function deleteReceptionist(Request $request){
        $receptionist = BranchReceptionist::find($request->input('id'));
        $receptionist->delete();
        return redirect()->back()->with('success','Receptionist Deleted');
    }

    public function nextPerson(Request $request){
        // $branchID = $request->input('id');
        // $queue = UserQueue::where([
        //     ['company_branch_id', '=', $branchID],
        //     ['status', '=', 'Waiting']
        // ]);


        // if($queue->count()==0)
        //     return redirect()->back()->with('error','There is NO queue');

        // $queue = $queue->first();
        // $queue->status = 'Done';
        // $queue->save();




        // return redirect()->back()->with('success','Next person in front');
    }
}
