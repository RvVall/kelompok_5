<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all()->sortDesc();

        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {

        //tambah data dosen
        DB::table('dosens')->insert([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('dosen.index');
    }

    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        // validasi data
        // $request->validate(
        //     [
        //         'nama' => 'required|max:45',
        //         'jenis' => 'required|max:45',
        //         'harga_jual' => 'required|numeric',
        //         'harga_beli' => 'required|numeric',
        //         'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        //     ],
        //     [
        //         'nama.required' => 'Nama wajib diisi',
        //         'nama.max' => 'Nama maksimal 45 karakter',
        //         'jenis.required' => 'jenis wajib diisi',
        //         'jenis.max' => 'jenis maksimal 45 karakter',
        //         'foto.max' => 'Foto maksimal 2 MB',
        //         'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        //         'foto.image' => 'File harus berbentuk image'
        //     ]
        // );

        //update data
        DB::table('dosens')->where('id', $id)->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('dosen.index');
    }

    public function show(string $id)
    {
        $dosen = Dosen::findorFail($id);

        return view('dosen.show', compact('dosen'));
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);

        //delete
        $dosen->delete();

        return redirect()->route('dosen.index');
    }
}
