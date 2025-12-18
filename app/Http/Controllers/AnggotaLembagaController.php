<?php

namespace App\Http\Controllers;

use App\Models\AnggotaLembaga;
use App\Models\LembagaDesa;
use App\Models\Warga;
use App\Models\JabatanLembaga;
use Illuminate\Http\Request;

class AnggotaLembagaController extends Controller
{
    public function index()
    {
        $anggotas = AnggotaLembaga::with(['warga', 'lembaga', 'jabatan'])
                    ->latest()
                    ->paginate(10);

        return view('anggota_lembaga.index', compact('anggotas'));
    }

    public function create()
    {
        $lembagas = LembagaDesa::orderBy('nama_lembaga')->get();
        $wargas   = Warga::orderBy('nama')->get();
        $jabatans = JabatanLembaga::orderBy('nama_jabatan')->get();

        return view('anggota_lembaga.create', compact('lembagas', 'wargas', 'jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id'  => 'required|exists:lembaga_desa,lembaga_id',
            'warga_id'    => 'required|exists:wargas,id',
            'jabatan_id'  => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai'   => 'nullable|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        AnggotaLembaga::create($request->all());

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Anggota lembaga berhasil ditambahkan.');
    }

    public function edit(AnggotaLembaga $anggota)
    {
        $lembagas = LembagaDesa::orderBy('nama_lembaga')->get();
        $wargas   = Warga::orderBy('nama')->get();
        $jabatans = JabatanLembaga::orderBy('nama_jabatan')->get();

        return view('anggota_lembaga.edit', compact('anggota', 'lembagas', 'wargas', 'jabatans'));
    }

    public function update(Request $request, AnggotaLembaga $anggota)
    {
        $request->validate([
            'lembaga_id'  => 'required|exists:lembaga_desa,lembaga_id',
            'warga_id'    => 'required|exists:wargas,id',
            'jabatan_id'  => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai'   => 'nullable|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Data anggota lembaga berhasil diperbarui.');
    }

    public function destroy(AnggotaLembaga $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Anggota lembaga berhasil dihapus.');
    }
}
