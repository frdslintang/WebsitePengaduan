<?php
session_start();
error_reporting(0);
include '../conn/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} elseif ($_SESSION['level'] != "masyarakat") {
    header('location:../index.php');
}

// Ambil data pengguna dari database
$data = $_SESSION['data'];
$username = $data['username']; // mengambil data nama dari session
$nik = $data['nik']; 
$nama = $data['nama']; 
$telp = $data['telp']; 

// Mendapatkan data terbaru dari tabel masyarakat
$querySelect = "SELECT * FROM masyarakat WHERE nik='$nik'";
$resultSelect = mysqli_query($koneksi, $querySelect);
$dataTerbaru = mysqli_fetch_assoc($resultSelect);

// Mengisi nilai awal pada input form
$nik_terbaru = $dataTerbaru['nik'];
$nama_terbaru = $dataTerbaru['nama'];
$username_terbaru = $dataTerbaru['username'];
$telp_terbaru = $dataTerbaru['telp'];

// Memproses pembaruan data
if (isset($_POST['Update'])) {
    // Memastikan koneksi berhasil
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke database: " . mysqli_connect_error();
        exit();
    }

    // Mendapatkan nilai-nilai input dari formulir
    $nik_baru = $_POST['nik_baru'];
    $nama_baru = $_POST['nama_baru'];
    $username_baru = $_POST['username_baru'];
    $telp_baru = $_POST['telp_baru'];

    // Melakukan sanitasi input (hindari SQL injection)
    $nik_baru = mysqli_real_escape_string($koneksi, $nik_baru);
    $nama_baru = mysqli_real_escape_string($koneksi, $nama_baru);
    $username_baru = mysqli_real_escape_string($koneksi, $username_baru);
    $telp_baru = mysqli_real_escape_string($koneksi, $telp_baru);

    // Query untuk memperbarui data pengguna
    $query = "UPDATE masyarakat SET nik='$nik_baru', nama='$nama_baru', username='$username_baru', telp='$telp_baru' WHERE nik='$nik_baru'";

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="responsive-table" border="2" style="width: 100%;">
        <tr>
            <td><h4 style="color: #283593; font-weight: 600;">Ubah Profile</h4></td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <form method="POST" enctype="multipart/form-data">
                    <input class="materialize-textarea" name="nik_baru" value="<?php echo $nik_terbaru; ?>" placeholder="NIK (Nomor Induk Keluarga)" aria-label="readonly input example" readonly style="width: 50%;"><br><br>
                    <input class="materialize-textarea" name="nama_baru" value="<?php echo $nama_terbaru; ?>" placeholder="Nama Lengkap" style="width: 50%;"><br><br>
                    <input class="materialize-textarea" name="username_baru" value="<?php echo $username_terbaru; ?>" placeholder="Username" style="width: 50%;"><br><br>
                    <input class="materialize-textarea" name="telp_baru" value="<?php echo $telp_terbaru; ?>" placeholder="Telepon" style="width: 50%;"><br><br>
                    <input type="submit" name="Update" value="Kirim" class="btn">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
