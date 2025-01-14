<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'email',
        'data_obat_supplier',
    ];
}
