<?php

// app/Http/Controllers/PasienController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kamar;

class PasienController extends Controller
{
    public function create()
    {
        $kamars = Kamar::where('jumlah', '>', 0)->get();
        return view('pasiens.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kamar_id' => 'required|exists:kamars,id'
        ]);

        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        $pasien->kamar_id = $request->kamar_id;
        $pasien->save();

        $kamar = Kamar::find($request->kamar_id);
        $kamar->jumlah -= 1;
        $kamar->save();

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function keluar($id)
    {
        $pasien = Pasien::find($id);
        $kamar = Kamar::find($pasien->kamar_id);
        $kamar->jumlah += 1;
        $kamar->save();

        $pasien->delete();

        return redirect()->route('kamars.index')->with('success', 'Pasien telah keluar dan jumlah kamar telah diperbarui');
    }

    public function index()
    {
        $pasiens = Pasien::with('kamar')->get();
        return view('pasiens.index', compact('pasiens'));
    }
}
