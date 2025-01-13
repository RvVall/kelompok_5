# Laravel 11 + AdminLTE 3

AdminLTE 3 for Laravel 11.

| Laravel Version | Branch |
| :-------------: | :----: |
|       11        |  main  |
|       10        |  10.x  |
|        9        |  9.x   |
|        8        |  8.x   |

## Requirements

-   PHP >= 8.2.0
-   BCMath PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension

## Installation

-   Clone the repo and `cd` into it
-   Run `composer install`
-   Rename or copy `.env.example` file to `.env`
-   Run `php artisan key:generate`
-   Set your database credentials in your `.env` file
-   Run migration `php artisan migrate`
-   Make something awesome!

## Todo Lists

-   LaravelEasyNav implementation
-   Preview screenshots
-   More pages...

## Note

Recommend to install this preset on a project that you are starting from scratch, otherwise your project's design might break.

## Credits

Laravel AdminLTE 3 uses some open-source third-party libraries/packages, many thanks to the web community.

-   Laravel - Open source framework.
-   AdminLTE 3 - Thanks to ColorlibHQ

## Preview

## License

Licensed under the MIT license.


Langkah Configurasi
1. pull repository kelompok_5 ini/dowwnload
2. pastikan lokasinya di dalam htdocs
3. ekstak zipnya jika berbentuk zip
4. masuk ke vscode
5. masuk ke env kemudian setting databasenya dengan nama apotek
6. buat database apotek di localhost
7. masuk ke terminal vscode
8. ketikan "php artisan migrate"
9. kemudian ketik " php artisan make:seeder ObatSeeder"
10. Masuk ke seeder "ObatSeeder.php"
11. Masukkan isi "ObatSeeder.php"
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    public function run()
    {
        // Sample data for obat (medications) with realistic prices and descriptions
        DB::table('obats')->insert([
            [
                'nama_obat' => 'Paracetamol 500mg',
                'harga' => 8500, // Example price in IDR
                'deskripsi' => 'Obat penurun demam dan pereda nyeri, umum digunakan untuk sakit kepala, flu, dan nyeri otot.',
            ],
            [
                'nama_obat' => 'Amoxicillin 500mg',
                'harga' => 25000, // Example price in IDR
                'deskripsi' => 'Antibiotik untuk mengatasi infeksi bakteri, termasuk infeksi saluran pernapasan, telinga, dan saluran kemih.',
            ],
            [
                'nama_obat' => 'Ibuprofen 400mg',
                'harga' => 15000, // Example price in IDR
                'deskripsi' => 'Obat antiinflamasi non-steroid (NSAID) untuk mengurangi nyeri, demam, dan peradangan.',
            ],
            [
                'nama_obat' => 'Cetirizine 10mg',
                'harga' => 12000, // Example price in IDR
                'deskripsi' => 'Antihistamin untuk mengatasi gejala alergi seperti hidung tersumbat, bersin, dan gatal-gatal pada kulit.',
            ],
            [
                'nama_obat' => 'Omeprazole 20mg',
                'harga' => 30000, // Example price in IDR
                'deskripsi' => 'Obat yang digunakan untuk mengurangi produksi asam lambung, mengobati tukak lambung dan GERD.',
            ],
            [
                'nama_obat' => 'Loperamide 2mg',
                'harga' => 8000, // Example price in IDR
                'deskripsi' => 'Obat untuk mengatasi diare akut dengan cara memperlambat gerakan usus.',
            ],
            [
                'nama_obat' => 'Amlodipine 5mg',
                'harga' => 20000, // Example price in IDR
                'deskripsi' => 'Obat untuk mengobati hipertensi (tekanan darah tinggi) dan angina (nyeri dada).',
            ],
            [
                'nama_obat' => 'Diphenhydramine 25mg',
                'harga' => 13000, // Example price in IDR
                'deskripsi' => 'Antihistamin yang digunakan untuk meredakan alergi, insomnia, dan sebagai obat anti-mabuk perjalanan.',
            ],
            [
                'nama_obat' => 'Ciprofloxacin 500mg',
                'harga' => 22000, // Example price in IDR
                'deskripsi' => 'Antibiotik yang digunakan untuk mengobati berbagai infeksi bakteri, termasuk infeksi saluran pernapasan dan saluran kemih.',
            ],
            [
                'nama_obat' => 'Salbutamol 100mcg',
                'harga' => 18000, // Example price in IDR
                'deskripsi' => 'Obat bronkodilator yang digunakan untuk mengatasi gejala asma dan bronkitis.',
            ]
        ]);
    }
}
12. kemudian push db seed nya dengan mengetik "php artisan db:seed --class=ObatSeeder"

13.Install di terminal vscode "composer require barryvdh/laravel-dompdf"// untuk pdf

14. Buka file config/app.php.

Di dalam array providers, tambahkan:

"Barryvdh\DomPDF\ServiceProvider::class,"

Di dalam array aliases, tambahkan:

"'PDF' => Barryvdh\DomPDF\Facade::class,"

15. php artisan serve untuk menjalankan program Sistem Apotek tersebut

