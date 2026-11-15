<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cv->nama }} | Detail CV</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/cv.css') }}">
</head>
<body>
    <main class="cv-shell cv-narrow">
        <a href="{{ route('cv.index') }}" class="cv-back">← Kembali ke daftar CV</a>
        <article class="cv-panel cv-resume">
            <div class="cv-resume-header">
                @if($cv->foto)
                    <img src="{{ asset('storage/' . $cv->foto) }}" class="cv-resume-avatar" alt="Foto {{ $cv->nama }}">
                @else
                    <span class="cv-resume-avatar">{{ mb_strtoupper(mb_substr($cv->nama, 0, 1)) }}</span>
                @endif
                <div>
                    <span class="cv-eyebrow">CURRICULUM VITAE</span>
                    <h1>{{ $cv->nama }}</h1>
                    <p>{{ $cv->profesi }}</p>
                </div>
            </div>

            <section class="cv-resume-section">
                <h2>Informasi Kontak</h2>
                <p><strong>Email:</strong> {{ $cv->email }}</p>
                <p><strong>Telepon:</strong> {{ $cv->telepon ?: 'Belum diisi' }}</p>
                <p><strong>Alamat:</strong> {{ $cv->alamat ?: 'Belum diisi' }}</p>
            </section>
            <section class="cv-resume-section">
                <h2>Tentang Saya</h2>
                <p class="cv-preserve">{{ $cv->deskripsi }}</p>
            </section>
            <section class="cv-resume-section">
                <h2>Pendidikan</h2>
                <p class="cv-preserve">{{ $cv->pendidikan ?: 'Belum diisi' }}</p>
            </section>
            <section class="cv-resume-section">
                <h2>Pengalaman</h2>
                <p class="cv-preserve">{{ $cv->pengalaman ?: 'Belum diisi' }}</p>
            </section>
            <section class="cv-resume-section">
                <h2>Keahlian</h2>
                <p class="cv-preserve">{{ $cv->keahlian ?: 'Belum diisi' }}</p>
            </section>

            <div class="cv-form-actions cv-detail-actions">
                <a href="{{ route('cv.index') }}" class="cv-btn cv-btn-light">Kembali</a>
                <a href="{{ route('cv.edit', $cv) }}" class="cv-btn cv-btn-primary">Edit CV</a>
                <button onclick="window.print()" class="cv-btn cv-btn-outline">Cetak</button>
            </div>
        </article>
    </main>
</body>
</html>
