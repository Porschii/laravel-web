<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Space | Manajemen CV</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/cv.css') }}">
</head>
<body>
    <main class="cv-shell">
        <header class="cv-topbar">
            <a class="cv-brand" href="{{ route('cv.index') }}">
                <span class="cv-brand-mark">CV</span>
                <span>CV<span class="cv-brand-light">SPACE</span></span>
            </a>
            <span class="cv-topbar-note">Curriculum Vitae Management</span>
        </header>

        <section class="cv-hero">
            <div>
                <span class="cv-eyebrow">WORKSPACE</span>
                <h1>Kelola Data CV</h1>
                <p>Simpan, lihat, perbarui, dan kelola informasi curriculum vitae dalam satu tempat.</p>
            </div>
            <a href="{{ route('cv.create') }}" class="cv-btn cv-btn-primary">＋ Tambah CV</a>
        </section>

        <section class="cv-stats">
            <div class="cv-stat-card">
                <span class="cv-stat-icon">▤</span>
                <div><span class="cv-stat-label">Total CV tersimpan</span><strong>{{ $totalCv }}</strong></div>
            </div>
            <div class="cv-stat-card">
                <span class="cv-stat-icon cv-stat-icon-soft">✓</span>
                <div><span class="cv-stat-label">Status sistem</span><strong class="cv-stat-status">Aktif</strong></div>
            </div>
        </section>

        @if (session('success'))
            <div class="cv-alert cv-alert-success">{{ session('success') }}</div>
        @endif

        <section class="cv-panel">
            <div class="cv-list-heading">
                <div>
                    <h2>Daftar Curriculum Vitae</h2>
                    <p>Data CV yang sudah dimasukkan ke dalam sistem.</p>
                </div>
                <form action="{{ route('cv.index') }}" method="GET" class="cv-search">
                    <input type="search" name="q" value="{{ $keyword }}" placeholder="Cari nama, profesi, email...">
                    <button type="submit" aria-label="Cari">Cari</button>
                    @if ($keyword)
                        <a href="{{ route('cv.index') }}" class="cv-clear">Reset</a>
                    @endif
                </form>
            </div>

            @if ($cvs->count())
                <div class="cv-table-wrap">
                    <table class="cv-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Profesi</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th class="cv-action-heading">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cvs as $item)
                                <tr>
                                    <td>
                                        <div class="cv-person">
                                            @if($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}" class="cv-avatar" alt="Foto {{ $item->nama }}">
                                            @else
                                                <span class="cv-avatar">{{ mb_strtoupper(mb_substr($item->nama, 0, 1)) }}</span>
                                            @endif
                                            <span class="cv-person-name">{{ $item->nama }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $item->profesi }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telepon ?: '—' }}</td>
                                    <td>
                                        <div class="cv-row-actions">
                                            <a href="{{ route('cv.show', $item) }}" class="cv-action cv-action-view">Lihat</a>
                                            <a href="{{ route('cv.edit', $item) }}" class="cv-action cv-action-edit">Edit</a>
                                            <form action="{{ route('cv.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus CV milik {{ addslashes($item->nama) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="cv-action cv-action-delete">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cv-pagination">{{ $cvs->links() }}</div>
            @else
                <div class="cv-empty">
                    <div class="cv-empty-icon">▤</div>
                    <h3>{{ $keyword ? 'Data tidak ditemukan' : 'Belum ada data CV' }}</h3>
                    <p>{{ $keyword ? 'Coba gunakan kata kunci pencarian lain.' : 'Mulai dengan menambahkan data CV pertama.' }}</p>
                    @if (!$keyword)
                        <a href="{{ route('cv.create') }}" class="cv-btn cv-btn-primary">＋ Tambah CV Pertama</a>
                    @endif
                </div>
            @endif
        </section>

        <footer class="cv-footer">CV SPACE <span>•</span> Dibangun dengan Laravel</footer>
    </main>
</body>
</html>
