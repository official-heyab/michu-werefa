<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Queue;
use App\Models\BalanceSheet;

class UserController extends Controller{

    public function __construct(){

    }

    public function index(){
        //Return the appropriate company page according to the authentication
        $data['users'] = User::with('queues.company')->get();
        $data['companies'] = Company::all();
        return view('admin.user',$data);
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

        $company = Company::find($request->input('company'));

        //Check if user is waiting at that company
        $prevQueue = Queue::where([
            'user_id'=>$user->id,
            'company_id'=>$company->id,
            'status'=>'Waiting'])
            ->get();

        if(count($prevQueue)>0)
            return redirect()->back()->with('error','User is already waiting');

        $queue = new Queue;
        $queue->user_id = $user->id;
        $queue->company_id = $company->id;
        $queue->status = 'Waiting';
        $queue->save();

        // Balance Sheet
        $balance = new BalanceSheet;
        $balance->user_id = $user->id;
        $balance->transaction_id = $company->id;
        $balance->isWithdrawal = 1;
        $balance->amount = $company->ticket_price;
        $balance->save();



        if($company->ticket_price > $balance->current_amount){
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

        $balanceSheet = new BalanceSheet;
        $balanceSheet->isWithdrawal = 0;
        $balanceSheet->user_id = $request->input('id');
        $balanceSheet->amount = $request->input('refill');
        $balanceSheet->transaction_id = 1; //use session user id
        $balanceSheet->save();

        return redirect()->back()->with('success','User Balance Topped Up');
    }






}
