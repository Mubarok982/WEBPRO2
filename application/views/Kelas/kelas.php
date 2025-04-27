<?php $this->load->view('Navbar/navbar'); ?>

<div class="container mt-5">
    <h2>Data Kelas</h2>
    <a href="<?= site_url('kelas/tambah') ?>" class="btn btn-primary">Tambah Kelas</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kelas as $k): ?>
                <tr>
                    <td><?= $k->nama_kelas ?></td>
                    <td><?= $k->nama_ruangan ?></td>
                    <td>
                        <a href="<?= site_url('kelas/edit/'.$k->id_kelas) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('kelas/hapus/'.$k->id_kelas) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
