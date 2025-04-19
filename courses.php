<?php
// Data kursus (contoh)
$kursus = [
    'Ilmu Komputer' => [
        [
            'kode' => 'CS101',
            'nama' => 'Pengantar Pemrograman',
            'sks' => 3
        ],
        [
            'kode' => 'CS102',
            'nama' => 'Struktur Data dan Algoritma',
            'sks' => 4
        ]
    ],
    'Teknologi Informasi' => [
        [
            'kode' => 'IT201',
            'nama' => 'Dasar-Dasar Jaringan',
            'sks' => 3
        ],
        [
            'kode' => 'IT202',
            'nama' => 'Sistem Manajemen Basis Data',
            'sks' => 4
        ]
    ],
    'Rekayasa Perangkat Lunak' => [
        [
            'kode' => 'SE301',
            'nama' => 'Siklus Hidup Pengembangan Perangkat Lunak',
            'sks' => 3
        ],
        [
            'kode' => 'SE302',
            'nama' => 'Metodologi Agile',
            'sks' => 3
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Akademik & Kursus | Universitas ABC</title>
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
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .department-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }
        .department-card:hover {
            transform: translateY(-5px);
        }
        .department-header {
            background: #4b6cb7;
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }
        .course-item {
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            padding: 1rem;
        }
        .course-item:hover {
            background: #f8f9fa;
            border-left-color: #4b6cb7;
        }
        .course-code {
            font-weight: 600;
            color: #4b6cb7;
        }
        .credits-badge {
            background: #e3f2fd;
            color: #1565c0;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
        }
        .btn-details {
            background: #4b6cb7;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-details:hover {
            background: #182848;
        }

        /* Media Query untuk Mobile */
        @media (max-width: 576px) {
            .course-item {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }

            .course-item .row {
                flex-direction: column;
            }

            .course-item .col-md-6,
            .course-item .col-md-4,
            .course-item .col-md-2 {
                width: 100%;
                text-align: left;
                margin-bottom: 0.5rem;
            }

            .credits-badge {
                display: inline-block;
                margin-top: 0.5rem;
            }

            .btn-details {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header Halaman -->
    <div class="page-header">
        <div class="container">
            <h1 class="display-4">Program Akademik & Kursus</h1>
            <p class="lead">Jelajahi berbagai kursus yang dirancang untuk kesuksesan Anda</p>
        </div>
    </div>

    <div class="container">
        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Program</h6>
                            <h3 class="mb-0"><?php echo count($kursus); ?></h3>
                        </div>
                        <i class='bx bxs-graduation stats-icon'></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Kursus</h6>
                            <h3 class="mb-0"><?php echo array_sum(array_map('count', $kursus)); ?></h3>
                        </div>
                        <i class='bx bxs-book-alt stats-icon'></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Kursi Tersedia</h6>
                            <h3 class="mb-0">120</h3>
                        </div>
                        <i class='bx bxs-chair stats-icon'></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Tanggal Mulai</h6>
                            <h3 class="mb-0">Sept 2030</h3>
                        </div>
                        <i class='bx bxs-calendar stats-icon'></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kursus -->
        <?php foreach ($kursus as $jurusan => $kursusJurusan): ?>
            <div class="department-card">
                <div class="department-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"><?php echo $jurusan; ?></h3>
                        <span class="badge bg-light text-dark"><?php echo count($kursusJurusan); ?> Kursus</span>
                    </div>
                </div>
                <div class="card-body">
                    <?php foreach ($kursusJurusan as $kursus): ?>
                        <div class="course-item">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <span class="course-code"><?php echo $kursus['kode']; ?></span>
                                    <h5 class="mb-0 mt-1"><?php echo $kursus['nama']; ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="credits-badge">
                                        <i class='bx bxs-time-five'></i> <?php echo $kursus['sks']; ?> SKS
                                    </span>
                                </div>
                                <div class="col-md-2 text-end">
                                    <a href="course-details.php?kode=<?php echo $kursus['kode']; ?>" class="btn btn-details btn-sm">
                                        <i class='bx bxs-info-circle'></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Ajakan -->
        <div class="text-center p-5 bg-white rounded-3 shadow-sm">
            <h2>Siap Memulai Perjalanan Akademik Anda?</h2>
            <p class="lead text-muted">Bergabunglah dengan komunitas pembelajar kami dan capai tujuan Anda</p>
            <a href="registration.php" class="btn btn-primary btn-lg">
                <i class='bx bxs-user-plus me-2'></i>Daftar Sekarang
            </a>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2025 Universitas Retch by Andreas Rio C. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>