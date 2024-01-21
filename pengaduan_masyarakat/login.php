<head>
	<link rel="stylesheet" href="./css/login.css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background: url(img/home.jpg); background-size: cover;">
<div class="container">
<div class="card">
<h3 class="blue-text">Login!</h3>
<br>
<br>
	<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
			<div style="display: flex; justify-content: space-between;">
				<p style="opacity: 0.5;">Belom punya akun?</p>
				<p style="opacity: 0.5;">Registrasi <a href="index.php?p=registrasi" style="opacity: 1; color: blue; font-weight: bold;">di sini!</a></p>
			</div>
		</div>
		<br>
		<input type="submit" name="login" value="Login" class="btn blue" style="width: 100%; border-radius: 50px;">
	</form>
</div>
</div>
</body>

<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login Rek')</script>";
		}
	}
 ?>