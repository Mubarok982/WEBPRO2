
<!DOCTYPE html>
<html>
<head>
    <title>Edit Hewan</title>
</head>
<body>
    <h2>Edit Hewan</h2>
    <form action="<?= site_url('hewan/update/'.$hewan['id']); ?>" method=”post”>
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $hewan['nama']; ?>" required><br>

        <label>Jenis:</label>
        <select name="jenis">
            <option value="Kucing" <?= ($hewan['jenis'] == 'Kucing') ? 'selected' : ''; ?>>Kucing</option>
            <option value="Anjing" <?= ($hewan['jenis'] == 'Anjing') ? 'selected' : ''; ?>>Anjing</option>
        </select><br>

        <label>Usia (tahun):</label>
        <input type="number" name="usia" value="<?= $hewan['usia']; ?>" required><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required><?= $hewan['deskripsi']; ?></textarea><br>

        <label>URL Gambar:</label>
        <input type="text" name="gambar" value="<?= $hewan['gambar']; ?>" required><br>

        <label>Status:</label>
        <select name="status">
            <option value="Tersedia" <?= ($hewan['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
            <option value="Diadopsi" <?= ($hewan['status'] == 'Diadopsi') ? 'selected' : ''; ?>>Diadopsi</option>
        </select><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>


