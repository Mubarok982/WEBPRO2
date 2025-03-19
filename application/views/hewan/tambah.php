<!DOCTYPE html>
<html>
<head>
    <title>Tambah Hewan</title>
</head>
<body>
    <h2>Tambah Hewan Baru</h2>
    <form action="<?= site_url('hewan/simpan'); ?>" method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Jenis:</label>
        <select name="jenis">
            <option value="Kucing">Kucing</option>
            <option value="Anjing">Anjing</option>
        </select><br>

        <label>Usia (tahun):</label>
        <input type="number" name="usia" required><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea><br>

        <label>Gambar:</label>
        <input type="file" name="gambar" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
