<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use Illuminate\Http\Request;

class InformasiUmumController extends Controller
{
    // ================= ADMIN =================

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
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
        ]);

        InformasiUmum::create([
            'judul'   => $validated['judul'],
            'isi'     => $validated['isi'],
            'tanggal' => $validated['tanggal'],
            'status'  => 'aktif',
        ]);

        return redirect()
            ->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $informasi = InformasiUmum::findOrFail($id);
        return view('informasi_umum.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:aktif,nonaktif',
        ]);

        $informasi = InformasiUmum::findOrFail($id);
        $informasi->update($validated);

        return redirect()
            ->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $informasi = InformasiUmum::findOrFail($id);
        $informasi->delete();

        return redirect()
            ->route('informasi_umum.index')
            ->with('success', 'Informasi berhasil dihapus');
    }

    // ================= PUBLIK =================

    public function publik()
    {
        $informasi = InformasiUmum::where('status', 'aktif')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('informasi_umum.publik', compact('informasi'));
    }
}
