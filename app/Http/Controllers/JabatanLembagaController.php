<?php

namespace App\Http\Controllers;

use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class JabatanLembagaController extends Controller
{
    public function index()
    {
        $jabatans = JabatanLembaga::with('lembaga')->latest()->paginate(10);
        return view('jabatan_lembaga.index', compact('jabatans'));
    }

    public function create()
    {
        $lembagas = LembagaDesa::orderBy('nama_lembaga')->get();
        return view('jabatan_lembaga.create', compact('lembagas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
            'nama_jabatan' => 'required|string|max:255',
            'level'        => 'required|integer|min:1',
        ]);

        JabatanLembaga::create($request->all());

        return redirect()->route('jabatan-lembaga.index')
            ->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function edit(JabatanLembaga $jabatan_lembaga)
    {
        $lembagas = LembagaDesa::orderBy('nama_lembaga')->get();

        return view('jabatan_lembaga.edit', [
            'jabatan'  => $jabatan_lembaga,
            'lembagas' => $lembagas
        ]);
    }

    public function update(Request $request, JabatanLembaga $jabatan_lembaga)
    {
        $request->validate([
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
            'nama_jabatan' => 'required|string|max:255',
            'level'        => 'required|integer|min:1',
        ]);

        $jabatan_lembaga->update($request->all());

        return redirect()->route('jabatan-lembaga.index')
            ->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(JabatanLembaga $jabatan_lembaga)
    {
        $jabatan_lembaga->delete();

        return redirect()->route('jabatan-lembaga.index')
            ->with('success', 'Jabatan berhasil dihapus.');
    }
}
