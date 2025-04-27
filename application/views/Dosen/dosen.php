<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
</head>
<body>
    <?php $this->load->view('Navbar/navbar'); ?>
    <div class="container">
        <h2>Data Dosen</h2>
        <a href="<?= site_url('dosen/tambah') ?>" class="btn btn-primary">Tambah Dosen</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen as $d): ?>
                <tr>
                    <td><?= $d->id_dosen ?></td>
                    <td><?= $d->nama_dosen ?></td>
                    <td><?= $d->nidn ?></td>
                    <td><?= $d->email ?></td>
                    <td><?= $d->no_telp ?></td>
                    <td>
                        <a href="<?= site_url('dosen/edit/'.$d->id_dosen) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('dosen/hapus/'.$d->id_dosen) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
