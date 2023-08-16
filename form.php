<?php
include 'config/koneksi.php';
$listDokter = mysqli_query($conn, "SELECT * FROM dokter");
$listKamar = mysqli_query($conn, "SELECT * FROM kamar");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/main.css" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Ranap Bantargebang</title>
</head>

<body style="background-color: #f5f5f5;">
    <div class="container border bg-white my-5 shadow">
        <div class="row">
            <div class="col-lg-5">
                <div class="p-5">
                    <a href="index.php">
                        <img src="assets/images/BukuTamu.png">
                    </a>

                    <form action="" method="post">
                        <div class="mb-3 form-group mt-4">
                            <?php if (isset($_SESSION["success"])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_SESSION["success"] ?>
                                </div>
                            <?php unset($_SESSION["success"]);
                            endif; ?>
                            <?php if (isset($_SESSION["error"])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION["error"] ?>
                                </div>
                            <?php unset($_SESSION["error"]);
                            endif; ?>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="no_rm" class="form-label fw-bold">NOMOR REKAM MEDIS <span class="text-danger">*</span></label>
                            <input type="text" name="no_rm" class="form-control" id="no_rm" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="nama" class="form-label fw-bold">NAMA <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" required autocomplete="off">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="alamat" class="form-label fw-bold">ALAMAT <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" rows="2" class="form-control" required autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="id_dokter" class="form-label fw-bold">DOKTER PENANGGUNG JAWAB <span class="text-danger">*</span></label>
                            <select name="id_dokter" class="form-control form-select" required>
                                <option value=""></option>
                                <?php while ($row = mysqli_fetch_assoc($listDokter)) : ?>
                                    <option value="<?= $row['id_dokter'] ?>"><?= $row['nama'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="kamar" class="form-label fw-bold">KAMAR PERAWATAN <span class="text-danger">*</span></label>
                            <select name="kamar" class="form-control form-select" required="required">
                                <option value=""> </option>
                                <?php while ($row = mysqli_fetch_assoc($listKamar)) : ?>
                                    <option value="<?= $row['id_kamar'] ?>"><?= $row['nama'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="rujukan" class="form-label fw-bold">RUJUKAN DARI</label>
                            <select name="rujukan" class="form-control form-select">
                                <option value=""></option>
                                <option value="Unit Gawat Darurat">Unit Gawat Darurat</option>
                                <option value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                                <option value="Poli Paru">Poli Paru</option>
                                <option value="Poli Kebidanan & Kandungan">Poli Kebidanan & Kandungan</option>
                                <option value="Poli Anak">Poli Anak</option>
                                <option value="Poli Bedah">Poli Bedah</option>
                                <option value="Poli Neurologi">Poli Neurologi</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label fw-bold">JAMINAN KESEHATAN <span class="text-danger">*</span></label>
                            <div class="px-3">
                                <label for="bpjs">
                                    <input type="radio" name="jamkes" value="bpjs" id="bpjs" required>
                                    BPJS
                                </label>
                                <br>
                                <label for="lkm-nik">
                                    <input type="radio" name="jamkes" value="lkm-nik" id="lkm-nik">
                                    LKM-NIK
                                </label>
                                <br>
                                <label for="umum">
                                    <input type="radio" name="jamkes" value="umum" id="umum">
                                    Umum
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="diagnosa" class="form-label fw-bold">DIAGNOSA <span class="text-danger">*</span></label>
                            <textarea name="diagnosa" id="diagnosa" rows="2" class="form-control" required autocomplete="off"></textarea>
                        </div>
                        <div class="d-grid gap-2 button-form">
                            <button type="submit" class="btn btn-master btn-primary">
                                SIMPAN DATA
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 text-center illustration-form py-5 ps-5">
                <img src="assets/images/ners.png" class="text-center ps-5 pt-5 mt-5">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-popup" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body h4 text-dark fw-bold text-center">
                </div>
                <div class="modal-footer">
                    <a href="form.php" class="btn btn-primary">Oke</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'process-form.php',
                type: 'post',
                data: {
                    no_rm: $('[name=no_rm]').val(),
                    nama: $('[name=nama]').val(),
                    alamat: $('[name=alamat]').val(),
                    diagnosa: $('[name=diagnosa]').val(),
                    jamkes: $('input[name="jamkes"]:checked').val(),
                    id_dokter: $('[name=id_dokter]').val(),
                    kamar: $('[name=kamar]').val(),
                    rujukan: $('[name=rujukan]').val()
                },
                success: function(data) {
                    $(document).ready(function() {
                        $('#modal-popup .modal-body').text(data);
                        $('#modal-popup').modal('show');
                    });
                }
            })
        });
    </script>
</body>

</html>
