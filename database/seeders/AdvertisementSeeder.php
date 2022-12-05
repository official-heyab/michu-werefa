<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertisement;

class AdvertisementSeeder extends Seeder{

    public function run(){
        Advertisement::factory()->count(3)->create();

        //make one ad current
        $ad = Advertisement::inRandomOrder()->first();
        $ad->isCurrent = true;
        $ad->save();
    }
}
