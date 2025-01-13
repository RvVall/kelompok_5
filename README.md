Konfigurasi Laravel 11 + AdminLTE 3 + Seed Database Apotek
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
Copy code
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

bash
Copy code
composer install
6. Generate Key Laravel
Jalankan perintah berikut untuk menghasilkan aplikasi key:

bash
Copy code
php artisan key:generate
7. Migrasi Database
Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

bash
Copy code
php artisan migrate
8. Buat Seeder untuk Tabel Obat
Jalankan perintah untuk membuat seeder untuk tabel obats:

bash
Copy code
php artisan make:seeder ObatSeeder
9. Edit Seeder ObatSeeder.php
Masuk ke file database/seeders/ObatSeeder.php dan masukkan data contoh obat dengan harga dan deskripsi yang sesuai:

php
Copy code
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    public function run()
    {
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
            // Add more items here...
        ]);
    }
}
10. Jalankan Seeder untuk Memasukkan Data
Setelah membuat seeder, jalankan perintah berikut untuk menambahkan data ke dalam database:

bash
Copy code
php artisan db:seed --class=ObatSeeder
11. Instalasi Library DomPDF untuk PDF
Install package barryvdh/laravel-dompdf untuk mengonversi data ke format PDF:

bash
Copy code
composer require barryvdh/laravel-dompdf
12. Update config/app.php
Buka file config/app.php dan lakukan konfigurasi sebagai berikut:

Tambah Service Provider di dalam array providers:

php
Copy code
'providers' => [
    // Provider lainnya...
    Barryvdh\DomPDF\ServiceProvider::class,
]
Tambah Alias di dalam array aliases:

php
Copy code
'aliases' => [
    // Alias lainnya...
    'PDF' => Barryvdh\DomPDF\Facade::class,
]
13. Jalankan Aplikasi Laravel
Setelah semua langkah selesai, jalankan aplikasi Laravel dengan perintah:

bash
Copy code
php artisan serve
Aplikasi akan berjalan di http://localhost:8000.
