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
            'code' => 'MCUS20250001',
            //'username' => 'administrador',
            'email' => 'caubinho@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('cau12345'),
//            'birthday' => '1977-01-18',
//            'rg' => '6.470.098-7',
//            'cpf' => '123.456.789-00',
//            'address' => 'Rua 0001',
//            'number' => '1000',
//            'district' => 'Centro',
//            'city' => 'São Paulo',
        ]);

//        $user->assignRole('master');
//
//        $user2 = User::create([
//            'name' => 'User',
//            'username' => 'usuarioteste',
//            'mcode' => '',
//            'email' => 'user@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('password'),
//            'birth' => '1977-01-18',
//            'rg' => '6.470.098-7',
//            'cpf' => '123.456.789-00',
//            'address' => 'Rua 0001',
//            'number' => '1000',
//            'district' => 'Centro',
//            'city' => 'São Paulo',
//        ]);
//
//        $user2->assignRole('user');
    }
}
