<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
</head>
<body>
    <div class="container">
        <h2>Edit Dosen</h2>
        <form action="<?= site_url('dosen/edit_aksi') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $dosen->id_dosen ?>">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= $dosen->nama_dosen ?>" required>
            </div>
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $dosen->nidn ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $dosen->email ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $dosen->no_telp ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
