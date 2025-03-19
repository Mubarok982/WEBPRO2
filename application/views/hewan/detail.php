<!DOCTYPE html>
<html>
<head>
    <title>Detail Hewan</title>
</head>
<body>
    <h2>Detail Hewan</h2>
    <img src="<?= base_url('uploads/' . $hewan['gambar']); ?>" width="300" alt="<?= $hewan['nama']; ?>">
    <p><strong>Nama:</strong> <?= $hewan['nama']; ?></p>
    <p><strong>Jenis:</strong> <?= $hewan['jenis']; ?></p>
    <p><strong>Usia:</strong> <?= $hewan['usia']; ?> tahun</p>
    <p><strong>Deskripsi:</strong> <?= $hewan['deskripsi']; ?></p>

    <a href="<?= site_url('adopsi/form/' . $hewan['id']); ?>">Ajukan Adopsi</a>
    <br>
    <a href="<?= site_url('hewan'); ?>">Kembali</a>
</body>
</html>
