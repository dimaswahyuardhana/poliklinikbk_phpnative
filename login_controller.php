<?php
session_start();
include_once 'koneksi.php';
include_once 'model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $userModel = new User($dbh);
    $user = $userModel->getUserByUsername($username);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $user["role"];
        header("Location:index.php?hal=dashboardadmin"); // Ganti dengan halaman setelah login
        exit();
    } else {
        echo "Login gagal. Periksa kembali username dan password.";
    }
}
?>
