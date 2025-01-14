<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan semua data supplier
    public function index()
    {
        $suppliers = Supplier::all(); // Mengambil semua data supplier
        return view('suppliers.index', compact('suppliers')); // Mengirim data supplier ke view
    }

    // Menampilkan form untuk membuat supplier baru
    public function create()
    {
        return view('suppliers.create'); // Menampilkan form untuk input data supplier
    }

    // Menyimpan data supplier baru ke database
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'nullable|email', // Validasi email jika ada
            'data_obat_supplier' => 'nullable|string', // Validasi data obat supplier
        ]);

        // Menyimpan data supplier ke database
        Supplier::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'kontak' => $request->input('kontak'),
            'email' => $request->input('email'),
            'data_obat_supplier' => $request->input('data_obat_supplier'),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data supplier
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier')); // Mengirim data supplier yang ingin diedit ke view
    }

    // Memperbarui data supplier yang sudah ada
    public function update(Request $request, Supplier $supplier)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'nullable|email',
            'data_obat_supplier' => 'nullable|string',
        ]);

        // Update data supplier
        $supplier->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'kontak' => $request->input('kontak'),
            'email' => $request->input('email'),
            'data_obat_supplier' => $request->input('data_obat_supplier'),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Menghapus data supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete(); // Menghapus data supplier
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
