<?php
    session_start();//memulai session 
    include_once 'koneksi.php';
    include_once 'header.php';
    include_once 'navigation.php';

    include_once 'model/Pasien.php';
    include_once 'model/Poli.php';
    include_once 'model/Obat.php';
    include_once 'model/Dokter.php';
    include_once 'model/User.php';
    // include_once 'model/User.php';

    //area main di logic
    //tangkap request menu di url (index.php?hal=.....)
    if(isset($_REQUEST['hal'])){
        $hal = $_REQUEST['hal'];
    }
    //jika ada request dari menu di url tampilkan hal sesuai request
    if(!empty($hal)){
        include_once $hal.'.php';
    }
    else{//jika tidak ada request dari menu di url tampilkan hal home.php
        include_once 'login.php';
    }
    include_once 'footer.php';    
?>