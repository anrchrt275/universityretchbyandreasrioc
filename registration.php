<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .registration-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e9ecef;
        }
        .form-icon {
            font-size: 3rem;
            color: #4e73df;
            margin-bottom: 1rem;
        }
        .form-control, .form-select {
            border-radius: 10px;
            padding: 0.7rem 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.25);
            border-color: #4e73df;
        }
        .btn-register {
            background: #4e73df;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-register:hover {
            background: #2e59d9;
            transform: translateY(-2px);
        }
        .input-group-text {
            background: #f8f9fc;
            border-radius: 10px 0 0 10px;
            border: 1px solid #e0e0e0;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        @media print {
            .btn-register, footer {
                display: none;
            }
            body {
                background: white !important;
            }
            .registration-container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-container">
            <div class="form-header">
                <i class='bx bxs-user-plus form-icon'></i>
                <h2 class="mb-0">Pendaftaran Mahasiswa</h2>
                <p class="text-muted">Isi formulir di bawah ini untuk mendaftar sebagai mahasiswa baru</p>
            </div>

            <?php if (isset($_GET['success']) && isset($_SESSION['registration_data'])): ?>
                <div class="alert alert-success">Pendaftaran berhasil!</div>
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <h5>Detail Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> <?php echo $_SESSION['registration_data']['name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $_SESSION['registration_data']['email']; ?></p>
                        <p><strong>Telepon:</strong> <?php echo $_SESSION['registration_data']['phone']; ?></p>
                        <p><strong>Program:</strong> <?php echo $_SESSION['registration_data']['program']; ?></p>
                    </div>
                </div>
                <?php unset($_SESSION['registration_data']); ?>
            <?php else: ?>
                <form method="post" action="save_registration.php" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-envelope'></i></span>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-phone'></i></span>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="program" class="form-label">Program</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-graduation'></i></span>
                                <select class="form-select" name="program" required>
                                    <option value="">Pilih program</option>
                                    <option value="CS">Ilmu Komputer</option>
                                    <option value="IT">Teknologi Informasi</option>
                                    <option value="SE">Rekayasa Perangkat Lunak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-register btn-primary">
                            <i class='bx bxs-save me-2'></i>Daftar Sekarang
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2025 Universitas Retch by Andreas Rio C. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>