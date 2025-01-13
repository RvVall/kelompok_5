<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_obat_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id(); // Kolom primary key id
            $table->string('kode_obat'); // Kolom kode obat
            $table->string('nama_obat'); // Kolom nama obat
            $table->string('jenis_obat'); // Kolom jenis obat
            $table->decimal('harga', 10, 2); // Kolom harga obat dengan format decimal
            $table->integer('stok'); // Kolom stok obat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats'); // Pastikan nama tabel sesuai dengan yang didefinisikan di 'up()'
    }
}
