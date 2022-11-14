<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder{

    public function run(){


        //create admin user
        $user = User::create(array(
            'email' => 'wini@michuwerefa.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name'=> 'Wini G',
            'phone' => "0911",
            'email_verified_at' => now(),
            'remember_token' => '',
        ));


        $user->roles()->attach(1);


    }
}
