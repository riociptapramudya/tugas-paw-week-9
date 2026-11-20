<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Produk NUSACART</h2>
        <hr>

 <div class="mb-3">
    <a href="{{ route('produk.create') }}" class="btn btn-success">+ Tambah Produk Baru</a>
    <a href="{{ route('merek.index') }}" class="btn btn-secondary">Kelola Merek</a>
    <a href="{{ route('varian.index') }}" class="btn btn-secondary">Kelola Varian</a>
</div>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Dimensi (P x L x T)</th>
                    <th>Berat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->panjang_cm }} x {{ $item->lebar_cm }} x {{ $item->tinggi_cm }} cm</td>
                    <td>{{ $item->berat_gram }} gram</td>
                    <td>
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Belum ada data produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>