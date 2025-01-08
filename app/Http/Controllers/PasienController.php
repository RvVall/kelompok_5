<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('pasien.index');
    }

    public function create()
    {
        return view('pasien.create');
    }
}
