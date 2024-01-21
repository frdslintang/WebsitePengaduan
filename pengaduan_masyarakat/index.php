<!DOCTYPE html>
<html>
<head>
	<title>LAPOR ! Jaring Aspirasi Masyarakat</title>
	<link rel="shortcut icon" href="img/logo_aspirasi.jpeg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<link rel="stylesheet" href="./css/homepage.css">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>
<body>
	<?php 
		include 'conn/koneksi.php';
		if(@$_GET['p']==""){
			include_once 'homepage.php';
		}
		elseif(@$_GET['p']=="login"){
			include_once 'login.php';
		}
		elseif(@$_GET['p']=="registrasi"){
			include_once 'registrasi.php';
		}
		elseif(@$_GET['p']=="logout"){
			include_once 'logout.php';
		}
	 ?>
</body>
</html>