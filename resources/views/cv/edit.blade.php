<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV | CV Space</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/cv.css') }}">
</head>
<body>
    <main class="cv-shell cv-narrow">
        <a href="{{ route('cv.index') }}" class="cv-back">← Kembali ke daftar CV</a>
        <section class="cv-panel">
            <div class="cv-page-heading">
                <span class="cv-eyebrow">PERBARUI DATA</span>
                <h1>Edit Curriculum Vitae</h1>
                <p>Perbarui informasi untuk {{ $cv->nama }}.</p>
            </div>

            @if ($errors->any())
                <div class="cv-alert cv-alert-danger">Masih ada data yang perlu diperiksa. Lihat pesan di bawah setiap kolom.</div>
            @endif

            <form action="{{ route('cv.update', $cv) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('cv.partials.form', ['submitLabel' => 'Simpan Perubahan'])
            </form>
        </section>
    </main>
</body>
</html>
