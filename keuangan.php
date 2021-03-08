<!DOCTYPE html>
<html lang="en">

<head>
    <?php


    $page1 = "uang";
    $page = "uang";
    session_start();
    include 'admin/connect.php';
    include "atoms/head.php";
    include "atoms/tgl_ind.php";
    include "atoms/umur.php";
    $cek = mysqli_query($conn, "SELECT * FROM table_the_iot_projects ");
    $pasien = mysqli_fetch_array($cek);
    $idid = $pasien['id'];


    ?>
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('.table-responsive').load('show.php').fadeIn("slow");
            }, 10000); // refresh setiap 10000 milliseconds
    </script>

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

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="editStatus">
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
                                <div class="form-group">
                                    <label>Status Bayar</label>
                                    <input type="hidden" class="form-control" name="id" required="" id="getId">
                                    <select class="form-control selectric" name="status" id="getStatus">
                                        <option value="1">Selesai</option>
                                        <option value="2">Belum</option>
                                    </select>
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
        $('#editStatus').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var stat = button.data('stat')
            var id = button.data('id')

            var modal = $(this)
            modal.find('#getId').val(id)
            modal.find('#getStatus').val(stat)

        })
    </script>
</body>

</html>