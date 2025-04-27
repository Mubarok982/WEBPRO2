<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Matkul</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Matkul</h2>
        <form action="<?= site_url('matkul/tambah_aksi') ?>" method="POST">
            <div class="mb-3">
                <label for="kode_matkul" class="form-label">Kode Matkul</label>
                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
            </div>
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama Matkul</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="text" class="form-control" id="sks" name="sks" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
