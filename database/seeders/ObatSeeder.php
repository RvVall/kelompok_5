<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    public function run()
    {
        // Sample data for obat (medications) with fields: kode_obat, nama_obat, jenis_obat, harga, stok
        DB::table('obats')->insert([
            [
                'kode_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol 500mg',
                'jenis_obat' => 'Analgesik / Antipiretik',
                'harga' => 8500, // Example price in IDR
                'stok' => 100, // Example stock
            ],
            [
                'kode_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis_obat' => 'Antibiotik',
                'harga' => 25000, // Example price in IDR
                'stok' => 50, // Example stock
            ],
            [
                'kode_obat' => 'OBT003',
                'nama_obat' => 'Ibuprofen 400mg',
                'jenis_obat' => 'Anti-inflamasi',
                'harga' => 15000, // Example price in IDR
                'stok' => 75, // Example stock
            ],
            [
                'kode_obat' => 'OBT004',
                'nama_obat' => 'Cetirizine 10mg',
                'jenis_obat' => 'Antihistamin',
                'harga' => 12000, // Example price in IDR
                'stok' => 200, // Example stock
            ],
            [
                'kode_obat' => 'OBT005',
                'nama_obat' => 'Omeprazole 20mg',
                'jenis_obat' => 'Antasid / Proton Pump Inhibitor',
                'harga' => 30000, // Example price in IDR
                'stok' => 60, // Example stock
            ],
            [
                'kode_obat' => 'OBT006',
                'nama_obat' => 'Loperamide 2mg',
                'jenis_obat' => 'Antidiarrheal',
                'harga' => 8000, // Example price in IDR
                'stok' => 120, // Example stock
            ],
            [
                'kode_obat' => 'OBT007',
                'nama_obat' => 'Amlodipine 5mg',
                'jenis_obat' => 'Antihipertensi',
                'harga' => 20000, // Example price in IDR
                'stok' => 80, // Example stock
            ],
            [
                'kode_obat' => 'OBT008',
                'nama_obat' => 'Diphenhydramine 25mg',
                'jenis_obat' => 'Antihistamin',
                'harga' => 13000, // Example price in IDR
                'stok' => 150, // Example stock
            ],
            [
                'kode_obat' => 'OBT009',
                'nama_obat' => 'Ciprofloxacin 500mg',
                'jenis_obat' => 'Antibiotik',
                'harga' => 22000, // Example price in IDR
                'stok' => 70, // Example stock
            ],
            [
                'kode_obat' => 'OBT010',
                'nama_obat' => 'Salbutamol 100mcg',
                'jenis_obat' => 'Bronkodilator',
                'harga' => 18000, // Example price in IDR
                'stok' => 90, // Example stock
            ]
        ]);
    }
}
