<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['pasien_id', 'tanggal'];

    // Relasi ke Pasien (Many-to-One)
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    // Relasi ke Obat (Many-to-Many)
    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'obat_transaksi')
                    ->withPivot('jumlah', 'harga')
                    ->withTimestamps();
    }
}
