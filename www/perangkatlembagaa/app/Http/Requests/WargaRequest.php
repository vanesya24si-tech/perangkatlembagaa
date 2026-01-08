<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ubah jika diperlukan pengecekan authorisasi
    }

    public function rules()
    {
        $id = $this->route('warga') ? $this->route('warga')->id ?? null : null;

        return [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:25|unique:wargas,nik,' . $id,
            'no_kk' => 'nullable|string|max:25',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:1000',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'kode_pos' => 'nullable|string|max:10',
            'pendidikan' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:150',
            'status_keluarga' => 'nullable|in:Kepala Keluarga,Istri,Anak,Lainnya',
        ];
    }
}
