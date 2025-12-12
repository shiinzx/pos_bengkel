<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::insert([
            [
                'name'=>'Admin',
                'email'=>'admin@example.com',
                'password'=>Hash::make('password'),
                'role'=>'admin'
            ],
            [
                'name'=>'Kasir',
                'email'=>'kasir@example.com',
                'password'=>Hash::make('password'),
                'role'=>'kasir'
            ]
        ]);
    }
}

