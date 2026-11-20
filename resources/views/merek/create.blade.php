<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Produk Baru</h2>
        <hr>
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Merek</label>
                <select name="merek_id" class="form-control" required>
                    <option value="">-- Pilih Merek --</option>
                    @foreach($merek as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_merek }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>