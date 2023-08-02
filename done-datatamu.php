<?php
include 'config/koneksi.php';
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    mysqli_query($conn, "UPDATE rekam_medis SET tanggal_keluar = '" . date('Y-m-d') . "' WHERE id = '$_GET[id]'");
    $_SESSION['success'] = "Pasien telah keluar dari rumah sakit";
}
header("location: datatamu.php");
