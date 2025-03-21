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

    <?php if (isset($hewan['email_pemilik']) && !empty($hewan['email_pemilik'])): ?>
        <?php $encoded_email = base64_encode($hewan['email_pemilik']); ?>
        <a href="<?= site_url('chat/start/' . $encoded_email); ?>" class="btn btn-primary">Hubungi Adopter</a>
    <?php else: ?>
        <p class="text-danger">Adopter tidak ditemukan.</p>
    <?php endif; ?>

    <a href="<?= site_url('hewan'); ?>">Kembali</a>
</body>
</html>
