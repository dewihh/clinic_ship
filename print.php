<?php
$idnama = $_POST['id'];
$page1 = "det";
$page = "Detail Pasien : " . $idnama;
session_start();
include 'admin/connect.php';
include "atoms/head.php";
include 'atoms/umur.php';
include 'atoms/tgl_ind.php';

//All SQL Syntax
$cek = mysqli_query($conn, "SELECT * FROM table_the_iot_projects WHERE name='$idnama'");
$pasien = mysqli_fetch_array($cek);
$idid = $pasien['id'];

if (isset($_POST['printall'])) {
    $riwayatpenyakit = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE id_pasien='$idid' ORDER BY tgl ASC");
} elseif (isset($_POST['printone']) || isset($_POST['detail'])) {
    $idriwayat = $_POST['idriwayat'];
    $riwayatpenyakit = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE id_pasien='$idid' AND id='$idriwayat'");
} elseif (isset($_POST['print_foto'])) {
    $idfoto = $_POST['idfoto'];
    $sqlimg = mysqli_query($conn, "SELECT * FROM foto_rotgen WHERE id_pasien='$idid' AND id_penyakit='$idfoto'");
    $penyakit = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE id_pasien='$idid' AND id='$idfoto'");
    $echopen = mysqli_fetch_array($penyakit);
}
?>

<div class="section-body">
    <?php if (isset($_POST['print_foto'])) { ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="gallery gallery-md">
                            <?php
                            if (mysqli_num_rows($sqlimg) == "0") {
                                echo 'Tidak ada data';
                            } else {
                                while ($img = mysqli_fetch_array($sqlimg)) {
                                    $dirimg = $img['directory'];

                                    echo '<img src="' . $dirimg . '" width="100%" style="margin-bottom: 200px;">';
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Info Pasien</h4>
                        <div class="card-header-action">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="gallery">
                            <table class="table table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td> : <?php echo ucwords($idnama); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td> : <?php echo tgl_indo($pasien['age']); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tinggi Bandan</th>
                                        <td> : <?php echo $pasien['tinggi'] . " cm"; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Berat Badan</th>
                                        <td> : <?php echo $pasien['berat'] . " kg"; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td> : <?php echo $pasien['adress']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Catatan Riwayat Penyakit Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Tanggal Berobat</th>
                                        <th>Penyakit</th>
                                        <th>Diagnosa</th>
                                        <th>Obat</th>
                                        <th>Total Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($riwayatpenyakit)) {
                                        $idpenyakit = $row['id'];
                                        $biayaperiksa = $row['biaya_pengobatan'];
                                    ?>
                                        <tr>
                                            <td><?php echo ucwords(tgl_indo($row['tgl'])); ?></td>
                                            <td><?php echo ucwords($row['penyakit']); ?></td>
                                            <td><?php
                                                echo $row['diagnosa'] . " - ";

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $obat2an = mysqli_query($conn, "SELECT * FROM riwayat_obat WHERE id_penyakit='$idpenyakit' AND id_pasien='$idid'");
                                                $jumobat = mysqli_num_rows($obat2an);
                                                if ($jumobat == 0) {
                                                    echo "Tidak ada obat yang diberikan";
                                                    @$hargaobat = 0;
                                                } else {
                                                    $count = 0;
                                                    while ($showobat = mysqli_fetch_array($obat2an)) {
                                                        $jumjumjum = $showobat['jumlah'];
                                                        $idobat = $showobat['id_obat'];
                                                        $obatlagi = mysqli_query($conn, "SELECT * FROM obat WHERE id='$idobat'");
                                                        $namaobat = mysqli_fetch_array($obatlagi);
                                                        echo $str = ucwords($namaobat['nama_obat']);
                                                        $count = $count + 1;

                                                        if ($count < $jumobat) {
                                                            echo ", ";
                                                        }

                                                        @$hargaobat += $namaobat['harga'] * $jumjumjum;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                @$sum += $biayaperiksa + @$hargaobat;
                                                echo number_format(@$biayaperiksa + @$hargaobat, 0, ".", ".");
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th colspan="4">
                                            Total yang harus dibayar :
                                        </th>
                                        <th><?php echo "Rp. " . number_format($sum, 0, ".", "."); ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    if (!isset($_POST['detail'])) {
        if (!isset($_POST['print_foto'])) {
            echo '<footer class="main-footer">
    <div class="footer-left">
      Struk ini dicetak pada tanggal ' . tgl_indo(date('Y-m-d')) . '
    </div>
  </footer>';
        }
        echo '<script> window.print(); </script>';
    } ?>