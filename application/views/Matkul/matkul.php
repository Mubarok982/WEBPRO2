<?php $this->load->view('Navbar/navbar'); ?>

<div class="container mt-5">
    <h2>Data Mata Kuliah</h2>
    <a href="<?= site_url('matkul/tambah') ?>" class="btn btn-primary">Tambah Matkul</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Kode</th>
                <th>SKS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matkul as $m): ?>
                <tr>
                    <td><?= $m->nama_matkul ?></td>
                    <td><?= $m->kode_matkul ?></td>
                    <td><?= $m->sks ?></td>
                    <td>
                        <a href="<?= site_url('matkul/edit/'.$m->id_matkul) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('matkul/hapus/'.$m->id_matkul) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
