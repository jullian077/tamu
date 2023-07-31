<?php
// Koneksi ke database (ganti dengan konfigurasi database Anda)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'ranap';
$koneksi = mysqli_connect($host, $user, $password, $database);

// Mendapatkan ID Dokter dari parameter URL
$id_dokter = $_GET['id'];

// Query untuk mendapatkan data nama dokter berdasarkan ID
$query = "SELECT nama FROM dokter WHERE id = '$id_dokter'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>