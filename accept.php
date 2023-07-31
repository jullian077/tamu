<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'test');
$username = $_SESSION["username"];
$admins = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username' ");
$data_admin = mysqli_fetch_assoc($admins);
$tampung_id = mysqli_query($conn, "SELECT * FROM admins WHERE id_admin = '$data_admin[id_admin]'");
$id_admins = mysqli_fetch_assoc($tampung_id);


if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$data1 = mysqli_query($conn, "SELECT * FROM RANAP WHERE id = '$id' ");
$data = mysqli_fetch_assoc($data1);

    if ( $id_admins > 0) { 
        $nama = htmlspecialchars($data["no_rm"]);
        $email = htmlspecialchars($data["nama"]);
        $notelp = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["jamkes"]);
        $instansi = htmlspecialchars($data["dpjp"]);
        $tujuan = htmlspecialchars($data["kamar"]);
        $tanggal = $data["tanggal"];
        $id_admin = $id_admins['id_admin'];

        $query = "INSERT INTO laporan VALUES ('', '$id_admin', '$nama', '$email', '$notelp', '$kota', '$instansi', '$tujuan', '$tanggal')";
        mysqli_query($conn, $query);

        //setelah berhasil datanya dipindah, maka data dengan id yg sama akan dihapus pada tabel sebelumnya yaitu pada tabel test1
        $hapus = "DELETE FROM test1 WHERE id = '$id' ";
        mysqli_query($conn, $hapus);
        echo "
            <script>
                alert('data berhasil di acc');
                document.location.href = 'datatamu.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal di acc');
                document.location.href = 'datatamu.php';
            </script>
            ";
    }

?>