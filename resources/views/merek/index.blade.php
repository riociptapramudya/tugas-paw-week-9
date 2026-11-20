<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Merek - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Merek NUSACART</h2>
        <hr>
        
        <a href="{{ route('merek.create') }}" class="btn btn-primary mb-3">Tambah Merek</a>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary mb-3">Kelola Produk</a>
        <a href="{{ route('varian.index') }}" class="btn btn-secondary mb-3">Kelola Varian</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Merek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($merek as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_merek }}</td>
                    <td>
                        <a href="{{ route('merek.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                       @if(auth()->user()->role === 'admin')
                        <form action="{{ route('merek.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?')">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data merek.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-secondary">Logout</button>
    </form>
</div>
</body>
</html>