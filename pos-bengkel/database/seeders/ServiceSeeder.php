<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder {
    public function run(): void {
        Service::insert([
            ['nama'=>'Ganti Oli', 'harga'=>75000],
            ['nama'=>'Service Ringan', 'harga'=>120000],
            ['nama'=>'Tune Up', 'harga'=>250000],
            ['nama'=>'Cuci Motor', 'harga'=>25000],
        ]);
    }
}

