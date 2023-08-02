<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "skripsi_nanang");
if (isset($_SESSION["username"])) {
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username = '$_SESSION[username]'"));
}
