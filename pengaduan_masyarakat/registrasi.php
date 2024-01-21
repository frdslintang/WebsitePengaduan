<head>
	<link rel="stylesheet" href="./css/register.css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background: url(img/home.jpg); background-size: cover;">
<div class="container">
<div class="card" >
<h3 style="text-align: center; font-weight: bold;" class="blue-text">Registrasi!</h3>
<br>
<br>
	<form method="POST">
        <div class="input_field">
			<label for="nik">NIK (Nomor Induk Keluarga)</label>
			<input id="nik" type="number" name="nik" required>
		</div>
		<div class="input_field">
			<label for="nama">Nama Lengkap</label>
			<input id="nama" type="text" name="nama" required>
		</div>
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="telepon">Telepon</label>
			<input id="telepon" type="number" name="telp" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<div class="input_field">
			<label for="cpassword">Confirm Password</label>
			<input id="cpassword" type="password" name="cpassword" required>
		</div>
        <div style="display: flex; justify-content: space-between;">
				<p style="opacity: 0.5;">Sudah punya akun?</p>
				<p style="opacity: 0.5;">Login <a href="index.php?p=login" style="opacity: 1; color: blue; font-weight: bold;">di sini!</a></p>
		</div>
		<br>
		<input type="submit" name="regist" value="Registrasi" class="btn blue" style="width: 100%; border-radius: 50px;">
	</form>
</div>
</div>
</body>
<?php 
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['regist'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
	$telp = $_POST['telp'];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM masyarakat WHERE nik='$nik'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO masyarakat (nik, nama, username, password, telp)
                    VALUES ('$nik', '$nama', '$username', '$password', '$telp')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nik = "";
                $nama = "";
                $username = "";
				$telp = "";	
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! NIK Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>