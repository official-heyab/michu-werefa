<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserQueues;
use App\Models\Receptionists;
use App\Http\Controllers\MailController;

class ReceptionistController extends Controller{

    public function __construct(){

    }

    public function store(Request $request){
        $user = User::find($request->input('user_id'));
        $uri = $user->roles()->where("roles_id", "=",2)->withPivot("id")->orderBy('created_at', 'desc')->first()->pivot->id;


        $receptionist = new Receptionists;
        $receptionist->user_id = $user->id;;
        $receptionist->user_role_id = $uri;
        $receptionist->company_branch_id = $request->input('id');
        $receptionist->save();

        return redirect()->back()->with('success','Receptionist Added');
     }

    public function delete(Request $request){
        $receptionist = Receptionists::where('company_branch_id', $request->input('id'))
        ->where('user_id', $request->input('user_id'))->get();
        $receptionist->each->delete();
        return redirect()->back()->with('success','Receptionist Deleted');
    }

    public function nextPerson(Request $request){
        $branchID = $request->input('id');
        $queue = UserQueues::where([
            ['company_branch_id', '=', $branchID],
            ['status', '=', 'Waiting']
        ]);

        if($queue->count()==0)
            return redirect()->back()->with('error','There is NO queue');

        $queue = $queue->first();
        $queue->status = 'Done';
        $queue->save();

        //send email
        $mail = new MailController;
        $mail->queueCancelledEmail($queue);

        return redirect()->back()->with('success','Next person in front');
    }
}
