<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Receptionist;

class CompanySeeder extends Seeder{

    public function run(){
        Company::factory()->count(20)
        ->has(Receptionist::factory()->count(3))
        ->create();
    }
}
