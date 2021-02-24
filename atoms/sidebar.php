<?php
$judul = "aplikasi rekam medis";
$pecahjudul = explode(" ", $judul);
$acronym = "";

foreach ($pecahjudul as $w) {
    $acronym .= $w[0];
}
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><?php echo $judul; ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><?php echo $acronym; ?></a>
        </div>
        <ul class="sidebar-menu">
            <li <?php echo ($page == "Dashboard") ? "class=active" : ""; ?>><a class="nav-link" href="index.php"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>

            <li class="dropdown <?php echo ($page1 == "datajabatan" || $page1 == "Data Pegawai" || $page1 == "data" || $page1 == "poli" || $page1 == "dokter" || $page1 == "jadwal") ? "active" : ""; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Administrasi</span></a>
                <ul class="dropdown-menu">
                    <li <?php echo (@$page1 == "datajabatan") ? "class=active" : ""; ?>><a class="nav-link" href="jabatan.php">Data Jabatan</a></li>
                    <li <?php echo (@$page1 == "Data Pegawai") ? "class=active" : ""; ?>><a class="nav-link" href="pegawai.php">Data Pegawai</a></li>
                    <li <?php echo (@$page1 == "data") ? "class=active" : ""; ?>><a class="nav-link" href="paramedik.php">Data Paramedis</a></li>
                    <li <?php echo (@$page1 == "poli") ? "class=active" : ""; ?>><a class="nav-link" href="poli.php">Data Poli</a></li>
                    <li <?php echo (@$page1 == "dokter") ? "class=active" : ""; ?>><a class="nav-link" href="data_dokter.php">Data Dokter</a></li>
                    <li <?php echo (@$page1 == "jadwal") ? "class=active" : ""; ?>><a class="nav-link" href="jadwal.php">Jadwal Dokter</a></li>
                </ul>
            </li>

            <li <?php echo ($page == "Rawat Jalan") ? "class=active" : ""; ?>><a class="nav-link" href="rawat_jalan.php"><i class="fas fa-stethoscope"></i> <span>Rawat Jalan</span></a></li>
            <li <?php echo ($page == "Data Pasien" || @$page1 == "det") ? "class=active" : ""; ?>><a class="nav-link" href="pasien.php"><i class="fas fa-user-injured"></i> <span>Data Pasien</span></a></li>

            <li <?php echo ($page == "Data Pegawai") ? "class=active" : ""; ?>><a href="pegawai.php" class="nav-link"><i class="fas fa-users"></i> <span>Data Pegawai</span></a></li>
            <li class="dropdown <?php echo ($page1 == "ruang" || $page1 == "riwayatinap") ? "active" : ""; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bed"></i> <span>Rawat Inap</span></a>
                <ul class="dropdown-menu">
                    <li <?php echo (@$page1 == "ruang") ? "class=active" : ""; ?>><a class="nav-link" href="ruangan.php">Detail Ruangan</a></li>
                    <li <?php echo (@$page1 == "riwayatinap") ? "class=active" : ""; ?>><a class="nav-link" href="riwayat_inap.php">Riwayat Rawat Inap</a></li>
                </ul>
            </li>
            <li <?php echo ($page == "Data Foto Rotgen" || @$page1 == "detrot") ? "class=active" : ""; ?>><a class="nav-link" href="rotgen.php"><i class="fas fa-skull"></i> <span>Foto Rotgen</span></a></li>
            <li <?php echo ($page == "Data Obat") ? "class=active" : ""; ?>><a class="nav-link" href="obat.php"><i class="fas fa-briefcase-medical"></i> <span>Obat</span></a></li>
    </aside>
</div>