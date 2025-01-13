<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Menampilkan daftar pasien.
     */
    public function index()
    {
        // Ambil semua data pasien dari database
        $pasiens = Pasien::latest()->get();

        // Kirim data pasien ke view pasien/pasien.blade.php
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Menampilkan form untuk menambahkan pasien baru.
     */
    public function create()
    {
        // Arahkan ke view create pasien
        return view('pasien.create');
    }

    /**
     * Menyimpan data pasien baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nomor_rekam_medis' => 'required|unique:pasiens|max:20',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Simpan data ke database
        Pasien::create([
            'nomor_rekam_medis' => $request->nomor_rekam_medis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Redirect ke halaman daftar pasien
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit pasien.
     */
    public function edit($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Arahkan ke view edit pasien
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Mengupdate data pasien di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nomor_rekam_medis' => 'required|max:20|unique:pasiens,nomor_rekam_medis,' . $id,
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Update data pasien
        $pasien = Pasien::findOrFail($id);
        $pasien->update([
            'nomor_rekam_medis' => $request->nomor_rekam_medis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Redirect ke halaman daftar pasien
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    /**
     * Menghapus pasien dari database.
     */
    public function destroy($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Hapus data pasien
        $pasien->delete();

        // Redirect ke halaman daftar pasien
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
