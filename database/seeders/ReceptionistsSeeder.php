<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CompanyBranch;
use App\Models\Receptionists;

class ReceptionistsSeeder extends Seeder{

    public function run(){

        //create receptionisit for each branch
        foreach(CompanyBranch::all() as $companyBranch){
            foreach(User::factory()->count(3)->create() as $user){
                $user->roles()->attach(2);
                $user = $user->fresh();
                $uri = $user->roles()->where("roles_id", "=",2)->withPivot("id")->orderBy('created_at', 'desc')->first()->pivot->id;

                Receptionists::create(array(
                    'user_id' => $user->id,
                    'user_role_id'=> $uri,
                    'company_branch_id'=> $companyBranch->id
                ));
            }
        }

    }
}
