<?php
// Data mahasiswa (contoh)
$mahasiswa = [
    1 => [
        'nama' => 'John Doe',
        'program' => 'Ilmu Komputer',
        'nilai' => 85,
        'prestasi' => 'Pemenang Kontes Pemrograman Nasional 2024',
        'bio' => 'John adalah seorang programmer yang bersemangat dan telah memenangkan berbagai kompetisi nasional dan internasional.',
        'foto' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&h=600&fit=crop&crop=faces,center'
    ],
    2 => [
        'nama' => 'Jane Smith',
        'program' => 'Teknologi Informasi',
        'nilai' => 92,
        'prestasi' => 'Mengembangkan proyek berbasis AI yang diakui secara internasional',
        'bio' => 'Jane adalah seorang penggemar AI yang telah mengembangkan proyek-proyek inovatif dalam pembelajaran mesin.',
        'foto' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=800&h=600&fit=crop&crop=faces,center'
    ],
    3 => [
        'nama' => 'Alice Brown',
        'program' => 'Rekayasa Perangkat Lunak',
        'nilai' => 87,
        'prestasi' => 'Menerbitkan makalah penelitian di jurnal ternama',
        'bio' => 'Alice adalah seorang peneliti yang berdedikasi dengan fokus pada metodologi pengembangan perangkat lunak.',
        'foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=800&h=600&fit=crop&crop=faces,center'
    ],
    4 => [
        'nama' => 'Bob Wilson',
        'program' => 'Ilmu Komputer',
        'nilai' => 95,
        'prestasi' => 'Peringkat tertinggi dalam kursus algoritma lanjutan',
        'bio' => 'Bob adalah seorang pemecah masalah yang sangat terampil dengan minat pada algoritma dan struktur data.',
        'foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=600&fit=crop&crop=faces,center'
    ]
];

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

// Periksa apakah ID ada di array mahasiswa
if (!isset($mahasiswa[$id])) {
    echo "Mahasiswa tidak ditemukan!";
    exit;
}

$profilMahasiswa = $mahasiswa[$id];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | <?php echo $profilMahasiswa['nama']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        .card-body {
            padding: 2rem;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .text-muted {
            font-size: 1.2rem;
            color: #d1d1d1 !important;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background: #ff7eb3;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: #ff4d6d;
            transform: translateY(-2px);
        }

        p strong {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <img src="<?php echo !empty($profilMahasiswa['foto']) ? $profilMahasiswa['foto'] : 'https://via.placeholder.com/400x200?text=No+Photo'; ?>" 
                 class="card-img-top" 
                 alt="<?php echo $profilMahasiswa['nama']; ?>">
            <div class="card-body">
                <h2 class="card-title"><?php echo $profilMahasiswa['nama']; ?></h2>
                <h5 class="text-muted"><?php echo $profilMahasiswa['program']; ?></h5>
                <p class="card-text"><?php echo $profilMahasiswa['bio']; ?></p>
                <p><strong>Prestasi:</strong> <?php echo $profilMahasiswa['prestasi']; ?></p>
                <p><strong>Nilai:</strong> <?php echo $profilMahasiswa['nilai']; ?>%</p>
                <a href="students.php" class="btn btn-primary">Kembali ke Daftar Mahasiswa</a>
            </div>
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