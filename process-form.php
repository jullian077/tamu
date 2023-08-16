<?php
include 'config/koneksi.php';
if (isset($_POST["no_rm"])) {
    //ambil data dari setiap form
    $no_rm = $_POST["no_rm"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $diagnosa = $_POST["diagnosa"];
    $jamkes = $_POST["jamkes"];
    $id_dokter = $_POST["id_dokter"];
    $id_kamar = $_POST["kamar"];
    $rujukan = $_POST["rujukan"];
    $tanggal_masuk = date("Y-m-d");

    //query insert data
    $query = "INSERT INTO rekam_medis (id_dokter, id_kamar, no_rm, nama, alamat, diagnosa, rujukan, jamkes, tanggal_masuk)
                VALUES ('$id_dokter', '$id_kamar', '$no_rm', '$nama', '$alamat', '$diagnosa', '$rujukan', '$jamkes', '$tanggal_masuk')";
    if (mysqli_query($conn, $query)) {
        echo 'Data berhasil disimpan!';
        $_SESSION["success"] = 'Data berhasil disimpan!';
    } else {
        echo 'Data gagal disimpan!';
        $_SESSION["error"] = 'Data gagal disimpan!';
    }
}
