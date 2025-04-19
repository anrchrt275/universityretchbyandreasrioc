<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Nilai | Portal Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .page-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .grade-calculator {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .grade-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
        }
        .grade-badge {
            font-size: 1.5rem;
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            margin-top: 1rem;
        }
        .grade-scale {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .scale-item {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: transform 0.3s ease;
        }
        .scale-item:hover {
            transform: translateX(10px);
        }
        .btn-calculate {
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-calculate:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Header Halaman -->
    <div class="page-header">
        <div class="container">
            <h1 class="display-4">Kalkulator Nilai</h1>
            <p class="lead">Hitung performa akademik Anda dan pahami sistem penilaian kami</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="grade-calculator">
                    <h3 class="mb-4"><i class='bx bxs-calculator me-2'></i>Hitung Nilai Anda</h3>
                    
                    <?php
                    $hasil = "";
                    $nilaiHuruf = "";
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tugas = $_POST['tugas'] ?? 0;
                        $uts = $_POST['uts'] ?? 0;
                        $uas = $_POST['uas'] ?? 0;
                        
                        // Hitung rata-rata berbobot
                        $nilaiAkhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
                        
                        // Tentukan nilai huruf
                        if ($nilaiAkhir >= 90) {
                            $nilaiHuruf = "A";
                        } elseif ($nilaiAkhir >= 80) {
                            $nilaiHuruf = "B";
                        } elseif ($nilaiAkhir >= 70) {
                            $nilaiHuruf = "C";
                        } elseif ($nilaiAkhir >= 60) {
                            $nilaiHuruf = "D";
                        } else {
                            $nilaiHuruf = "E";
                        }
                        
                        $hasil = "Nilai Akhir: " . number_format($nilaiAkhir, 2) . " ($nilaiHuruf)";
                    }
                    ?>

                    <?php if($hasil): ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class='bx bxs-check-circle me-2 fs-4'></i>
                            <div>
                                <strong>Nilai Akhir Anda:</strong><br>
                                <span class="badge bg-primary grade-badge"><?php echo number_format($nilaiAkhir, 2); ?> (<?php echo $nilaiHuruf; ?>)</span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form method="post" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class='bx bxs-book-content me-2'></i>Tugas (30%)
                                </label>
                                <input type="number" class="form-control" name="tugas" required min="0" max="100">
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class='bx bxs-edit me-2'></i>UTS (30%)
                                </label>
                                <input type="number" class="form-control" name="uts" required min="0" max="100">
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class='bx bxs-trophy me-2'></i>UAS (40%)
                                </label>
                                <input type="number" class="form-control" name="uas" required min="0" max="100">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-calculate">
                            <i class='bx bxs-calculator me-2'></i>Hitung Nilai
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="grade-scale">
                    <h4 class="mb-4"><i class='bx bxs-medal me-2'></i>Skala Penilaian</h4>
                    <div class="scale-item bg-success bg-opacity-10 text-success">
                        <strong>A (90-100)</strong><br>
                        <small>Performa Sangat Baik</small>
                    </div>
                    <div class="scale-item bg-primary bg-opacity-10 text-primary">
                        <strong>B (80-89)</strong><br>
                        <small>Performa Baik</small>
                    </div>
                    <div class="scale-item bg-info bg-opacity-10 text-info">
                        <strong>C (70-79)</strong><br>
                        <small>Cukup Memuaskan</small>
                    </div>
                    <div class="scale-item bg-warning bg-opacity-10 text-warning">
                        <strong>D (60-69)</strong><br>
                        <small>Perlu Peningkatan</small>
                    </div>
                    <div class="scale-item bg-danger bg-opacity-10 text-danger">
                        <strong>E (Di Bawah 60)</strong><br>
                        <small>Tidak Memuaskan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2025 Universitas Retch by Andreas Rio C. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi Form
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>