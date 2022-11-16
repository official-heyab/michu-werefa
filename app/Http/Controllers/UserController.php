<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//use Auth;
use App\Models\User;
use App\Models\CompanyBranch;
use App\Models\UserQueues;
use App\Models\UserTransactions;

class UserController extends Controller{

    public function __construct(){

    }


    public function store(Request $request){

        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'email|required',
        //     'password' => 'required|string|min:8'
        // ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        $user->roles()->sync($request->input('role'));

        // $balance = new BalanceSheet;
        // $balance->user_id = $user->id;
        // $balance->refill = 0;
        // $balance->current_amount = 0;
        // $balance->refilled_by = 1; //Superadmin;
        // $balance->save();

        return redirect()->back()->with('success','User Created');



    }

    public function update(Request $request){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'email|required'
        // ]);

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        $user->roles()->sync($request->input('role'));

        return redirect()->back()->with('success','User Updated');
    }


    public function delete(Request $request){
        $user = User::find($request->input('id'));
        $user->delete();
        return redirect()->back()->with('success','User Deleted');
    }

    public function getInLine(Request $request){
        // $this->validate($request,[
        //     'company'=>'required'
        // ]);
        $isAdmin = false;
        if($request->input('id')!=null){
            $user = User::find($request->input('id'));
            $isAdmin = true;
        }
        else //use session
            $user = User::find(Auth::user()->id);

        $branch = CompanyBranch::find($request->input('branch'));

        //Check if user is waiting at that company
        $prevQueue = UserQueues::where([
            'user_id'=>$user->id,
            'company_branch_id'=>$branch->id,
            'status'=>'Waiting'])
            ->get();

        if(count($prevQueue)>0)
            return redirect()->back()->with('error','User is already waiting');

        $queue = new UserQueues;
        $queue->user_id = $user->id;
        $queue->company_branch_id = $branch->id;
        $queue->company_id = $branch->company_id;
        $queue->status = 'Waiting';
        $queue->save();

        // Balance Sheet
        $balance = new UserTransactions;
        $balance->user_id = $user->id;
        $balance->depositer_or_queue_id = $branch->id;
        $balance->isWithdrawal = 1;
        $balance->amount = $branch->company->ticket_price;
        $balance->save();



        if($branch->company->ticket_price > $balance->current_amount){
            //Check this only when user creates queue
            //Otherwise its free
            //Display error message
        }
        //redirect to show page
        return redirect()->back()->with('success','Queue Created');

    }

    public function topUp(Request $request){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'email|required'
        // ]);

        $balanceSheet = new UserTransactions;
        $balanceSheet->isWithdrawal = 0;
        $balanceSheet->user_id = $request->input('id');
        $balanceSheet->amount = $request->input('refill');
        $balanceSheet->depositer_or_queue_id = Auth::user()->id; //use session user id
        $balanceSheet->save();

        return redirect()->back()->with('success','User Balance Topped Up');
    }






}
