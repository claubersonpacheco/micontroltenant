<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            //'username' => 'administrador',
            'email' => 'xxxxx@xxxxx.com',
            'email_verified_at' => now(),
            'password' => Hash::make('xxxxxxxx'),
        ]);

//        $user->assignRole('master');
//
//        $user2 = User::create([
//            'name' => 'User',
//            'username' => 'usuarioteste',
//            'mcode' => '',
//            'email' => 'xxxx@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('xxxxxxxxx'),
//        ]);
//
//        $user2->assignRole('user');
    }
}
