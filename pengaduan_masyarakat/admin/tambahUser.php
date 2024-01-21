<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo_aspirasi.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>LAPOR! Jaring Aspirasi Masyarakat</title>
</head>
<body>
    <div class="row" style="width: 80%; margin-top: 50px; margin-inline: auto;">
    <h3 style="text-align: center; color: #283593; font-weight: bold;">TAMBAH USER PENGGUNA</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="number" class="form-control" id="telepon" name="telp" required>
        </div>
        <div class="dropdown">
            <button id="dropdownButton" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Level
            </button>
            <div class="dropdown-menu">
                <?php
                    require_once '../conn/koneksi.php';
                    $level_petugas = mysqli_query($koneksi, "SELECT * FROM petugas") or die(mysqli_error($koneksi));
                    while ($lvl_petugas = mysqli_fetch_array($level_petugas)) {
                        echo "<a class='dropdown-item' href='#' onclick='selectLevel(\"$lvl_petugas[level]\")'name='level'>$lvl_petugas[level]</a>";
                    }
                ?>
            </div>
        </div>
        <br><br>
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <input type="hidden" id="selectedLevel" name="level">
            <button name="submit" value="Registrasi" type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php?p=user" style="text-decoration: none;">Balik ke menu utama</a>
        </div>
        
    </form>
    </div>
    <?php 
 require_once '../conn/koneksi.php';
error_reporting(0);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
	$telp = $_POST['telp'];
	$level = $_POST['level'];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM petugas WHERE username='$username'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO petugas (nama_petugas, username, password, telp_petugas, level)
                    VALUES ('$nama', '$username', '$password', '$telp', '$level')";
            if ( mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nama = "";
                $username = "";
				$telp = "";	
				$level = "";	
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
    <script>
        function selectLevel(level) {
        document.getElementById("dropdownButton").innerText = level;
        document.getElementById("selectedLevel").value = level;
        }
    </script>
    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>