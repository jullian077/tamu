<?php
$conn = mysqli_connect('localhost', 'root', '', 'ranap');

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM test1 WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $kota = htmlspecialchars($data["kota"]);
    $instansi = htmlspecialchars($data["instansi"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $tanggal = date("Y-m-d H:i:s");
    // $tanggal = $data["tanggal"];

    $query = "UPDATE test1 SET
                nama = '$nama',
                email = '$email',
                notelp = '$notelp',
                kota = '$kota',
                instansi = '$instansi',
                tujuan = '$tujuan',
                tanggal = '$tanggal'
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>