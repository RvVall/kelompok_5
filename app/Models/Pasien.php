<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nomor_rekam_medis', 'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin'];

    // Relasi dengan Transaksi (One to Many)
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'pasien_id', 'id');
    }
}
