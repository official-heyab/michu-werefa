<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyCategory;
use App\Models\Company;
use App\Models\CompanyBranch;

class CompanySeeder extends Seeder{

    public function run(){
        CompanyCategory::factory()->count(5)
            ->has(Company::factory()->count(5)
                ->has(CompanyBranch::factory()->count(3)
        ))->create();
    }
}
