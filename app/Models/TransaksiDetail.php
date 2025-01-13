<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TransaksiDetail extends Pivot
{
    // If needed, you can define additional properties here
    protected $table = 'transaksi_obat';  // Specify the pivot table name
    protected $fillable = ['transaksi_id', 'obat_id', 'jumlah']; // Fields that can be mass-assigned
}
