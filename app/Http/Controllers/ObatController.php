<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan daftar obat
    public function index()
    {
        $obat = Obat::all(); // Mendapatkan semua data obat
        return view('obat.index', compact('obat')); // Mengirimkan data obat ke view
    }
    
    // Menampilkan form untuk menambahkan obat
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data obat ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'jenis_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // Menyimpan data ke database
        $obat = new Obat();
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->harga = $request->harga;
        $obat->stok = $request->stok;
        $obat->save();
    
        // Redirect setelah berhasil menyimpan
        return redirect()->route('obat.index')->with('success', 'Obat berhasil disimpan!');
    }

    // Menampilkan form untuk mengedit obat
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    // Mengupdate data obat di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_obat' => 'required|string|max:255',
            'nama_obat' => 'required|string|max:255',
            'jenis_obat' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    // Menghapus data obat
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}