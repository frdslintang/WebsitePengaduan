<?php
error_reporting(0);
include '../conn/koneksi.php';

// Mengambil nilai id_petugas dari parameter URL
$id_petugas = $_GET['id_petugas'];

// Ambil data petugas dari database berdasarkan ID petugas
$querySelect = "SELECT * FROM petugas WHERE id_petugas='$id_petugas'";
$resultSelect = mysqli_query($koneksi, $querySelect);
$dataTerbaru = mysqli_fetch_assoc($resultSelect);

// Mengisi nilai awal pada input form dari data petugas
$nama_terbaru = $dataTerbaru['nama_petugas'];
$username_terbaru = $dataTerbaru['username'];
$telp_terbaru = $dataTerbaru['telp_petugas'];
$levelbaru = $dataTerbaru['level'];

// Memproses pembaruan data
if (isset($_POST['Update'])) {
    // Memastikan koneksi berhasil
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke database: " . mysqli_connect_error();
        exit();
    }

    // Mendapatkan nilai-nilai input dari formulir
    $nama_baru = $_POST['nama_baru'];
    $username_baru = $_POST['username_baru'];
    $telp_baru = $_POST['telp_baru'];

    // Melakukan sanitasi input (hindari SQL injection)
    $nama_baru = mysqli_real_escape_string($koneksi, $nama_baru);
    $username_baru = mysqli_real_escape_string($koneksi, $username_baru);
    $telp_baru = mysqli_real_escape_string($koneksi, $telp_baru);

    // Query untuk memperbarui data pengguna
    $query = "UPDATE masyarakat SET nama_petugas='$nama_baru', username='$username_baru', telp_petugas='$telp_baru' WHERE id_petugas='$id_petugas'";

    // Menjalankan query
    $update = mysqli_query($koneksi, $query);

    // Memeriksa apakah pembaruan berhasil
    if ($update) {
        echo "<script>alert('Data Tersimpan')</script>";
        echo "<script>location='index.php?p=profile';</script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }

    // Menutup koneksi ke database
    mysqli_close($koneksi);
}
?>


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
    <h3 style="text-align: center; color: #283593; font-weight: bold;">UPDATE USER PENGGUNA</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($nama_terbaru); ?>" id="nama_baru" name="nama_baru" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($username_terbaru); ?>" id="username_baru" name="username_baru" required>
            <br>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="number" class="form-control" value="<?php echo htmlspecialchars($telp_terbaru); ?>" id="telp_baru" name="telp_baru" required>
        </div>
        <br>
        <label for="exampleInputPassword1" class="form-label" style="margin-right: 20px;">Level User : </label>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" <?php if ($levelbaru == 'admin') echo 'checked'; ?>>
            <label class="btn btn-outline-primary" for="btnradio1">Admin</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" <?php if ($levelbaru == 'petugas') echo 'checked'; ?>>
            <label class="btn btn-outline-primary" for="btnradio2">Petugas</label>
        </div>
        <br><br>
        <br><br>
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <button name="submit" value="Registrasi" type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php?p=user" style="text-decoration: none;">Balik ke menu utama</a>
        </div>
        
    </form>
    </div>
    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>