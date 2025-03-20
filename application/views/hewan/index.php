<!DOCTYPE html>
<html>

<head>
    <title>Daftar Hewan</title>
</head>
<a href="<?php echo base_url('auth/logout'); ?>" style="float: right; margin-right: 20px; color: red;">
    Logout
</a>

<body>
    <h2>Daftar Hewan untuk Adopsi</h2>
    <a href="<?= site_url('hewan/tambah') ?>">Tambah Hewan</a>
    <table border="1">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Usia</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($hewan)): ?>
            <?php foreach ($hewan as $h): ?>
                <tr>
                    <td>
                        <?php if (!empty($h['gambar'])): ?>
                            <img src="<?= base_url('uploads/' . $h['gambar']) ?>" width="100">
                        <?php else: ?>
                            Tidak ada gambar
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($h['nama']); ?></td>
                    <td><?= htmlspecialchars($h['jenis']); ?></td>
                    <td><?= htmlspecialchars($h['usia']); ?> tahun</td>
                    <td><?= htmlspecialchars($h['status']); ?></td>
                    <td>
                        <a href="<?= site_url('hewan/edit/' . $h['id']); ?>">Edit</a> |
                        <a href="<?= site_url('hewan/hapus/' . $h['id']); ?>"
                            onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        <br>
                        <a href="<?= site_url('hewan/detail/' . $h['id']); ?>" style="font-weight: bold;">Lihat Detail</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" align="center">Belum ada data hewan</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>