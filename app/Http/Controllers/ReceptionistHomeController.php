<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Receptionists;
use App\Models\CompanyBranch;

class ReceptionistHomeController extends Controller{

    public function __construct(){

    }

    public function index(){
        return view('receptionist.home');
    }

    public function queue(){
        $cbi = Receptionists::branchByReceptionistID(Auth::user()->id);
        $data['branch'] = CompanyBranch::with('queues.user')->where('id', '=', $cbi)->get()[0];

        // echo "<pre>";
        // print_r($data['branch'][0]);
        // echo "</pre>";

        return view('receptionist.queue', $data);
    }



}
