<?php
session_start();
include_once 'koneksi.php';
include_once 'model/Dokter.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST["nip"];
    $password = $_POST["password"];

    $dokterModel = new Dokter($dbh);
    $dokter = $dokterModel->getUserByNip($nip);

    if ($dokter && password_verify($password, $dokter["password"])) {
        $_SESSION["nip"] = $nip;
        $_SESSION["role"] = $dokter['role'];
        header("Location:index.php?hal=dashboardadmin&role=".$dokter['role']."&nip=".$dokter['nip']); // Ganti dengan halaman setelah login
        exit();
    } else {
        echo "Login gagal. Periksa kembali username dan password.";
    }
}
?>
