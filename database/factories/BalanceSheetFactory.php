<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BalanceSheet;

class BalanceSheetFactory extends Factory{

    public function definition(){
        return [
            'isWithdrawal' => $this->faker->boolean(),
            'amount' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
            'transaction_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
