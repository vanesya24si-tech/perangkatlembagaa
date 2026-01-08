<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Media;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::with(['warga', 'media'])
                        ->latest()
                        ->paginate(10);

        return view('perangkat.index', compact('perangkats'));
    }

    public function create()
    {
        $wargas = Warga::orderBy('nama')->get();
        return view('perangkat.create', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'        => 'required|exists:wargas,id',   // FIX
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'nullable|string|max:20',
            'periode_mulai'   => 'nullable|date',
            'periode_selesai' => 'nullable|date',
            'foto'            => 'nullable|image|max:2048',
        ]);

        // Simpan data perangkat
        $perangkat = PerangkatDesa::create($request->except('foto'));

        // Upload foto perangkat
        if ($request->hasFile('foto'))
        {
            $path = $request->file('foto')->store('perangkat_desa', 'public');

            Media::create([
                'ref_table' => 'perangkat_desa',
                'ref_id'    => $perangkat->perangkat_id,
                'file_url'  => '/storage/' . $path,
                'mime_type' => $request->file('foto')->getMimeType(),
                'caption'   => 'Foto Perangkat Desa',
            ]);
        }

        return redirect()->route('perangkat.index')
            ->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function show(PerangkatDesa $perangkat)
    {
        $perangkat->load(['warga', 'media']);
        return view('perangkat.show', compact('perangkat'));
    }

    public function edit(PerangkatDesa $perangkat)
    {
        $wargas = Warga::orderBy('nama')->get();
        $perangkat->load(['warga', 'media']);

        return view('perangkat.edit', compact('perangkat', 'wargas'));
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $request->validate([
            'warga_id'        => 'required|exists:wargas,id',   // FIX
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'nullable|string|max:20',
            'periode_mulai'   => 'nullable|date',
            'periode_selesai' => 'nullable|date',
            'foto'            => 'nullable|image|max:2048',
        ]);

        // Update data perangkat
        $perangkat->update($request->except('foto'));

        // Update foto jika ada foto baru
        if ($request->hasFile('foto'))
        {
            // Hapus foto lama
            if ($perangkat->media) {
                $oldPath = str_replace('/storage/', '', $perangkat->media->file_url);
                Storage::disk('public')->delete($oldPath);
                $perangkat->media->delete();
            }

            // Upload foto baru
            $path = $request->file('foto')->store('perangkat_desa', 'public');

            Media::create([
                'ref_table' => 'perangkat_desa',
                'ref_id'    => $perangkat->perangkat_id,
                'file_url'  => '/storage/' . $path,
                'mime_type' => $request->file('foto')->getMimeType(),
                'caption'   => 'Foto Perangkat Desa',
            ]);
        }

        return redirect()->route('perangkat.index')
            ->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        // Hapus foto dari media
        if ($perangkat->media)
        {
            $oldPath = str_replace('/storage/', '', $perangkat->media->file_url);
            Storage::disk('public')->delete($oldPath);
            $perangkat->media->delete();
        }

        // Hapus data perangkat
        $perangkat->delete();

        return redirect()->route('perangkat.index')
            ->with('success', 'Data perangkat desa berhasil dihapus.');
    }
}
