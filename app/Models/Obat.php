<?php
// app/Models/Obat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not the default 'obats'
    protected $table = 'obats';

    // Define the fillable fields for mass assignment
    protected $fillable = ['kode_obat', 'nama_obat', 'jenis_obat', 'harga', 'stok'];
    // Model Obat
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'obat_transaksi')
                    ->withPivot('jumlah', 'harga')
                    ->withTimestamps();
    }
    
}
