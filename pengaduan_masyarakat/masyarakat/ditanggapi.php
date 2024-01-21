<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo_aspirasi.jpeg">
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <title>LAPOR! Jaring Aspirasi Masyarakat</title>
</head>
<body style="padding: 20px;">
    <h3 style="text-align: center; font-weight: bold; margin-bottom: 50px; color: #283593;">LAPORAN YANG SUDAH DITANGGAPI</h3>
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
            session_start();
            $nik = $_SESSION['data']['nik'];
            $id_pengaduan = $_GET['id_pengaduan'];
            require_once '../conn/koneksi.php';
            // INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN jenis_aduan ON jenis_aduan.id_aduan=pengaduan.id_aduan
            $pengaduan = mysqli_query($koneksi,"SELECT * FROM  pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas INNER JOIN jenis_aduan ON jenis_aduan.id_aduan=pengaduan.id_aduan   WHERE tanggapan.id_pengaduan = '$id_pengaduan' ORDER BY pengaduan.id_pengaduan DESC");
            while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
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
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
                </td>
            </tr>
            <?php
            }
        ?>
    </table>
    <a href="index.php?p=dashboard" style="text-decoration: none;">Balik ke menu utama</a>
</body>
</html>