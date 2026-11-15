<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah CV | CV Space</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/cv.css') }}">   
</head>
<body>
    <main class="cv-shell cv-narrow">
        <a href="{{ route('cv.index') }}" class="cv-back">← Kembali ke daftar CV</a>
        <section class="cv-panel">
            <div class="cv-page-heading">
                <span class="cv-eyebrow">DATA BARU</span>
                <h1>Tambah Curriculum Vitae</h1>
                <p>Lengkapi informasi di bawah ini untuk membuat data CV baru.</p>
            </div>

            @if ($errors->any())
                <div class="cv-alert cv-alert-danger">Masih ada data yang perlu diperiksa. Lihat pesan di bawah setiap kolom.</div>
            @endif

            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('cv.partials.form', ['submitLabel' => 'Simpan CV'])
            </form>
        </section>
    </main>
</body>
</html>
