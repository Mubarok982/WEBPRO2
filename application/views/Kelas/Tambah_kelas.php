<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Kelas</h2>
        <form action="<?= site_url('kelas/tambah_aksi') ?>" method="POST">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">nama_ruangan</label>
                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

