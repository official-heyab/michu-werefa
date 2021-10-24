<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Queue;
use App\Models\Company;

class QueueFactory extends Factory{

    public function definition(){

        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement($array =
                            array ('Waiting','Aborted','Done', 'Skipped')),
        ];
    }
}
