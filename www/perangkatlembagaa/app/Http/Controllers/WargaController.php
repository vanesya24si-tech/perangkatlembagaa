<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    public function index()
    {
        $data['dataWarga'] = Warga::paginate(8);
return view('warga.index', $data);

    }
    public function show(Warga $warga)
{
    return view('warga.show', compact('warga'));
}


    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20|unique:wargas,nik',
            'no_kk'         => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'nullable|string|max:1000',
            'rt'            => 'nullable|string|max:10',
            'rw'            => 'nullable|string|max:10',
            'kode_pos'      => 'nullable|string|max:10',
            'pendidikan'    => 'nullable|string|max:100',
            'pekerjaan'     => 'nullable|string|max:150',
            'status_keluarga' => 'nullable|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'foto'          => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->except('foto');

      if ($request->hasFile('foto')) {
    $path = $request->file('foto')->store('warga', 'public');
    $data['foto'] = $path;
}

        Warga::create($data);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20|unique:wargas,nik,' . $warga->id . ',id',
            'no_kk'         => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'nullable|string|max:1000',
            'rt'            => 'nullable|string|max:10',
            'rw'            => 'nullable|string|max:10',
            'kode_pos'      => 'nullable|string|max:10',
            'pendidikan'    => 'nullable|string|max:100',
            'pekerjaan'     => 'nullable|string|max:150',
            'status_keluarga' => 'nullable|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'foto'          => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // hapus foto lama kalau ada
            if ($warga->foto && Storage::disk('public')->exists($warga->foto)) {
                Storage::disk('public')->delete($warga->foto);
            }

            $path = $request->file('foto')->store('warga', 'public');
            $data['foto'] = $path;
        }

        $warga->update($data);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        if ($warga->foto && Storage::disk('public')->exists($warga->foto)) {
            Storage::disk('public')->delete($warga->foto);
        }

        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}
