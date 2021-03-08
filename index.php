<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page = "Dashboard";
    session_start();
    include 'admin/connect.php';
    include "atoms/head.php";
    include 'atoms/tgl_ind.php';

    $pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE pekerjaan IS NOT NULL");
    $jumlahpegawai = mysqli_num_rows($pegawai);
    $pasien = mysqli_query($conn, "SELECT * FROM table_the_iot_projects");
    $jumpasien = mysqli_num_rows($pasien);
    $rawat_inap = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE id_pasien IS NOT NULL");
    $jumrawatinap = mysqli_num_rows($rawat_inap);
    $dokter = mysqli_query($conn, "SELECT * FROM pegawai WHERE pekerjaan='1'");
    $jumlahdokter = mysqli_num_rows($dokter);
    ?>
    <style>
        #link-no {
            text-decoration: none;
        }
    </style>
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
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pegawai</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $jumlahpegawai; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-wheelchair"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Pasien</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $jumpasien; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-briefcase-medical"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Tindakan</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $jumrawatinap; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-pills"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Obat</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $jumlahdokter; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Status Ruang Rawat Inap</h4>
                            <div class="card-header-action">
                                <a href="ruangan.php">Detail</a>
                            </div>
                        </div>

                    </div>

                </section>
            </div>

        </div>
    </div>

    <?php include "atoms/all_js.php"; ?>
</body>

</html>