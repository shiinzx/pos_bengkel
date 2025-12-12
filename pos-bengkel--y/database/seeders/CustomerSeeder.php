<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder {
    public function run(): void {
        Customer::insert([
            ['nama'=>'Budi', 'no_hp'=>'081234567890', 'alamat'=>'Jakarta'],
            ['nama'=>'Agus', 'no_hp'=>'089876543210', 'alamat'=>'Bandung'],
            ['nama'=>'Santi', 'no_hp'=>'082233445566', 'alamat'=>'Bekasi'],
        ]);
    }
}

