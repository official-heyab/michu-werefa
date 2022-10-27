<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CompanyCategory;

class CompanyCategoryFactory extends Factory{

    public function definition(){
        return [
            'name' => $this->faker->company()
        ];
    }


}
