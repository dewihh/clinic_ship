<?php

require 'database.php';

if (!empty($_POST)) {
	// keep track post values
	$name = $_POST['name'];
	$id = $_POST['id'];
	$gender = $_POST['gender'];
	$usia = $_POST['usia'];
	$nama_kk = $_POST['nama_kk'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];

	// insert data
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO table_the_iot_projects (name,id,gender,usia,nama_kk,alamat,no_telp) values(?, ?, ?, ?, ?,?,?)";
	$q = $pdo->prepare($sql);
	$q->execute(array($name, $id, $gender, $usia, $nama_kk, $alamat, $no_telp));
	Database::disconnect();
	header("Location: user data.php");
}
