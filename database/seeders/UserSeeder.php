<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserBalanceSheet;
use App\Models\BranchQueue;

class UserSeeder extends Seeder{

    public function run(){
        User::factory()->count(20)
        ->has(UserBalanceSheet::factory()->count(3))
        ->has(BranchQueue::factory()->count(3))
        ->create();
    }
}
