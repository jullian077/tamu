<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

//query data tamu berdasarkan id
$tamu = query("SELECT * FROM test1 WHERE id = $id")[0];
var_dump($tamu);

if( isset($_POST["submit"]) ) {

    if ( ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'datatamu.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'ubah.php';
        </script>
        ";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/main.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>

    <title>Ubah Data BukuTamu - Sentral Pangudi Luhur</title>
</head>

<body>
    <section class="fill-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row form-header">
                        <div class="col-lg-8">
                            <a href="index.php" class="">
                                <img src="assets/images/BukuTamu.png">
                            </a>
                            <h3 class="sub-header">
                                Update Data For Our Guest
                            </h3>
                            <form action="" class="basic-form" method="post">
                                <input type="hidden" name="id" value="<?= $tamu["id"]; ?>">
                                <div class="mb-2">
                                    <label for="nama" class="form-label">Full Name</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $tamu["nama"]; ?>" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?= $tamu["email"]; ?>" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-2">
                                    <label for="notelp" class="form-label">Telephone Number</label>
                                    <input type="text" name="notelp" class="form-control" id="notelp" value="<?= $tamu["notelp"]; ?>" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-2">
                                    <label for="kota" class="form-label">City</label>
                                    <input type="text" name="kota" class="form-control" id="kota" value="<?= $tamu["kota"]; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-2">
                                    <label for="instansi" class="form-label">From Where</label>
                                    <input type="text" name="instansi" class="form-control" id="instansi" value="<?= $tamu["instansi"]; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-2">
                                    <label for="tujuan" class="form-label">Purposes</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan" value="<?= $tamu["tujuan"]; ?>" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Agree to the <span class="text-green">Terms</span> and <span class="text-green">Privacy Policy</span>
                                    </label>
                                </div>
                                <div class="d-grid gap-2 button-form">
                                    <button type="submit" name="submit" class="btn btn-master btn-primary">
                                        Save Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col illustration-form">
                    <img src="assets/images/Illustration.png">
                    <p>“If you cannot do great things, do small things in a great way”</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>