<?php 
    $sesi = '';
    $role = '';
    $nip = '';

    if (isset($_GET['nip'])) {
        $nip = $_GET['nip'];
    }
    
    if (isset($_GET['role'])) {
        $role = $_GET['role'];
    }

    if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['nip'])) {
        $sesi = $_SESSION['username'];
        $role = $_SESSION['role'];
        $nip = $_SESSION['nip'];
    }   
?>
<div class="mdl-layout__drawer">
        <header>E-Klinik</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="index.php?hal=dashboardadmin&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        <?php 
                            if($role == 'dokter'){
                        ?>
                        <a class="mdl-navigation__link" href="index.php?hal=dokter&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons">people</i>
                            Periksa
                        </a>
                        <a class="mdl-navigation__link" href="index.php?hal=pasien&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons">person</i>
                            Riwayat Pasien
                        </a>
                        <?php } ?>
                        <?php 
                            if($role == 'admin'){
                        ?>
                        <a class="mdl-navigation__link" href="index.php?hal=dokter&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons" role="presentation">map</i>
                            Dokter
                        </a>
                        <a class="mdl-navigation__link" href="index.php?hal=obat&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons" role="presentation">map</i>
                            Obat
                        </a>
                        <a class="mdl-navigation__link" href="index.php?hal=pasien&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons" role="presentation">map</i>
                            Pasien
                        </a>
                        <a class="mdl-navigation__link" href="index.php?hal=poli&role=<?= $role; ?>&nip=<?= $nip; ?>">
                            <i class="material-icons" role="presentation">map</i>
                            Poli
                        </a>
                        <?php } ?>
                        <div class="mdl-layout-spacer"></div>
                        <hr>
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>