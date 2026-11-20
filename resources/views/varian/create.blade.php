<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Varian - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h2>Tambah Varian Baru</h2>
        <hr>
        <form action="{{ route('varian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pilih Produk</label>
                <select name="produk_id" class="form-control" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Warna</label>
                <input type="text" class="form-control" name="warna" placeholder="Contoh: Merah, Hitam" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ukuran</label>
                <input type="text" class="form-control" name="ukuran" placeholder="Contoh: S, M, L, XL" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Contoh: 10" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('varian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>