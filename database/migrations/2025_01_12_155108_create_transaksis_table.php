<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('pasien_id') // Foreign key to 'pasiens' table
                  ->constrained('pasiens') // Enforces the relationship with the 'pasiens' table
                  ->onDelete('cascade'); // Ensures related transactions are deleted when a pasien is deleted
            $table->date('tanggal'); // Date of the transaction
            $table->timestamps(); // Auto-generated created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis'); // Drops the 'transaksis' table if it exists
    }
};
