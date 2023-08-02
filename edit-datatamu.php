<?php
include 'config/koneksi.php';
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
if (!isset($_GET['id'])) {
    header("location: datatamu.php");
} else {
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rekam_medis WHERE id = '$_GET[id]'"));
    $listDokter = mysqli_query($conn, "SELECT * FROM dokter");
    $listKamar = mysqli_query($conn, "SELECT * FROM kamar");

    if (isset($_POST["submit"])) {
        $diagnosa = $_POST["diagnosa"];
        $jamkes = $_POST["jamkes"];
        $tanggal_keluar = $_POST["tanggal_keluar"];

        $query = "UPDATE rekam_medis SET diagnosa = '$diagnosa', jamkes = '$jamkes', tanggal_keluar = '$tanggal_keluar' WHERE id = '$_GET[id]'";
        if (mysqli_query($conn, $query)) {
            $_SESSION["success"] = 'Data berhasil disimpan!';
        } else {
            $_SESSION["error"] = 'Data gagal disimpan!';
        }
        header("location: datatamu.php");
    }
}
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

    <link href="assets/styles/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3" style="text-transform: none; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 24px;">Rawat<span style="color: #266052;">Inap</span>.</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="datatamu.php">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Pasien Masuk</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="laporan.php">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Laporan Pasien Ranap</span>
                </a>
            </li>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pengelolaan Data Tamu</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3 form-group">
                                            <label for="no_rm" class="form-label fw-bold">NOMOR REKAM MEDIS <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="no_rm" required disabled value="<?= $data['no_rm'] ?>">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="nama" class="form-label fw-bold">NAMA <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama" required disabled autocomplete="off" value="<?= $data['nama'] ?>">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="alamat" class="form-label fw-bold">ALAMAT <span class="text-danger">*</span></label>
                                            <textare id="alamat" rows="2" class="form-control disabled" required disabled autocomplete="off"><?= $data['alamat'] ?></textare>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="id_dokter" class="form-label fw-bold">DOKTER PENANGGUNG JAWAB <span class="text-danger">*</span></label>
                                            <select class="form-control form-select" required disabled>
                                                <option value=""></option>
                                                <?php while ($row = mysqli_fetch_assoc($listDokter)) : ?>
                                                    <option value="<?= $row['id_dokter'] ?>" <?= $row['id_dokter'] == $data['id_dokter'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
                                                <?php endwhile ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="kamar" class="form-label fw-bold">KAMAR PERAWATAN <span class="text-danger">*</span></label>
                                            <select class="form-control form-select" required="required" disabled>
                                                <option value=""> </option>
                                                <?php while ($row = mysqli_fetch_assoc($listKamar)) : ?>
                                                    <option value="<?= $row['id_kamar'] ?>" <?= $row['id_kamar'] == $data['id_kamar'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
                                                <?php endwhile ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="rujukan" class="form-label fw-bold">RUJUKAN DARI</label>
                                            <select disabled class="form-control form-select">
                                                <option value=""></option>
                                                <option <?= 'Unit Gawat Darurat' == $data['rujukan'] ? 'selected' : '' ?> value="Unit Gawat Darurat">Unit Gawat Darurat</option>
                                                <option <?= 'Poli Penyakit Dalam' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                                                <option <?= 'Poli Paru' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Paru">Poli Paru</option>
                                                <option <?= 'Poli Kebidanan & Kandungan' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Kebidanan & Kandungan">Poli Kebidanan & Kandungan</option>
                                                <option <?= 'Poli Anak' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Anak">Poli Anak</option>
                                                <option <?= 'Poli Bedah' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Bedah">Poli Bedah</option>
                                                <option <?= 'Poli Neurologi' == $data['rujukan'] ? 'selected' : '' ?> value="Poli Neurologi">Poli Neurologi</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label class="form-label fw-bold">JAMINAN KESEHATAN <span class="text-danger">*</span></label>
                                            <div class="px-3">
                                                <label for="bpjs">
                                                    <input type="radio" name="jamkes" value="bpjs" id="bpjs" required <?= 'bpjs' == $data['jamkes'] ? 'checked' : '' ?>>
                                                    BPJS
                                                </label>
                                                <br>
                                                <label for="lkm-nik">
                                                    <input type="radio" name="jamkes" value="lkm-nik" id="lkm-nik" <?= 'lkm' == $data['jamkes'] ? 'checked' : '' ?>>
                                                    LKM-NIK
                                                </label>
                                                <br>
                                                <label for="umum">
                                                    <input type="radio" name="jamkes" value="umum" id="umum" <?= 'umum' == $data['jamkes'] ? 'checked' : '' ?>>
                                                    Umum
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="diagnosa" class="form-label fw-bold">DIAGNOSA <span class="text-danger">*</span></label>
                                            <textarea name="diagnosa" id="diagnosa" rows="2" class="form-control" required autocomplete="off"><?= $data['diagnosa'] ?></textarea>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="" class="form-label fw-bold">TANGGAL MASUK <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" disabled value="<?= $data['tanggal_masuk'] ?>">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="tanggal_keluar" class="form-label fw-bold">TANGGAL KELUAR <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required value="<?= $data['tanggal_keluar'] ?>">
                                        </div>
                                        <div class="d-grid gap-2 button-form">
                                            <button type="submit" class="btn btn-master btn-primary" name="submit">
                                                SIMPAN DATA
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
