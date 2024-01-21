<table class="responsive-table" border="2" style="width: 100%;">
	<tr>
		<td><h4 style="color: #283593; font-weight: 600;">Tulis Laporan</h4></td>
		<td><h4 style="color: #283593; font-weight: 600;">Daftar Laporan</h4></td>
	</tr>
	<tr>
		<td style="padding: 20px;">
			<form method="POST" enctype="multipart/form-data">
				<textarea class="materialize-textarea" name="laporan" placeholder="Tulis Laporan"></textarea><br><br>
				<label>Jenis Aduan</label><br><br>
				<select name="aduan" id="aduan" required>
					<option value="">- Pilih -</option>
					<?php
					$jenis_aduan = mysqli_query($koneksi, "SELECT * FROM jenis_aduan") or die (mysqli_error($koneksi));
					while($aduan_masyarakat = mysqli_fetch_array($jenis_aduan)){
						echo "<option value = '$aduan_masyarakat[id_aduan]'>$aduan_masyarakat[nama_aduan]<option>";
					}
					?>
				</select><br>
				<label>Gambar</label><br><br>
				<input type="file" name="foto"><br><br>
				<input type="submit" name="kirim" value="Kirim" class="btn">
			</form>
		</td>

		<td>
			
			<table border="3" class="responsive-table striped highlight">
				<tr>
					<td>No</td>
					<td>NIK</td>
					<td>Nama</td>
					<td>Tanggal Masuk</td>
					<td>Nama Aduan</td>
					<td>Status</td>
					<td>Opsi</td>
				</tr>
				<?php 
					// masih bermasalah
					$no=1;
					// INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN jenis_aduan ON jenis_aduan.id_aduan=pengaduan.id_aduan 
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM  pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas  INNER JOIN jenis_aduan ON jenis_aduan.id_aduan=pengaduan.id_aduan  WHERE pengaduan.nik='".$_SESSION['data']['nik']."' ORDER BY pengaduan.id_pengaduan DESC");
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['nik']; ?></td>
						<td><?php echo $r['nama']; ?></td>
						<td><?php echo $r['tgl_pengaduan']; ?></td>
						<td><?php echo $r['nama_aduan']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a class="btn blue modal-trigger" href="ditanggapi.php?id_pengaduan=<?php echo $r['id_pengaduan'] ?>">More</a> 
							<a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>
					</tr>
				<?php	}
				 ?>
			</table>
		</td>
	</tr>
</table>
<?php 
	 if(isset($_POST['kirim'])){
	 	$nik = $_SESSION['data']['nik'];
	 	$tgl = date('Y-m-d');

	 	$foto = $_FILES['foto']['name'];
	 	$source = $_FILES['foto']['tmp_name'];
	 	$folder = './../img/';
	 	$listeks = array('jpg','png','jpeg');
	 	$pecah = explode('.', $foto);
	 	$eks = $pecah['1'];
	 	$size = $_FILES['foto']['size'];
	 	$nama = date('dmYis').$foto;
		$aduan = $_POST['aduan'];

		if($foto !=""){
		 	if(in_array($eks, $listeks)){
		 		if($size<=100000){
					move_uploaded_file($source, $folder.$nama);
					$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses','$aduan')");

		 			if($query){
			 			echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
			 			echo "<script>location='index.php';</script>";
		 			}

		 		}
		 		else{
		 			echo "<script>alert('Akuran Gambar Tidak Lebih Dari 100KB')</script>";
		 		}
		 	}
		 	else{
		 		echo "<script>alert('Format File Tidak Di Dukung')</script>";
		 	}
		}
		else{
			$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses', '$aduan')");
			if($query){
			 	echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
	 			echo "<script>location='index.php';</script>";
 			}
		}

	 }

 ?>