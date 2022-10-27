<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BranchQueue;
use App\Models\CompanyBranch;

class BranchQueueFactory extends Factory{

    public function definition(){

        return [
            'company_branch_id' => CompanyBranch::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement($array =
                            array ('Waiting','Aborted','Done', 'Skipped')),
        ];
    }
}
