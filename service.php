<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta&display=swap" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    <title>Website Rekam Medis</title>

    <?php
    include 'admin/connect.php';
    if (isset($_POST['submit2'])) {
        $nomor = $_POST['no_antrian'];
        $tgl = date('Y-m-d');

        $add = mysqli_query($conn, "INSERT INTO antrian_a (no_antrian, tgl) VALUES ('$nomor', '$tgl')");
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "Berhasil!",
                    text: "Antrian telah ditambahkan!",
                    icon: "success"
                    });
                }, 500);
        </script>';
    }
    ?>
</head>

<body>
    <div class="homepages">
        <div class="homepages__title">
            <h1>Selamat Datang</h1>
            <p>Sistem Informasi Pelayanan Kesehatan</p>
        </div>
        <div class="homepages__navbar">
            <div class="navbar__menu">
                <ul>
                    <li>
                        <a class="overlay" href="home.php"><span class="texts">Home</span></a>
                    </li>
                    <li>
                        <a class="overlay" href="registration.php"><span class="texts">Registration</span></a>
                    </li>
                    <li>
                        <a class="overlay" href="read tag.php"><span class="texts">Read Tag ID</span></a>
                    </li>
                    <li>
                        <a class="overlay" href="service.php"><span class="texts">Service</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="homepages__main">
            <h1>Puskesmas Teknologi Rekayasa Internet</h1>
            <div class="container">
                <div class="">
                    <form action="" method="POST" class="needs-validation" novalidate="">
                        <div class="grid-wrapper grid-col-2">
                            <div class="selection-wrapper">
                                <label for="selected-item-1" class="selected-label">
                                    <input type="radio" name="no_antrian" id="selected-item-1" value="1">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="./img/poli umum.svg" alt="">
                                        <h4>POLI UMUM</h4>
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-2" class="selected-label">
                                    <input type="radio" checked name="no_antrian" id="selected-item-2" value="2">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="./img/poli gigi.svg" alt="">
                                        <h4>POLI GIGI</h4>
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper weather">
                                <label for="selected-item-3" class="selected-label">
                                    <input type="radio" checked name="no_antrian" id="selected-item-3" value="3">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="./img/poli kia.svg" alt="">
                                        <h4>POLI KIA</h4>
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-4" class="selected-label">
                                    <input type="radio" checked name="no_antrian" id="selected-item-4" value="4">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="./img/poli gizi.svg" alt="">
                                        <h4>POLI GIZI</h4>
                                        <h5>Lorem ipsum dolor sit amet, consectetur.</h5>
                                    </div>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary pdn-btms" name="submit2">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="modules/sweetalert/sweetalert.min.js"></script>
</body>

</html>