<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pasien;

class KamarController extends Controller
{
    // Method untuk menampilkan daftar kamar
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamars.index', compact('kamars'));
    }

    // Method untuk menampilkan form tambah kamar
    public function create()
    {
        return view('kamars.create');
    }

    // Method untuk menyimpan data kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        Kamar::create($request->all());
        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    // Method untuk menampilkan detail kamar
    public function show($id)
    {
        $kamar = Kamar::find($id);
        return view('kamars.show', compact('kamar'));
    }

    // Method untuk menampilkan form edit kamar
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('kamars.edit', compact('kamar'));
    }

    // Method untuk mengupdate data kamar
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $kamar = Kamar::find($id);
        $kamar->update($request->all());
        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil diperbarui');
    }

    // Method untuk menghapus kamar berdasarkan ID
    public function destroy($id)
    {
        // Menghapus semua pasien yang terkait dengan kamar
        Pasien::where('kamar_id', $id)->delete();

        // Menghapus kamar
        Kamar::destroy($id);

        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil dihapus');
    }
}
