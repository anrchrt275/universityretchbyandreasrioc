<?php
// filepath: c:\xampp\htdocs\utsweb\save_registration.php

session_start(); // Mulai session

// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "student_portal";

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Array untuk memetakan kode program ke nama program lengkap
$programMap = [
    "CS" => "Ilmu Komputer",
    "IT" => "Teknologi Informasi",
    "SE" => "Rekayasa Perangkat Lunak"
];

// Periksa apakah data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $program = $conn->real_escape_string($_POST['program']);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO registrations (name, email, phone, program) 
            VALUES ('$name', '$email', '$phone', '$program')";

    if ($conn->query($sql) === TRUE) {
        // Simpan data ke session
        $_SESSION['registration_data'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'program' => $programMap[$program] ?? $program // Gunakan nama program lengkap
        ];

        // Tampilkan halaman sukses
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Pendaftaran Berhasil</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background: #f8f9fa;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 800px;
                    margin: 50px auto;
                    padding: 20px;
                    background: white;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    text-align: center;
                    margin-bottom: 30px;
                }
                .header h1 {
                    font-size: 24px;
                    color: #4e73df;
                }
                .header p {
                    font-size: 14px;
                    color: #6c757d;
                }
                .card {
                    border: none;
                    border-radius: 10px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
                .card-header {
                    background: #4e73df;
                    color: white;
                    font-size: 18px;
                    font-weight: bold;
                    text-align: center;
                    border-radius: 10px 10px 0 0;
                }
                .card-body {
                    padding: 20px;
                    font-size: 16px;
                }
                .card-body p {
                    margin: 10px 0;
                }
                .btn-print {
                    display: block;
                    margin: 20px auto;
                    padding: 10px 20px;
                    background: #4e73df;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
                    transition: background 0.3s ease;
                }
                .btn-print:hover {
                    background: #2e59d9;
                }
                @media print {
                    .btn-print {
                        display: none;
                    }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Pendaftaran Mahasiswa</h1>
                    <p>Terima kasih telah mendaftar! Berikut adalah detail pendaftaran Anda.</p>
                </div>
                <div class='card'>
                    <div class='card-header'>
                        Detail Pendaftaran
                    </div>
                    <div class='card-body'>
                        <p><strong>Nama:</strong> {$name}</p>
                        <p><strong>Email:</strong> {$email}</p>
                        <p><strong>Telepon:</strong> {$phone}</p>
                        <p><strong>Program:</strong> {$programMap[$program]}</p>
                    </div>
                </div>
                <button class='btn-print' onclick='window.print()'>Cetak Detail</button>
            </div>
        </body>
        </html>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan saat menyimpan pendaftaran Anda. Silakan coba lagi.</div>";
    }
}

$conn->close();
?>