<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Varian - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Varian NUSACART</h2>
        <hr>
        
        <a href="{{ route('merek.index') }}" class="btn btn-secondary mb-3">Kelola Merek</a>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary mb-3">Kelola Produk</a>
        <a href="{{ route('varian.create') }}" class="btn btn-primary mb-3">Tambah Varian</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Produk</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($varian as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->produk_id }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->ukuran }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <form action="{{ route('varian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus varian ini?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data varian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>