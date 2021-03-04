<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    $page1 = "uang";
    $page = "Catatan Data Pasien";
    session_start();
    include 'admin/connect.php';
    include "atoms/head.php";
    include "atoms/tgl_ind.php";
    include "atoms/umur.php";
    $cek = mysqli_query($conn, "SELECT * FROM table_the_iot_projects ");
    $pasien = mysqli_fetch_array($cek);
    $idid = $pasien['id'];

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $berat = $_POST['berat'];
        $tinggi = $_POST['tinggi'];
        $tgl = $_POST['tgl'];

        $up2 = mysqli_query($conn, "UPDATE table_the_iot_projects SET name='$nama', age='$tgl', berat='$berat', tinggi='$tinggi' WHERE id='$id'");
        echo '<script>
				setTimeout(function() {
					swal({
					title: "Data Diubah",
					text: "Data Pasien berhasil diubah!",
					icon: "success"
					});
					}, 500);
				</script>';
    }
    ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php
            include 'atoms/navbar.php';
            include 'atoms/sidebar.php';
            ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?php echo $page1; ?></h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Pasien yang telah terdaftar</h4>
                                        <div class="card-header-action">
                                            <a href="rawat_jalan.php" class="btn btn-primary">Daftar pasien baru</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Tanggal Berobat</th>
                                                        <th>Penyakit</th>
                                                        <th>Diagnosa</th>
                                                        <th>Obat</th>
                                                        <th>Total Biaya</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $sql = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE id_pasien='$idid'");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $idpenyakit = $row['id'];
                                                        $biayaperiksa = $row['biaya_pengobatan'];
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo ucwords($pasien['name']); ?></td>
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

                                                            <td>
                                                                <form method="POST" action="print.php" target="_blank">
                                                                    <input type="hidden" name="id" value="<?php echo $idnama; ?>">
                                                                    <input type="hidden" name="idriwayat" value="<?php echo $idpenyakit ?>">
                                                                    <div class="btn-group">
                                                                        <button type="submit" class="btn btn-info" name="detail" title="Detail" data-toggle="tooltip"><i class="fas fa-info"></i></button>
                                                                        <button type="submit" class="btn btn-primary" name="printone" title="Print" data-toggle="tooltip"><i class="fas fa-print"></i></button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="editPasien">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" class="needs-validation" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" name="id" required="" id="getId">
                                        <input type="text" class="form-control" name="nama" required="" id="getNama">
                                        <div class="invalid-feedback">
                                            Mohon data diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal lahir</label>
                                    <div class="form-group col-sm-9">
                                        <input type="text" class="form-control datepicker" id="getTgl" name="tgl">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Berat Badan</label>
                                    <div class="input-group col-sm-9">
                                        <input type="number" class="form-control" name="berat" required="" id="getBerat">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Kg
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Mohon data diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tinggi Badan</label>
                                    <div class="col-sm-9 input-group">
                                        <input type="number" class="form-control" name="tinggi" required="" id="getTinggi">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                cm
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Mohon data diisi!
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include "atoms/all_js.php"; ?>

    <script>
        $('#editPasien').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var nama = button.data('nama')
            var id = button.data('id')
            var tgl = button.data('lahir')
            var berat = button.data('berat')
            var tinggi = button.data('tinggi')
            var modal = $(this)
            modal.find('#getId').val(id)
            modal.find('#getNama').val(nama)
            modal.find('#getTgl').val(tgl)
            modal.find('#getBerat').val(berat)
            modal.find('#getTinggi').val(tinggi)
        })
    </script>
</body>

</html>