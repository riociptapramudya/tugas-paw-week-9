<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Merek - NUSACART</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h2>Edit Merek</h2>
        <hr>
        <form action="{{ route('merek.update', $merek->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_merek" class="form-label">Nama Merek</label>
                <input type="text" class="form-control" id="nama_merek" name="nama_merek" value="{{ $merek->nama_merek }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('merek.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>