<?php $this->load->view('Navbar/navbar'); ?>

<div class="container mt-5">
    <h2>Data Mahasiswa</h2>
    <a href="<?= site_url('mahasiswa/tambah') ?>" class="btn btn-primary">Tambah Mahasiswa</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA Mahasiswa</th>
                <th>Email</th>
                <th>NO Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
                <tr>
                    <td><?= $m->nim ?></td>
                    <td><?= $m->nama_mahasiswa ?></td>
                    <td><?= $m->email ?></td>
                    <td><?= $m->no_telp ?></td>
                    <td>
                        <a href="<?= site_url('mahasiswa/edit/'.$m->id_mahasiswa) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('mahasiswa/hapus/'.$m->id_mahasiswa) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
