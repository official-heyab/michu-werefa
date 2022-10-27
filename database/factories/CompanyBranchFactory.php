<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CompanyBranch;

class CompanyBranchFactory extends Factory{

    public function definition(){
        return [
            'name' => $this->faker->company(),
            'estimated_queue_time' => $this->faker->numberBetween(5, 30),
            'working_hours' => $this->faker->dayOfWeek(),
            'desc' => $this->faker->catchPhrase(),
        ];
    }


}
