<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rekam_medis')->unique(); // Nomor rekam medis unik
            $table->string('nama'); // Nama pasien
            $table->text('alamat'); // Alamat pasien
            $table->date('tanggal_lahir'); // Tanggal lahir pasien
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis kelamin
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
