<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form action="<?= site_url('mahasiswa/edit_aksi') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $mahasiswa->id_mahasiswa ?>">
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $mahasiswa->nama_mahasiswa ?>" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa->nim ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa->email ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $mahasiswa->no_telp ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
