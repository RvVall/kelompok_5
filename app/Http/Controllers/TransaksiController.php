<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pasien;
use App\Models\Obat;
use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF; // Add this at the top


class TransaksiController extends Controller
{
    // Menampilkan Daftar Transaksi
    public function index()
    {
        // Mengambil semua data transaksi beserta relasinya
        $transaksi = Transaksi::with('pasien', 'obats')->get();
        
        return view('transaksi.index', compact('transaksi'));
    }
    
    // Generate Invoice as PDF
    public function generateInvoice($id)
    {
        $transaksi = Transaksi::with('pasien', 'obats')->findOrFail($id);
        
        // Calculate total price
        $total_harga = 0;
        foreach($transaksi->obats as $obat) {
            $total_harga += $obat->harga * $obat->pivot->jumlah;
        }
        
        // Load the invoice view and render it to PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('transaksi.invoice', [
            'transaksi' => $transaksi,
            'total_harga' => $total_harga,
        ]);
        
        $pdf = PDF::loadView('transaksi.invoice', [
            'transaksi' => $transaksi,
            'total_harga' => $total_harga,
        ]);
        // Return the generated PDF for download
        return $pdf->download('invoice_transaksi_'.$transaksi->id.'.pdf');
    }

    // Menampilkan Form untuk Menambah Transaksi Baru
    public function create()
    {
        // Mengambil data pasien dan obat untuk form
        $pasiens = Pasien::all();
        $obats = Obat::all();

        return view('transaksi.create', compact('pasiens', 'obats'));
    }

    // Menyimpan Transaksi
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'obat_id' => 'required|array|min:1',
            'obat_id.*' => 'required|exists:obats,id',
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
        ]);

        try {
            // Membuat Transaksi Baru
            $transaksi = Transaksi::create([
                'pasien_id' => $validatedData['pasien_id'],
                'tanggal' => $validatedData['tanggal'],
            ]);

            // Menambahkan Detail Obat pada Transaksi
            foreach ($validatedData['obat_id'] as $index => $obat_id) {
                $obat = Obat::findOrFail($obat_id); // Memastikan obat ada
                $transaksi->obats()->attach($obat_id, [
                    'jumlah' => $validatedData['jumlah'][$index],
                    'harga' => $obat->harga,
                ]);
            }

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage()]);
        }
    }

    // Menampilkan Form untuk Mengedit Transaksi
    public function edit($id)
    {
        // Mengambil data transaksi yang ingin diedit berdasarkan ID
        $transaksi = Transaksi::with('obats')->findOrFail($id);
        
        // Mengambil data pasien dan obat untuk dropdown
        $pasiens = Pasien::all();
        $obats = Obat::all();

        // Kirim data transaksi, pasien, dan obat ke view edit
        return view('transaksi.edit', compact('transaksi', 'pasiens', 'obats'));
    }

    // Mengupdate Transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        // Update pasien_id and tanggal
        $transaksi->pasien_id = $request->pasien_id;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->save();

        // Update pivot data for obat, jumlah, and harga
        $obatIds = $request->obat_id;
        $jumlah = $request->jumlah;
        $harga = $request->harga;

        $transaksi->obats()->sync([]);
        
        foreach ($obatIds as $index => $obatId) {
            $transaksi->obats()->attach($obatId, [
                'jumlah' => $jumlah[$index],
                'harga' => $harga[$index]
            ]);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully');
    }

    // Menampilkan Detail Transaksi
    public function show($id)
    {
        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::with('pasien', 'obats')->findOrFail($id);

        // Kirim data transaksi ke view
        return view('transaksi.show', compact('transaksi'));
    }

    // Menghapus Transaksi
    public function destroy($id)
    {
        try {
            $transaksi = Transaksi::findOrFail($id); // Mengambil transaksi berdasarkan ID

            // Menghapus relasi dengan obat
            $transaksi->obats()->detach();

            // Menghapus transaksi
            $transaksi->delete();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus transaksi: ' . $e->getMessage()]);
        }
    }
}
