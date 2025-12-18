<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use Illuminate\Http\Request;

class InformasiUmumController extends Controller
{
    public function index()
    {
        $informasi = InformasiUmum::orderBy('tanggal', 'desc')->get();
        return view('informasi_umum.index', compact('informasi'));
    }

    public function create()
    {
        return view('informasi_umum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        InformasiUmum::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => 'aktif'
        ]);

        return redirect()->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $informasi = InformasiUmum::findOrFail($id);
        return view('informasi_umum.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        $informasi = InformasiUmum::findOrFail($id);
        $informasi->update($request->all());

        return redirect()->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        InformasiUmum::destroy($id);
        return redirect()->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil dihapus');
    }

    // untuk tampilan publik (informasi umum)
    public function publik()
    {
        $informasi = InformasiUmum::where('status', 'aktif')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('informasi_umum.publik', compact('informasi'));
    }
}
