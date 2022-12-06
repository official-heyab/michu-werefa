<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    public function run(){

        $this->call([
            CompanySeeder::class,
            RolesSeeder::class,
            AdminSeeder::class,
            ReceptionistsSeeder::class,
            UserSeeder::class,
            AdvertisementSeeder::class,
        ]);
    }
}
