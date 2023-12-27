<?php 
    if(isset($_SESSION['username'])&& isset($_SESSION['role'])){
        $sesi = $_SESSION['username'];
        $role = $_SESSION['role'];
    }
?>
<div class="mdl-layout__drawer">
        <header>E-Klinik</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="index.php?hal=dashboardadmin">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        <?php 
                            if($role == 'dokter'){
                        ?>
                        <a class="mdl-navigation__link" href="index.php?hal=dokter">
                            <i class="material-icons">people</i>
                            Periksa
                        </a>
                        <a class="mdl-navigation__link" href="index.php?hal=pasien">
                            <i class="material-icons">person</i>
                            Riwayat Pasien
                        </a>
                        <?php } ?>
                        <?php 
                            if($role == 'admin'){
                        ?>
                        <a class="mdl-navigation__link" href="index.php?hal=obat">
                            <i class="material-icons" role="presentation">map</i>
                            Obat
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