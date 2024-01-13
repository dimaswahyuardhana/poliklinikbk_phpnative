<?php
include_once 'koneksi.php';
include_once 'model/Dokter.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dokter = $_POST["nama"];
    $nip = $_POST["nip"];
    $password = $_POST["password"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    $dokter = new Dokter($dbh);
    $result = $dokter->registerDokter($nama_dokter, $nip, $password, $alamat, $no_hp);

    if ($result) {
        header("Location: login_dokter.php");
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        echo "Error: Gagal melakukan registrasi.";
    }    
}
?>
