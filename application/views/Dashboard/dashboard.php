<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Sistem Akademik Utama</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body,
        html {
            height: 100%;
            transition: background-color 0.3s, color 0.3s;
        }

        .content-wrapper {
            min-height: calc(100vh - 56px - 70px);
            /* Navbar + Footer */
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .dark-mode {
            background-color: #121212;
            color: #f5f5f5;
        }

        .dark-mode .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            color: #f5f5f5;
            /* Tambahin ini biar tulisan card jadi putih */
        }

        .dark-mode .navbar,
        .dark-mode footer {
            background-color: #222;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
        }

        .btn-logout:hover {
            background-color: #c82333;
            color: white;
        }
    </style>

</head>

<body class="d-flex flex-column" id="body">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url('dashboard') ?>">Dashboard Utama </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('dosen') ?>"><i class="bi bi-person-badge"></i> Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('matkul') ?>"><i class="bi bi-book"></i> Matkul</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('mahasiswa') ?>"><i class="bi bi-mortarboard"></i> Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('kelas') ?>"><i class="bi bi-people"></i> Kelas</a>
        </li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <a class="btn btn-danger btn-sm" href="<?= site_url('auth/logout') ?>">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        </li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <button class="btn btn-light btn-sm" id="toggleDark">
            <i class="bi bi-moon-fill"></i> Dark Mode
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- Content -->
    <div class="content-wrapper container flex-grow-1 d-flex flex-column">
        <main class="my-5 flex-grow-1">
            <div class="text-center">
                <h1 class="mb-4">Selamat Datang di Sistem Akademik</h1>
                <p class="lead">Kelola data dosen, mahasiswa, mata kuliah, dan kelas dengan mudah melalui dashboard ini.
                </p>
            </div>

            <div class="row mt-5 g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card text-center shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-person-badge fs-1 text-primary mb-3"></i>
                            <h5 class="card-title">Dosen</h5>
                            <p class="card-text flex-grow-1">Manajemen data dosen.</p>
                            <a href="<?= site_url('dosen') ?>" class="btn btn-primary btn-sm mt-auto">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card text-center shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-book fs-1 text-success mb-3"></i>
                            <h5 class="card-title">Mata Kuliah</h5>
                            <p class="card-text flex-grow-1">Manajemen mata kuliah.</p>
                            <a href="<?= site_url('matkul') ?>" class="btn btn-success btn-sm mt-auto">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card text-center shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-mortarboard fs-1 text-warning mb-3"></i>
                            <h5 class="card-title">Mahasiswa</h5>
                            <p class="card-text flex-grow-1">Manajemen data mahasiswa.</p>
                            <a href="<?= site_url('mahasiswa') ?>"
                                class="btn btn-warning btn-sm mt-auto text-white">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card text-center shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-people fs-1 text-danger mb-3"></i>
                            <h5 class="card-title">Kelas</h5>
                            <p class="card-text flex-grow-1">Manajemen data kelas.</p>
                            <a href="<?= site_url('kelas') ?>" class="btn btn-danger btn-sm mt-auto">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            <small>&copy; <?= date('Y') ?> Sistem Akademik. Di buat Oleh Rizqy Mubarok.</small>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Dark Mode Toggle -->
    <script>
        const toggle = document.getElementById('toggleDark');
        const body = document.getElementById('body');

        toggle.addEventListener('click', function () {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                toggle.innerHTML = '<i class="bi bi-sun-fill"></i> Light Mode';
            } else {
                toggle.innerHTML = '<i class="bi bi-moon-fill"></i> Dark Mode';
            }
        });
    </script>

</body>

</html>