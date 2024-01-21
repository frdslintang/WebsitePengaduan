<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo_aspirasi.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <title>LAPOR! Jaring Aspirasi Masyarakat</title>
</head>
<body style="padding: 20px;">
    <div class="row">
        <div class="col s12 m9">
        <h3 style="font-weight: bold; margin-bottom: 50px; color: #283593;">LAPORAN YANG ANDA TANGGAPI</h3>
        </div> 
        <div class="col s12 m3">
            <div class="section"></div>
            <a class="waves-effect waves-light btn blue" href="cetak.php"><i class="material-icons">print</i></a>
        </div>
    </div>

    <table border="3" class="table table-striped table-hover striped highlight" style="width: 100%; margin-inline: auto;">
        <tr>
            <td>NIK</td>
            <td>Nama</td>
            <td>Petugas</td>
            <td>Tanggal Masuk</td>
            <td>Tanggal Ditanggapi</td>
            <td>Pesan</td>
            <td>Respon</td>
            <td>Dokumen</td>
        </tr>
        <?php
        require_once '../conn/koneksi.php';

        if (isset($_GET['id_pengaduan'])) {
            $id_pengaduan = $_GET['id_pengaduan'];

            $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan
                                            INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik
                                            INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan
                                            INNER JOIN jenis_aduan ON pengaduan.id_aduan = jenis_aduan.id_aduan
                                            INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas
                                            WHERE tanggapan.id_pengaduan = '$id_pengaduan'");

            $r = mysqli_fetch_assoc($pengaduan);

        if ($r) {
            ?>
            <tr>
                <td><?php echo $r['nik']; ?></td>
                <td><?php echo $r['nama']; ?></td>
                <td><?php echo $r['nama_petugas']; ?></td>
                <td><?php echo $r['tgl_tanggapan']; ?></td>
                <td><?php echo $r['isi_laporan']; ?></td>
                <td><?php echo $r['isi_laporan']; ?></td>
                <td><?php echo $r['tanggapan']; ?></td>
                <td>
                    <?php
                    if ($r['foto'] == "kosong") {
                        ?>
                        <img src="../img/noImage.png" width="100">
                    <?php } else { ?>
                        <img width="100" src="../img/<?php echo $r['foto']; ?>">
                    <?php } ?>
                </td>
            </tr>
        <?php } else {
            echo "Data tidak ditemukan.";
        }
    }   
?>

    </table>
    <a href="index.php?p=respon" style="text-decoration: none;">Balik ke menu utama</a>
</body>
</html>