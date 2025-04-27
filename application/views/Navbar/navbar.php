<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar - Sistem Akademik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url('dashboard') ?>">
            <i class="bi bi-mortarboard"></i> Dashboard Utama
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('dosen') ?>">
                        <i class="bi bi-person-badge"></i> Dosen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('matkul') ?>">
                        <i class="bi bi-journal-bookmark"></i> Matkul
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('mahasiswa') ?>">
                        <i class="bi bi-people"></i> Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('kelas') ?>">
                        <i class="bi bi-house-door"></i> Kelas
                    </a>
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
