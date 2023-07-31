<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Tamu.xls");

    //koneksi database
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    //ambil data
    $result = mysqli_query($conn, "SELECT * FROM laporan, admins WHERE  laporan.id_admin = admins.id_admin");
    ?>

    <center>
    <h2>Data Tamu</h2>
    </center>

    <table border="1">
        <tr>
            <th>No Rekam Medis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jaminan Kesehatan</th>
            <th>DPJP</th>
            <th>kKamar Perawatan</th>
            
        </tr>

        <?php $i = 1; ?>
        <?php foreach ( $result as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["no_rm"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
            <td><?= $row["jamkes"]; ?></td>
            <td><?= $row["dpjp"]; ?></td>
            <td><?= $row["kamar"]; ?></td>
            <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
            <td><?= $row["nama_admin"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
</table>
</body>
</html>