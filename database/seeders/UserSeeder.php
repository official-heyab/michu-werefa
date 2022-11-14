<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserTransactions;
use App\Models\UserQueues;
use App\Models\CompanyBranch;

class UserSeeder extends Seeder{

    public function run(){

        //create userRoles, top up their account, create queue
        foreach(User::factory()->count(20)->create() as $user){
            $user->roles()->attach(3);
            UserTransactions::create(array(
                'user_id' => $user->id,
                'amount' => 100,
                'depositer_or_queue_id' => 1,
                'isWithdrawal' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ));
            $companyBranch = CompanyBranch::inRandomOrder()->first();

            $userQueue = UserQueues::create(array(
                'user_id' => $user->id,
                'company_id' => $companyBranch->company_id,
                'company_branch_id' => $companyBranch->id,
                'status' => array_rand(array ('Waiting','Aborted','Done', 'Skipped')),

            ));

            UserTransactions::create(array(
                'user_id' => $user->id,
                'amount' => $companyBranch->company->ticket_price,
                'depositer_or_queue_id' => $userQueue->id,
                'isWithdrawal' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ));
        }
    }
}
