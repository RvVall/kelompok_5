Langkah-Langkah Konfigurasi Laravel 11 + AdminLTE 3 + Seed Database Apotek
1. Persiapkan Project
Clone Repository atau Download Project:
Pull atau download repository dari kelompok_5.
Pastikan Lokasi Project:
Pastikan project berada di dalam folder htdocs (untuk XAMPP).
Ekstrak File ZIP:
Jika project berbentuk file ZIP, ekstrak terlebih dahulu.

2. Buka Project di VSCode
Buka folder project di VSCode.

3. Set Environment
Salin file .env.example menjadi .env.
Buka file .env dan set konfigurasi database Anda dengan nama apotek:
env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=apotek
DB_USERNAME=root
DB_PASSWORD=

4. Buat Database di Localhost
Masuk ke PhpMyAdmin di browser (http://localhost/phpmyadmin).
Buat database baru dengan nama apotek.

5. Install Dependency dengan Composer
Buka terminal di VSCode, pastikan berada di dalam folder project, lalu jalankan perintah:


composer install

6. Generate Key Laravel
Jalankan perintah berikut untuk menghasilkan aplikasi key:


php artisan key:generate

7. Migrasi Database
Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:


php artisan migrate

8. Buat Seeder untuk Tabel Obat
Jalankan perintah untuk membuat seeder untuk tabel obats:


php artisan make:seeder ObatSeeder

9. Edit Seeder ObatSeeder.php
Masuk ke file database/seeders/ObatSeeder.php dan masukkan data contoh obat dengan harga dan deskripsi yang sesuai:


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    public function run()
    {
        // Sample data for obat (medications) with additional fields like kode_obat, jenis_obat, and stok
        DB::table('obats')->insert([
            [
                'kode_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol 500mg',
                'jenis_obat' => 'Analgesik / Antipiretik',
                'harga' => 8500, // Example price in IDR
                'stok' => 100, // Example stock
                'deskripsi' => 'Obat penurun demam dan pereda nyeri, umum digunakan untuk sakit kepala, flu, dan nyeri otot.',
            ],
            [
                'kode_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis_obat' => 'Antibiotik',
                'harga' => 25000, // Example price in IDR
                'stok' => 50, // Example stock
                'deskripsi' => 'Antibiotik untuk mengatasi infeksi bakteri, termasuk infeksi saluran pernapasan, telinga, dan saluran kemih.',
            ],
            [
                'kode_obat' => 'OBT003',
                'nama_obat' => 'Ibuprofen 400mg',
                'jenis_obat' => 'Anti-inflamasi',
                'harga' => 15000, // Example price in IDR
                'stok' => 75, // Example stock
                'deskripsi' => 'Obat antiinflamasi non-steroid (NSAID) untuk mengurangi nyeri, demam, dan peradangan.',
            ],
            [
                'kode_obat' => 'OBT004',
                'nama_obat' => 'Cetirizine 10mg',
                'jenis_obat' => 'Antihistamin',
                'harga' => 12000, // Example price in IDR
                'stok' => 200, // Example stock
                'deskripsi' => 'Antihistamin untuk mengatasi gejala alergi seperti hidung tersumbat, bersin, dan gatal-gatal pada kulit.',
            ],
            [
                'kode_obat' => 'OBT005',
                'nama_obat' => 'Omeprazole 20mg',
                'jenis_obat' => 'Antasid / Proton Pump Inhibitor',
                'harga' => 30000, // Example price in IDR
                'stok' => 60, // Example stock
                'deskripsi' => 'Obat yang digunakan untuk mengurangi produksi asam lambung, mengobati tukak lambung dan GERD.',
            ],
            [
                'kode_obat' => 'OBT006',
                'nama_obat' => 'Loperamide 2mg',
                'jenis_obat' => 'Antidiarrheal',
                'harga' => 8000, // Example price in IDR
                'stok' => 120, // Example stock
                'deskripsi' => 'Obat untuk mengatasi diare akut dengan cara memperlambat gerakan usus.',
            ],
            [
                'kode_obat' => 'OBT007',
                'nama_obat' => 'Amlodipine 5mg',
                'jenis_obat' => 'Antihipertensi',
                'harga' => 20000, // Example price in IDR
                'stok' => 80, // Example stock
                'deskripsi' => 'Obat untuk mengobati hipertensi (tekanan darah tinggi) dan angina (nyeri dada).',
            ],
            [
                'kode_obat' => 'OBT008',
                'nama_obat' => 'Diphenhydramine 25mg',
                'jenis_obat' => 'Antihistamin',
                'harga' => 13000, // Example price in IDR
                'stok' => 150, // Example stock
                'deskripsi' => 'Antihistamin yang digunakan untuk meredakan alergi, insomnia, dan sebagai obat anti-mabuk perjalanan.',
            ],
            [
                'kode_obat' => 'OBT009',
                'nama_obat' => 'Ciprofloxacin 500mg',
                'jenis_obat' => 'Antibiotik',
                'harga' => 22000, // Example price in IDR
                'stok' => 70, // Example stock
                'deskripsi' => 'Antibiotik yang digunakan untuk mengobati berbagai infeksi bakteri, termasuk infeksi saluran pernapasan dan saluran kemih.',
            ],
            [
                'kode_obat' => 'OBT010',
                'nama_obat' => 'Salbutamol 100mcg',
                'jenis_obat' => 'Bronkodilator',
                'harga' => 18000, // Example price in IDR
                'stok' => 90, // Example stock
                'deskripsi' => 'Obat bronkodilator yang digunakan untuk mengatasi gejala asma dan bronkitis.',
            ]
        ]);
    }
}

10. Jalankan Seeder untuk Memasukkan Data
Setelah membuat seeder, jalankan perintah berikut untuk menambahkan data ke dalam database:


php artisan db:seed --class=ObatSeeder

11. Instalasi Library DomPDF untuk PDF
Install package barryvdh/laravel-dompdf untuk mengonversi data ke format PDF:


composer require barryvdh/laravel-dompdf

12. Update config/app.php
Buka file config/app.php dan lakukan konfigurasi sebagai berikut:
Tambah Service Provider di dalam array providers:

'providers' => [
    // Provider lainnya...
    Barryvdh\DomPDF\ServiceProvider::class,
]

Tambah Alias di dalam array aliases:


'aliases' => [
    // Alias lainnya...
    'PDF' => Barryvdh\DomPDF\Facade::class,
]

13. Jalankan Aplikasi Laravel
Setelah semua langkah selesai, jalankan aplikasi Laravel dengan perintah:


php artisan serve

Aplikasi akan berjalan di http://localhost:8000.
