{{-- ===================== IDENTITAS ===================== --}}
<div class="mb-3">
    <div class="fw-bold">Identitas</div>
    <div class="text-muted small">Isi data sesuai KTP/KK.</div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
        <input type="text"
               name="nama"
               class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $warga->nama ?? '') }}"
               placeholder="Contoh: Budi Santoso"
               required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
        <input type="text"
               name="nik"
               class="form-control @error('nik') is-invalid @enderror"
               value="{{ old('nik', $warga->nik ?? '') }}"
               placeholder="16 digit"
               required>
        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">No KK</label>
        <input type="text"
               name="no_kk"
               class="form-control @error('no_kk') is-invalid @enderror"
               value="{{ old('no_kk', $warga->no_kk ?? '') }}"
               placeholder="Nomor KK">
        @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
        <select name="jenis_kelamin"
                class="form-select @error('jenis_kelamin') is-invalid @enderror"
                required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                Laki-laki
            </option>
            <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                Perempuan
            </option>
        </select>
        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
        <input type="date"
               name="tanggal_lahir"
               class="form-control @error('tanggal_lahir') is-invalid @enderror"
               value="{{ old('tanggal_lahir', isset($warga->tanggal_lahir) ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('Y-m-d') : '') }}"
               required>
        @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<hr class="my-4">

{{-- ===================== ALAMAT ===================== --}}
<div class="mb-3">
    <div class="fw-bold">Alamat</div>
    <div class="text-muted small">Lengkapi alamat tempat tinggal.</div>
</div>

<div class="row g-3">
    <div class="col-12">
        <label class="form-label fw-semibold">Alamat</label>
        <textarea name="alamat"
                  rows="3"
                  class="form-control @error('alamat') is-invalid @enderror"
                  placeholder="Nama jalan, dusun/kelurahan, kecamatan, kabupaten">{{ old('alamat', $warga->alamat ?? '') }}</textarea>
        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-2">
        <label class="form-label fw-semibold">RT</label>
        <input type="text"
               name="rt"
               class="form-control @error('rt') is-invalid @enderror"
               value="{{ old('rt', $warga->rt ?? '') }}"
               placeholder="001">
        @error('rt') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-2">
        <label class="form-label fw-semibold">RW</label>
        <input type="text"
               name="rw"
               class="form-control @error('rw') is-invalid @enderror"
               value="{{ old('rw', $warga->rw ?? '') }}"
               placeholder="002">
        @error('rw') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Kode Pos</label>
        <input type="text"
               name="kode_pos"
               class="form-control @error('kode_pos') is-invalid @enderror"
               value="{{ old('kode_pos', $warga->kode_pos ?? '') }}"
               placeholder="Contoh: 28282">
        @error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<hr class="my-4">

{{-- ===================== SOSIAL/LAINNYA ===================== --}}
<div class="mb-3">
    <div class="fw-bold">Data Sosial</div>
    <div class="text-muted small">Informasi pendidikan, pekerjaan, dan status keluarga.</div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Pendidikan</label>
        <input type="text"
               name="pendidikan"
               class="form-control @error('pendidikan') is-invalid @enderror"
               value="{{ old('pendidikan', $warga->pendidikan ?? '') }}"
               placeholder="Contoh: SMA / S1">
        @error('pendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Pekerjaan</label>
        <input type="text"
               name="pekerjaan"
               class="form-control @error('pekerjaan') is-invalid @enderror"
               value="{{ old('pekerjaan', $warga->pekerjaan ?? '') }}"
               placeholder="Contoh: Wiraswasta">
        @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Status Keluarga</label>
        <input type="text"
               name="status_keluarga"
               class="form-control @error('status_keluarga') is-invalid @enderror"
               value="{{ old('status_keluarga', $warga->status_keluarga ?? '') }}"
               placeholder="Contoh: Kepala Keluarga / Anak">
        @error('status_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- NOTE:
    Upload foto jangan ditaruh di partial ini biar tidak dobel.
    Upload foto cukup di halaman create/edit (yang kanan "Foto").
--}}
