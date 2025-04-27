<!-- application/views/edit_mahasiswa.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Matkul</title>
</head>
<body>
    <div class="container">
        <h2>Edit Matkul</h2>
        <form action="<?= site_url('matkul/edit_aksi') ?>" method="POST">
            <input type="hidden" name="id" value="<?= $matkul->id_matkul ?>">
            <div class="mb-3">
                <label for="kode_matkul" class="form-label">Kode Matkul</label>
                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="<?= $matkul->kode_matkul ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama Matkul</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $matkul->nama_matkul ?>" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="sks" class="form-control" id="sks" name="sks" value="<?= $matkul->sks ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
