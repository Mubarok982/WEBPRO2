<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
</head>
<body>
    <div class="container">
        <h2>Edit Kelas</h2>
        <form action="<?= site_url('kelas/edit_aksi') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $kelas->id_kelas ?>">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $kelas->nama_kelas ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="id_dosen" name="nama_ruangan" value="<?= $kelas->nama_ruangan ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
