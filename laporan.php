<?php
include 'config/koneksi.php';
// cek apakah user sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
// jika tahun tidak kosong maka tampilkan data berdasarkan tahun tanggal keluar yang dipilih
// sql where tanggal keluar year
if (isset($_GET['tahun']) && $_GET['tahun'] != '') {
    $tahun = $_GET['tahun'];
    $where = "AND YEAR(tanggal_keluar) = '$tahun'";
} else {
    $where = '';
}

// jika bulan tidak kosong maka tampilkan data berdasarkan bulan tanggal keluar yang dipilih
// sql where tanggal keluar month
if (isset($_GET['bulan']) && $_GET['bulan'] != '') {
    $bulan = $_GET['bulan'];
    $where .= " AND MONTH(tanggal_keluar) = '$bulan'";
}


$data = mysqli_query($conn, "SELECT rekam_medis.*, kamar.nama AS kamar, dokter.nama AS dokter, dokter.spesialis AS dokter_spesialis FROM rekam_medis INNER JOIN kamar ON rekam_medis.id_kamar = kamar.id_kamar INNER JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter WHERE rekam_medis.tanggal_keluar IS NOT NULL $where ORDER BY tanggal_masuk DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan Data Pasien Rawat Inap</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="assets/styles/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
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

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="datatamu.php">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Pasien Masuk</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="laporan.php">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Laporan Pasien Ranap</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid mt-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Data Pasien Rawat Inap</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- menampilkan pesan error atau sukses -->
                            <?php if (isset($_SESSION["error"])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION["error"] ?>
                                </div>
                            <?php unset($_SESSION["error"]);
                            endif; ?>
                            <?php if (isset($_SESSION["success"])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_SESSION["success"] ?>
                                </div>
                            <?php unset($_SESSION["success"]);
                            endif; ?>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <form action="" method="get">
                                        <div class="form-group mb-1">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <label for="bulan" class="form-label pt-2 fw-bold">Bulan: &nbsp;&nbsp;&nbsp;</label>
                                                </div>
                                                <div>
                                                    <select name="bulan" id="bulan" class="form-select form-select-sm form-control-sm form-control">
                                                        <option value="">Semua</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 1 ? 'selected' : '' ?> value="1">Januari</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 2 ? 'selected' : '' ?> value="2">Februari</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 3 ? 'selected' : '' ?> value="3">Maret</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 4 ? 'selected' : '' ?> value="4">April</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 5 ? 'selected' : '' ?> value="5">Mei</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 6 ? 'selected' : '' ?> value="6">Juni</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 7 ? 'selected' : '' ?> value="7">Juli</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 8 ? 'selected' : '' ?> value="8">Agustus</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 9 ? 'selected' : '' ?> value="9">September</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 10 ? 'selected' : '' ?> value="10">Oktober</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 11 ? 'selected' : '' ?> value="11">November</option>
                                                        <option <?= isset($_GET['bulan']) && $_GET['bulan'] == 12 ? 'selected' : '' ?> value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <label for="tahun" class="form-label pt-2 fw-bold">Tahun: &nbsp;&nbsp;&nbsp;</label>
                                                </div>
                                                <div>
                                                    <select name="tahun" id="tahun" class="form-select form-control form-control-sm">
                                                        <option value="">Semua</option>
                                                        <?php
                                                        // mengambil tahun dari tanggal keluar
                                                        $years = [];
                                                        $queryYear = mysqli_query($conn, "SELECT tanggal_keluar FROM rekam_medis WHERE tanggal_keluar IS NOT NULL");
                                                        while ($rowYear = mysqli_fetch_assoc($queryYear)) {
                                                            if (!in_array(date('Y', strtotime($rowYear['tanggal_keluar'])), $years)) {
                                                                // memasukkan tahun ke array
                                                                array_push($years, date('Y', strtotime($rowYear['tanggal_keluar'])));
                                                                // menampilkan tahun ke option select
                                                        ?>
                                                                <option value="<?= date('Y', strtotime($rowYear['tanggal_keluar'])); ?>" <?= isset($_GET['tahun']) && date('Y', strtotime($rowYear['tanggal_keluar'])) == $_GET['tahun'] ? 'selected' : '' ?>><?= date('Y', strtotime($rowYear['tanggal_keluar'])); ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-info btn-sm">Terapkan Filter</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover table-sm" id="datatable">
                                        <thead>
                                            <tr>
                                                <th class="table-info">No</th>
                                                <th class="table-info">No Rekam Medis</th>
                                                <th class="table-info">Nama</th>
                                                <th class="table-info">Alamat</th>
                                                <th class="table-info">DPJP</th>
                                                <th class="table-info">Diagnosa</th>
                                                <th class="table-info">Kamar</th>
                                                <th class="table-info">Jaminan Kesehatan</th>
                                                <th class="table-info">Rujukan Dari</th>
                                                <th class="table-info">Tanggal Masuk</th>
                                                <th class="table-info">Tanggal Keluar</th>
                                                <th class="table-info">Lama Rawat Inap</th>
                                                <?php if ($user['role'] == 'ranap') : ?>
                                                    <th class="table-info">Aksi</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row = mysqli_fetch_assoc($data)) : ?>
                                                <tr>
                                                    <td class="text-nowrap"><?= $no++ ?></td>
                                                    <td class="text-nowrap"><?= $row['no_rm'] ?></td>
                                                    <td class="text-nowrap"><?= $row['nama'] ?></td>
                                                    <td class="text-nowrap"><?= $row['alamat'] ?></td>
                                                    <td class="text-nowrap"><?= $row['dokter'] ?></td>
                                                    <td class="text-nowrap"><?= $row['diagnosa'] ?></td>
                                                    <td class="text-nowrap"><?= $row['kamar'] ?></td>
                                                    <td class="text-nowrap"><?= $row['jamkes'] ?></td>
                                                    <td class="text-nowrap"><?= $row['rujukan'] ?></td>
                                                    <!-- menampilkan tanggal masuk dan keluar -->
                                                    <td class="text-nowrap"><?= date('d F Y', strtotime($row['tanggal_masuk'])) ?></td>
                                                    <td class="text-nowrap"><?= date('d F Y', strtotime($row['tanggal_keluar'])) ?></td>
                                                    <td class="text-nowrap">
                                                        <?php
                                                        // menghitung selisih tanggal keluar dan tanggal masuk
                                                        $diff = date_diff(date_create($row['tanggal_masuk']), date_create($row['tanggal_keluar']));
                                                        echo $diff->format('%d hari');
                                                        ?>
                                                    </td>
                                                    <!-- jika role user adalah ranap maka tampilkan button edit -->
                                                    <?php if ($user['role'] == 'ranap') : ?>
                                                        <td class="text-nowrap">
                                                            <a href="edit-datatamu.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endwhile; ?>
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
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        // inisialisasi datatable
        // jika role bukan ranap maka tampilkan tombol export

        $('#datatable').DataTable({
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],
            <?php if ($user['role'] != 'ranap') : ?>
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    }
                ]
            <?php endif; ?>
        });
    </script>
</body>

</html>
