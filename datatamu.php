<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

//koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'ranap');


//pagination
$jumlahDataPerHalaman = 10;
$ambilData = mysqli_query($conn, "SELECT * FROM rm");
$jumlahData = mysqli_num_rows($ambilData);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

//cara mengambil halaman aktif
if ( isset($_GET["page"])) {
    $halamanAktif = $_GET["page"];
} else {
    $halamanAktif = 1;
}

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$result = mysqli_query($conn, "SELECT * FROM RANAP LIMIT $awalData, $jumlahDataPerHalaman");

$username = $_SESSION["username"];
$admins = mysqli_query($conn, "SELECT * FROM admin WHERE user = '$username' ");
$data_admin = mysqli_fetch_array($admins);

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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - BukuTamu</title>

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/styles/sb-admin-2.css" rel="stylesheet">

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

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="filter.php" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span>Filter Data</span>
                </a>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="datatamu.php" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Pasien Masuk</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="laporan.php" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Laporan Pasien Ranap</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="index.php">Rawat Inap</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data_admin["nama_admin"]; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">             

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pengelolaan Data Tamu</h1>
                    </div>
                    <div class="row">
                        <div class="col">
                        <form method="POST" class="form-inline" action="">
                            <select name="tanggal" class="form-control" style="margin-right: 20px;" required="required">
                                <option value="">Select Month</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span> Search</button>
                            </form>

                            </br>

                            <table class="table table-bordered">
                                <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>No Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jaminan Kesehatan</th>
                                    <th>DPJP</th>
                                    <th>Kamar</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                
                                <?php 
                                $no = 1;
                    
                                if(isset($_POST['filter'])) {
                                    $bln = $_POST['tanggal'];
                                    $sql = mysqli_query($conn, "SELECT * FROM rm WHERE MONTH(tanggal) ='$bln' LIMIT $awalData, $jumlahDataPerHalaman");
                                } else {
                                    $sql = mysqli_query($conn, "SELECT * FROM rm LIMIT $awalData, $jumlahDataPerHalaman");
                                }
                                while($data = mysqli_fetch_assoc($sql)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['no_rm']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['jamkes']; ?></td>
                                    <td><?php echo $data['dpjp']; ?></td>
                                    <td><?php echo $data['kamar']; ?></td>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td>    
                                        <a style="float: left;" href="accept.php?id=<?= $data["id"]; ?>" onclick="return confirm('Yakin data sudah benar?')" class="btn btn-success"><i class="fa-regular fa-circle-check"></i></a>
                                        <a style="float: left;" href="ubah.php?id=<?= $data["id"]; ?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                                        <a style="float: left;" href="hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>

                                <!-- tabel cadangan -->
                                <!-- <?php $i = 1; ?>
                                <?php foreach ( $result as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["notelp"]; ?></td>
                                    <td><?= $row["kota"]; ?></td>
                                    <td><?= $row["instansi"]; ?></td>
                                    <td><?= $row["tujuan"]; ?></td>
                                    <td>
                                        <a href="ubah.php?id=<?= $row["id"]; ?>"><i class="fa-solid fa-user-pen"></i></a>
                                        <a style="margin-left: 10px;" href="hapus.php?id=<?= $row["id"]; ?>"><i class="fa-solid fa-trash"></i></a>
                                        <a class="text-white";>wk</a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach; ?> -->
                                <!-- end tabel cadangan -->

                            </table>

                            <!-- navigasi -->
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <?php if($halamanAktif > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>">Previous</a>
                                    </li>
                                    <?php endif; ?>
                                        <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                            <?php if( $i == $halamanAktif) : ?>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php else : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php if($halamanAktif < $jumlahHalaman) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>">Next</a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <!-- ended navigasi -->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RSUD BANTARGEBANG</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>