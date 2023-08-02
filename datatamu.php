<?php
include 'config/koneksi.php';
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
// $jumlahDataPerHalaman = 10;
// $ambilData = mysqli_query($conn, "SELECT * FROM rm");
// $jumlahData = mysqli_num_rows($ambilData);
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

// //cara mengambil halaman aktif
// if (isset($_GET["page"])) {
//     $halamanAktif = $_GET["page"];
// } else {
//     $halamanAktif = 1;
// }

// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// $result = mysqli_query($conn, "SELECT * FROM RANAP LIMIT $awalData, $jumlahDataPerHalaman");

// $username = $_SESSION["username"];
// $admins = mysqli_query($conn, "SELECT * FROM admin WHERE user = '$username' ");
// $data_admin = mysqli_fetch_array($admins);

//hanya untuk mengetest apakah tabel test1 ada didalam database test atau tidak
// if (!$result) {
//     echo mysqli_error($conn);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - BukuTamu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/styles/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3" style="text-transform: none; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 24px;">Rawat<span style="color: #266052;">Inap</span>.</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="datatamu.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Pasien Masuk</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="laporan.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Laporan Pasien Ranap</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pengelolaan Data Tamu</h1>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered table-hover table-xs" id="datatable">
                                        <thead>
                                            <tr>
                                                <th class="table-info">No</th>
                                                <th class="table-info">No Rekam Medis</th>
                                                <th class="table-info">Nama</th>
                                                <th class="table-info">Alamat</th>
                                                <th class="table-info">Jaminan Kesehatan</th>
                                                <th class="table-info">DPJP</th>
                                                <th class="table-info">Kamar</th>
                                                <th class="table-info">Tanggal</th>
                                                <th class="table-info">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $('#datatable').DataTable({
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
    </script>
</body>

</html>
