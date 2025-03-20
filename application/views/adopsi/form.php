<h2>Formulir Adopsi</h2>
<form action="<?= base_url('adopsi/simpan'); ?>" method="POST">
    <input type="hidden" name="hewan_id" value="<?= $hewan['id']; ?>">

    <label>Nama Anda:</label>
    <input type="text" name="nama_pemohon" required>
    <br><br>

    <label>Kontak:</label>
    <input type="text" name="kontak" required pattern="[0-9]+" title="Hanya angka diperbolehkan">
    <br><br>

    <label>Alasan Mengadopsi:</label>
    <textarea name="alasan" required></textarea>
    <br><br>

    <button type="submit">Kirim Permohonan</button>
    <li>
    <a href="<?= base_url('chat'); ?>" class="btn btn-primary">
        💬 Chat
    </a>
</li>

</form>
