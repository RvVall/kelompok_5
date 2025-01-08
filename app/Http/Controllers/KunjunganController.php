<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function create()
    {
        return view('kunjungan.create');
    }
}
