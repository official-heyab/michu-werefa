<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder{

    public function run(){

        //create roles
        $roles = [
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'receptionist'],
            ['id' => 3, 'name' => 'user']
        ];

        Roles::insert($roles);


    }
}
