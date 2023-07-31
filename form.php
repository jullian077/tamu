<?php 
//koneksi database
// session_start();
$conn = mysqli_connect("localhost", "root", "", "ranap");

if( isset($_POST["submit"]) ) {

    //ambil data dari setiap form
    $no_rm = htmlspecialchars($_POST["no_rm"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $jamkes = htmlspecialchars($_POST["jamkes"]);
    $dpjp = htmlspecialchars($_POST["dpjp"]);
    $kamar = htmlspecialchars($_POST["kamar"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);

    //query insert data
    $query = "INSERT INTO rm VALUES ('', '$no_rm', '$nama', '$alamat', '$jamkes', '$dpjp', '$kamar', '$tanggal')";
    mysqli_query($conn, $query); 

    //cek apakah data berhasil ditambahkan atau tidak
    if( mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                document.location.href = 'success-form.html';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
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

    <title>Ranap Bantargebang</title>
</head>

<body>
     <script>
        function isiNamaDokter() {
          var inputiddokter = document.getElementById("id").value;
          var inputNama = document.getElementById("nama");
          
          // Mengirim permintaan AJAX ke server untuk mengambil data dokter berdasarkan ID
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.nama) {
                inputNamaDokter.value = response.nama;
              } else {
                inputNamaDokter.value = "";
              }
            }
          };
          xhr.open("GET", "ambil_data_dokter.php?id=" + inputiddokter, true);
          xhr.send();
        }
      </script>
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
                                RSUD BANTARGEBANG
                            </h3>
                            <form action="" class="basic-form" method="post">
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label">NO REKAM MEDIS</label>
                                    <input type="text" name="no_rm" class="form-control" id="no_rm" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">ALAMAT</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">JAMINAN KESEHATAN</label>
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
                                <div class="mb-3">
                                    <form method="POST" class="form-inline" action="">
                                    <label for="id_dokter" class="form-label">ID DOKTER</label>
                            <select name="id_dokter" class="form-control" style="margin-right: 20px;" required="required" oninput="IsiNamaDokter()">
                                <option value=""> </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option> 
                            </select>
                            </form>
                                </div>
                                <div class="mb-3">
                                    <label for="dpjp" class="form-label">DPJP</label>
                                    <input type="text" name="dpjp" class="form-control" id="dpjp" aria-describedby="emailHelp" readonly>
                                </div>                   
                                <div class="mb-3">
                                    <form method="POST" class="form-inline" action="">
                                    <label for="kamar" class="form-label">KAMAR PERAWATAN</label>
                            <select name="kamar" class="form-control" style="margin-right: 20px;" required="required">
                                <option value=""> </option>
                                <option value="1">R. Bougenvile</option>
                                <option value="2">R. Crysan</option>
                                <option value="3">R. Delima</option>
                                <option value="4">R. Teratai</option>
                                <option value="5">R. Tulip</option>
                                <option value="6">R. Anggrek</option>
                                <option value="6">R. Edelweis</option>
                                <option value="6">R. Isolasi</option>
                            </select>
                            </form>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">TANGGAL</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="emailHelp" required>
                                </div>                                
                                <div class="d-grid gap-2 button-form">
                                    <button type="submit" name="submit" class="btn btn-master btn-primary">
                                        SIMPAN DATA
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col illustration-form">
                    <img src="assets/images/Illustration.png">
                    <p>“HAI”</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>