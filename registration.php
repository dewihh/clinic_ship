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
	<script>
		$(document).ready(function() {
			$("#getUID").load("UIDContainer.php");
			setInterval(function() {
				$("#getUID").load("UIDContainer.php");
			}, 500);
		});
	</script>
	<title>Registration : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
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
			<h1>Registration Form</h1>
			<div class="input__main">
				<div class="container__input">
					<form class="form-horizontal" action="insertDB.php" method="post">
						<div class="control-group">
							<label class="control-label mrg-104">ID</label>
							<div class="controls">
								<textarea name="id" id="getUID" placeholder="Please Scan your Card to display ID" rows="1" cols="1" required></textarea>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-57">Nam</label>
							<div class="controls">
								<input id="div_refresh" name="name" type="text" placeholder="Isikan Nama" required>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-48">Gender</label>
							<div class="controls">
								<select name="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-182">Usia</label>
							<div class="controls">
								<input name="usia" type="text" placeholder="Isikan Usia" required>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-114">Nama KK</label>
							<div class="controls">
								<input name="nama_kk" type="text" placeholder="Isikan Nama_kk" required>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-141">Alamat</label>
							<div class="controls">
								<input name="alamat" type="text" placeholder="Isikan Alamat" required>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label mrg-28">Nomor Telepon</label>
							<div class="controls">
								<input name="no_telp" type="text" placeholder="Isikan Nomor Telepon" required>
							</div>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- /container -->
	</div>
</body>

</html>