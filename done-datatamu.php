<?php
include 'config/koneksi.php';
// cek apakah user sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// cek apakah ada id yang dikirim
if (isset($_GET['id'])) {
    // query update rekam_medis berdasarkan id, untuk menyatakan pasien tanggal keluar hari ini
    mysqli_query($conn, "UPDATE rekam_medis SET tanggal_keluar = '" . date('Y-m-d') . "' WHERE id = '$_GET[id]'");
    $_SESSION['success'] = "Pasien telah keluar dari rumah sakit";
}
header("location: datatamu.php");
