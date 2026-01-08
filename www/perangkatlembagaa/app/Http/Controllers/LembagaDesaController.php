<?php

namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use App\Models\Media;
use Illuminate\Http\Request;

class LembagaDesaController extends Controller
{
    public function index()
    {
        $lembagas = LembagaDesa::with('media')->latest()->paginate(9);
        return view('lembaga.index', compact('lembagas'));
    }

    public function create()
    {
        return view('lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'logo'         => 'nullable|image|max:2048',
        ]);

        $lembaga = LembagaDesa::create($request->except('logo'));

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads/lembaga_desa', 'public');

            Media::create([
                'ref_table' => 'lembaga_desa',
                'ref_id'    => $lembaga->lembaga_id,
                'file_url'  => 'storage/' . $path,
                'mime_type' => $request->file('logo')->getClientMimeType(),
                'caption'   => 'Logo Lembaga Desa'
            ]);
        }

        return redirect()->route('lembaga.index')->with('success', 'Lembaga desa berhasil ditambahkan.');
    }

    public function show(LembagaDesa $lembaga)
    {
        $lembaga->load('media');
        return view('lembaga.show', compact('lembaga'));
    }

    public function edit(LembagaDesa $lembaga)
    {
        $lembaga->load('media');
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, LembagaDesa $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'logo'         => 'nullable|image|max:2048',
        ]);

        $lembaga->update($request->except('logo'));

        if ($request->hasFile('logo')) {

            foreach ($lembaga->media as $m) {
                if (file_exists(public_path($m->file_url))) {
                    unlink(public_path($m->file_url));
                }
                $m->delete();
            }

            $path = $request->file('logo')->store('uploads/lembaga_desa', 'public');

            Media::create([
                'ref_table' => 'lembaga_desa',
                'ref_id'    => $lembaga->lembaga_id,
                'file_url'  => 'storage/' . $path,
                'mime_type' => $request->file('logo')->getClientMimeType(),
                'caption'   => 'Logo Lembaga Desa'
            ]);
        }

        return redirect()->route('lembaga.index')->with('success', 'Lembaga desa berhasil diperbarui.');
    }

    public function destroy(LembagaDesa $lembaga)
    {
        foreach ($lembaga->media as $m) {
            if (file_exists(public_path($m->file_url))) {
                unlink(public_path($m->file_url));
            }
            $m->delete();
        }

        $lembaga->delete();

        return redirect()->route('lembaga.index')->with('success', 'Data lembaga berhasil dihapus.');
    }
}
