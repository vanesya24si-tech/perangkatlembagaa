<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'kategori' => 'required|string',
            'pesan' => 'required|string|max:1000',
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $paths = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $paths[] = $file->store('pengaduan', 'public');
            }
        }

        Pengaduan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'kategori' => $request->kategori,
            'pesan' => $request->pesan,
            'lampiran' => $paths ? json_encode($paths) : null,
        ]);

        return redirect()->back()->with(
            'success',
            'Pengaduan berhasil dikirim.'
        );
    }
}
