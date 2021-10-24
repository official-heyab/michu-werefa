<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class CompanyFactory extends Factory{

    public function definition(){
        return [
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(),
            'desc' => $this->faker->catchPhrase(),
            'ticket_price' => $this->faker->numberBetween(1, 5),
        ];
    }


}
