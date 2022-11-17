<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Receptionists extends Model{

    public static function branchByReceptionistID($id){
        // $id = 2;
        return DB::table('receptionists')->where("user_id", "=", $id)
        ->first()->company_branch_id;
    }


}
