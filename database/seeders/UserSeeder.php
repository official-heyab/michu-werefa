<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BalanceSheet;
use App\Models\Queue;

class UserSeeder extends Seeder{

    public function run(){
        User::factory()->count(20)
        ->has(BalanceSheet::factory()->count(3))
        ->has(Queue::factory()->count(3))
        ->create();
    }
}
