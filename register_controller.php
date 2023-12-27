<?php
include_once 'koneksi.php';
include_once 'model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $user = new User($dbh);
    $result = $user->registerUser($nama_lengkap, $email, $username, $password, $role);

    if ($result) {
        header("Location: login.php");
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        echo "Error: Gagal melakukan registrasi.";
    }    
}
?>
