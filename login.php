<?php
include 'config/koneksi.php';
if (isset($_SESSION["username"])) {
    header("location: dashboard.php");
}
if (isset($_POST["login"])) {
    // ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    // query data user
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION["username"] = $username;
            header("location: dashboard.php");
        } else {
            $_SESSION["error"] = 'Password salah!';
            header("location: login.php");
        }
    } else {
        $_SESSION["error"] = 'User tidak ditemukan!';
        header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RawatInap - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/styles/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-success">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/images/image 1.png" alt="" width="420" height="450">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Rawat Inap</h1>
                                    </div>
                                    <!-- menampilkan pesan error login -->
                                    <?php if (isset($_SESSION["error"])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION["error"] ?>
                                        </div>
                                    <?php unset($_SESSION["error"]);
                                    endif; ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" required name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" required name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-block">
                                            Login
                                        </button>
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
