<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('obat_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obat_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('transaksi_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('obat_transaksi');
    }
}
