<?php
    $model = new Dokter();
    //panggil fungsi untuk menampilkan data pegawai
    $data_dokter = $model->dataDokter();
?>

<main class="mdl-layout__content ">

        <div class="mdl-grid ui-tables">

            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">Tabel Dokter</h1>
                    </div>
                    <div class="mdl-card__title">
                        <a href="index.php?hal=dokter_create">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                <i class="material-icons">create</i>
                                Tambah Data
                            </button>
                        </a>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">NO</th>
                                    <th class="mdl-data-table__cell--non-numeric">NAMA</th>
                                    <th class="mdl-data-table__cell--non-numeric">ALAMAT</th>
                                    <th class="mdl-data-table__cell--non-numeric">NOMOR HP</th>
                                    <th class="mdl-data-table__cell--non-numeric">POLI</th>
                                    <th class="mdl-data-table__cell--non-numeric">AKSI</th>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach($data_dokter as $row){
                                ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['no_hp'] ?></td>
                                    <td><?= $row['nama_poli'] ?></td>
                                    <td>
                                            <li class="mdl-list__item">
                                                <a href="index.php?hal=dokter_detail&id=<?= $row['id'] ?>">
                                                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                </a>
                                                <a href="index.php?hal=dokter_edit&id_edit=<?= $row['id'] ?>">
                                                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised mdl-js-ripple-effect button--colored-orange">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <form action="dokter_controller.php" method="POST">
                                                    <button value="hapus" name="proses" onclick="return confirm ('Apakah anda yakin ingin hapus data?')" title="Hapus dokter"  class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised mdl-js-ripple-effect button--colored-red">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                                </form>
                                            </li>
                                        
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

<!-- inject:js -->
<script src="js/d3.min.js"></script>
<script src="js/getmdl-select.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/nv.d3.min.js"></script>
<script src="js/layout/layout.min.js"></script>
<script src="js/scroll/scroll.min.js"></script>
<script src="js/widgets/charts/discreteBarChart.min.js"></script>
<script src="js/widgets/charts/linePlusBarChart.min.js"></script>
<script src="js/widgets/charts/stackedBarChart.min.js"></script>
<script src="js/widgets/employer-form/employer-form.min.js"></script>
<script src="js/widgets/line-chart/line-charts-nvd3.min.js"></script>
<script src="js/widgets/map/maps.min.js"></script>
<script src="js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
<script src="js/widgets/table/table.min.js"></script>
<script src="js/widgets/todo/todo.min.js"></script>
<!-- endinject -->