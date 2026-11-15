<div class="cv-form-grid">
    <div class="cv-field">
        <label for="nama">Nama lengkap <span>*</span></label>
        <input id="nama" name="nama" type="text" value="{{ old('nama', $cv->nama ?? '') }}" required maxlength="150" placeholder="Contoh: Ikhwa Rahmatullah">
        @error('nama') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="foto">Foto Profil Portofolio</label>

        <div class="cv-photo-upload">
            @if(isset($cv) && $cv->foto)
                <img
                    src="{{ asset('storage/' . $cv->foto) }}"
                    id="preview-foto"
                    class="cv-photo-preview"
                    alt="Foto profil saat ini"
                >
            @else
                <img
                    src=""
                    id="preview-foto"
                    class="cv-photo-preview"
                    alt="Preview foto"
                    style="display: none;"
                >
            @endif

            <input
                id="foto"
                name="foto"
                type="file"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            >
            <small>Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB. Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        @error('foto')
            <small class="cv-error">{{ $message }}</small>
        @enderror
    </div>

    <div class="cv-field">
        <label for="profesi">Profesi / Jabatan <span>*</span></label>
        <input id="profesi" name="profesi" type="text" value="{{ old('profesi', $cv->profesi ?? '') }}" required maxlength="150" placeholder="Contoh: Web Developer">
        @error('profesi') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field">
        <label for="email">Email <span>*</span></label>
        <input id="email" name="email" type="email" value="{{ old('email', $cv->email ?? '') }}" required placeholder="nama@email.com">
        @error('email') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field">
        <label for="telepon">Nomor telepon</label>
        <input id="telepon" name="telepon" type="text" value="{{ old('telepon', $cv->telepon ?? '') }}" placeholder="08xxxxxxxxxx">
        @error('telepon') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="alamat">Alamat</label>
        <input id="alamat" name="alamat" type="text" value="{{ old('alamat', $cv->alamat ?? '') }}" placeholder="Kota, Provinsi">
        @error('alamat') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="deskripsi">Tentang diri <span>*</span></label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required placeholder="Tuliskan ringkasan singkat tentang diri dan tujuan profesional...">{{ old('deskripsi', $cv->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="pendidikan">Pendidikan</label>
        <textarea id="pendidikan" name="pendidikan" rows="3" placeholder="Contoh: S1 Sistem Informasi — Universitas ... (2024–sekarang)">{{ old('pendidikan', $cv->pendidikan ?? '') }}</textarea>
        @error('pendidikan') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="pengalaman">Pengalaman kerja / organisasi</label>
        <textarea id="pengalaman" name="pengalaman" rows="4" placeholder="Tuliskan pengalaman kerja, magang, kepanitiaan, atau organisasi...">{{ old('pengalaman', $cv->pengalaman ?? '') }}</textarea>
        @error('pengalaman') <small class="cv-error">{{ $message }}</small> @enderror
    </div>

    <div class="cv-field cv-full">
        <label for="keahlian">Keahlian</label>
        <textarea id="keahlian" name="keahlian" rows="3" placeholder="Contoh: HTML, CSS, JavaScript, Laravel, komunikasi...">{{ old('keahlian', $cv->keahlian ?? '') }}</textarea>
        @error('keahlian') <small class="cv-error">{{ $message }}</small> @enderror
    </div>
</div>

<div class="cv-form-actions">
    <a href="{{ route('cv.index') }}" class="cv-btn cv-btn-light">Batal</a>
    <button type="submit" class="cv-btn cv-btn-primary">{{ $submitLabel ?? 'Simpan CV' }}</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputFoto = document.getElementById('foto');
    const previewFoto = document.getElementById('preview-foto');

    if (!inputFoto || !previewFoto) return;

    inputFoto.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (!file) return;

        if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
            alert('Pilih gambar JPG, PNG, atau WEBP.');
            inputFoto.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran foto maksimal 2 MB.');
            inputFoto.value = '';
            return;
        }

        previewFoto.src = URL.createObjectURL(file);
        previewFoto.style.display = 'block';
    });
});
</script>
