<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$id = $_GET["id"];

    if ( hapus($id) > 0) {
        mysqli_query($conn, $hapus);
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'datatamu.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'datatamu.php';
            </script>
            ";
    }

?>