<div class="mb-3">
    <label class="form-label fw-semibold">Nama</label>
    <input type="text" name="nama" class="form-control" 
        value="{{ old('nama', $warga->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">NIK</label>
    <input type="text" name="nik" class="form-control" 
        value="{{ old('nik', $warga->nik ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">No KK</label>
    <input type="text" name="no_kk" class="form-control" 
        value="{{ old('no_kk', $warga->no_kk ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control"
        value="{{ old('tanggal_lahir', isset($warga->tanggal_lahir) ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('Y-m-d') : '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $warga->alamat ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-2 mb-3">
        <label class="form-label fw-semibold">RT</label>
        <input type="text" name="rt" class="form-control"
            value="{{ old('rt', $warga->rt ?? '') }}">
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label fw-semibold">RW</label>
        <input type="text" name="rw" class="form-control"
            value="{{ old('rw', $warga->rw ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Kode Pos</label>
        <input type="text" name="kode_pos" class="form-control"
            value="{{ old('kode_pos', $warga->kode_pos ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Pendidikan</label>
    <input type="text" name="pendidikan" class="form-control"
        value="{{ old('pendidikan', $warga->pendidikan ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Pekerjaan</label>
    <input type="text" name="pekerjaan" class="form-control"
        value="{{ old('pekerjaan', $warga->pekerjaan ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Status Keluarga</label>
    <input type="text" name="status_keluarga" class="form-control"
        value="{{ old('status_keluarga', $warga->status_keluarga ?? '') }}">
</div>

{{-- Upload Foto Profil --}}
 @isset($warga)
        @if(!empty($warga->foto))
<div class="mb-3">
    <label class="form-label fw-semibold">Upload Foto Profil</label>
    <input type="file" name="foto" class="form-control">

    
            </div>
        @endif
    @endisset
</div>
