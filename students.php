<?php
// Fungsi untuk menghitung rata-rata nilai mahasiswa
function hitungRataRata($mahasiswa) {
    $totalNilai = 0;
    $totalMahasiswa = count($mahasiswa);

    if ($totalMahasiswa === 0) {
        return 0; // Jika tidak ada mahasiswa, rata-rata adalah 0
    }

    foreach ($mahasiswa as $mhs) {
        $totalNilai += $mhs['nilai'];
    }

    return $totalNilai / $totalMahasiswa;
}

// Fungsi untuk menentukan status nilai
function statusNilai($nilai) {
    if ($nilai >= 90) {
        return ['A', 'success'];
    } elseif ($nilai >= 80) {
        return ['B', 'info'];
    } elseif ($nilai >= 70) {
        return ['C', 'warning'];
    } else {
        return ['D', 'danger'];
    }
}

// Data mahasiswa (contoh)
$mahasiswa = [
    ['id' => 1, 'nama' => 'John Doe', 'nilai' => 85],
    ['id' => 2, 'nama' => 'Jane Smith', 'nilai' => 92],
    ['id' => 3, 'nama' => 'Alice Brown', 'nilai' => 87],
    ['id' => 4, 'nama' => 'Bob Wilson', 'nilai' => 95],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Kami | Universitas ABC</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .stats-icon {
            font-size: 2.5rem;
            color: #4e73df;
        }
        .student-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: #4e73df;
            color: white;
            border: none;
            padding: 1rem;
        }
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 500;
        }
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .cta-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Media Query untuk Mobile */
        @media (max-width: 576px) {
            .student-avatar {
                width: 30px;
                height: 30px;
                margin-right: 5px;
            }

            .table td, .table th {
                font-size: 0.9rem;
                padding: 0.5rem;
            }

            .btn-sm {
                font-size: 0.8rem;
                padding: 0.3rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Halaman -->
    <div class="page-header">
        <div class="container">
            <h1 class="display-4">Mahasiswa Berprestasi Kami</h1>
            <p class="lead">Kenali mahasiswa berbakat kami dan pencapaian mereka</p>
        </div>
    </div>

    <div class="container">
        <!-- Baris Statistik -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Mahasiswa</h6>
                            <h3 class="mb-0"><?php echo count($mahasiswa); ?></h3>
                        </div>
                        <i class='bx bxs-graduation stats-icon'></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Rata-Rata Nilai</h6>
                            <h3 class="mb-0"><?php echo number_format(hitungRataRata($mahasiswa), 1); ?></h3>
                        </div>
                        <i class='bx bxs-bar-chart-alt-2 stats-icon'></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Mahasiswa -->
        <div class="student-table table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Program</th>
                        <th>Nilai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <?php $infoNilai = statusNilai($mhs['nilai']); ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($mhs['nama']); ?>&background=random" 
                                         class="student-avatar" alt="<?php echo $mhs['nama']; ?>">
                                    <div>
                                        <h6 class="mb-0"><?php echo $mhs['nama']; ?></h6>
                                        <small class="text-muted">ID: <?php echo $mhs['id']; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>Ilmu Komputer</td>
                            <td><?php echo $mhs['nilai']; ?>%</td>
                            <td><span class="badge bg-<?php echo $infoNilai[1]; ?>"><?php echo $infoNilai[0]; ?></span></td>
                            <td>
                                <a href="profile.php?id=<?php echo $mhs['id']; ?>" class="btn btn-sm btn-outline-primary">
                                    <i class='bx bxs-user-detail'></i> Lihat Profil
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Bagian Ajakan -->
        <div class="cta-section">
            <h2>Bergabunglah dengan Komunitas Kami</h2>
            <p class="text-muted">Jadilah bagian dari kisah sukses kami. Daftar sekarang dan mulai perjalanan Anda bersama kami!</p>
            <a href="registration.php" class="btn btn-primary btn-lg">
                <i class='bx bxs-user-plus me-2'></i> Daftar Sekarang
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