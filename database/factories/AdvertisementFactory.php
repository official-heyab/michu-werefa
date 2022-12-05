<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory{

    public function definition(){
        return [
            'title' => $this->faker->sentence(),
            'desc' => $this->faker->catchPhrase(),
            'link' => $this->faker->url(),
            'isCurrent' => false,
        ];
    }


}
