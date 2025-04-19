<?php
// Data kursus (contoh)
$kursus = [
    'CS101' => [
        'nama' => 'Pengantar Pemrograman',
        'deskripsi' => 'Pelajari dasar-dasar pemrograman, termasuk sintaks, logika, dan teknik pemecahan masalah.',
        'sks' => 3,
        'jurusan' => 'Ilmu Komputer',
        'pengajar' => 'Dr. John Smith',
        'jadwal' => 'Senin & Rabu, 10:00 - 12:00'
    ],
    'CS102' => [
        'nama' => 'Struktur Data dan Algoritma',
        'deskripsi' => 'Eksplorasi struktur data dan algoritma untuk memecahkan masalah komputasi yang kompleks.',
        'sks' => 4,
        'jurusan' => 'Ilmu Komputer',
        'pengajar' => 'Dr. Alice Johnson',
        'jadwal' => 'Selasa & Kamis, 14:00 - 16:00'
    ],
    'IT201' => [
        'nama' => 'Dasar-Dasar Jaringan',
        'deskripsi' => 'Pahami dasar-dasar jaringan komputer, termasuk protokol dan konfigurasi.',
        'sks' => 3,
        'jurusan' => 'Teknologi Informasi',
        'pengajar' => 'Prof. Michael Brown',
        'jadwal' => 'Jumat, 09:00 - 12:00'
    ],
    'IT202' => [
        'nama' => 'Sistem Manajemen Basis Data',
        'deskripsi' => 'Pelajari desain basis data, SQL, dan pengelolaan basis data relasional.',
        'sks' => 4,
        'jurusan' => 'Teknologi Informasi',
        'pengajar' => 'Dr. Sarah Lee',
        'jadwal' => 'Rabu, 13:00 - 16:00'
    ],
    'SE301' => [
        'nama' => 'Siklus Hidup Pengembangan Perangkat Lunak',
        'deskripsi' => 'Pahami tahapan pengembangan perangkat lunak, mulai dari perencanaan hingga penerapan.',
        'sks' => 3,
        'jurusan' => 'Rekayasa Perangkat Lunak',
        'pengajar' => 'Dr. Emily Davis',
        'jadwal' => 'Senin & Rabu, 15:00 - 17:00'
    ],
    'SE302' => [
        'nama' => 'Metodologi Agile',
        'deskripsi' => 'Pelajari prinsip dan praktik Agile untuk pengembangan perangkat lunak.',
        'sks' => 3,
        'jurusan' => 'Rekayasa Perangkat Lunak',
        'pengajar' => 'Dr. Robert Wilson',
        'jadwal' => 'Selasa & Kamis, 10:00 - 12:00'
    ]
];

// Ambil kode kursus dari URL
$kode = $_GET['kode'] ?? null;

// Periksa apakah kode kursus ada di data
if (!$kode || !isset($kursus[$kode])) {
    echo "Kursus tidak ditemukan!";
    exit;
}

$detailKursus = $kursus[$kode];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kursus | <?php echo $detailKursus['nama']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .course-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .course-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-enroll {
            background: #4b6cb7;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-enroll:hover {
            background: #182848;
        }
    </style>
</head>
<body>
    <!-- Header Kursus -->
    <div class="course-header text-center">
        <div class="container">
            <h1 class="display-4"><?php echo $detailKursus['nama']; ?></h1>
            <p class="lead">Jurusan: <?php echo $detailKursus['jurusan']; ?></p>
        </div>
    </div>

    <div class="container">
        <div class="course-card">
            <h3>Detail Kursus</h3>
            <p><strong>Deskripsi:</strong> <?php echo $detailKursus['deskripsi']; ?></p>
            <p><strong>SKS:</strong> <?php echo $detailKursus['sks']; ?></p>
            <p><strong>Pengajar:</strong> <?php echo $detailKursus['pengajar']; ?></p>
            <p><strong>Jadwal:</strong> <?php echo $detailKursus['jadwal']; ?></p>
            <a href="registration.php" class="btn btn-enroll">Daftar Sekarang</a>
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