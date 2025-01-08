<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingAplikasiController extends Controller
{
    public function index() {
        // $mahasiswas = Mahasiswa::latest()->paginate(10);

        // return view('mahasiswas.index', compact('mahasiswas'));
        return view('settingaplikasi.settingaplikasi');
    }
}
