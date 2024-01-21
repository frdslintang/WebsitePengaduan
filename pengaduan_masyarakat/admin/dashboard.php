
<head>
	<link rel="stylesheet" href="../css/d-admin.css">
</head>
<h3>Dahsboard ADMAS</h3>

	<div class="row">
		<div class="col s12 m4">
		  <div class="card red">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title">Laporan Masuk<b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>	

		<div class="col s12 m4">
		<div class="card teal">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='selesai'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title">Laporan Selesai <b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>
	</div>
	<div class="row">
		<form action="" method="POST">
			<div class="col s12">
			<table class="display responsive-table" style="width:100%;">
			<thead>
    			<tr>
      			<th>ID</th>
      			<th>Nama Aduan</th>
      			<th>Tindakan</th>
    			</tr>
  			</thead>
  			<tbody>
    		<?php
			require_once '../conn/koneksi.php';
			// Periksa apakah tombol "Hapus" diklik
			if (isset($_POST['hapus'])) {
    		$jenisAduanID = $_POST['hapus'];

    		// Hapus data dari tabel 'jenis_aduan'
    		$sql = "DELETE FROM jenis_aduan WHERE id_aduan = '$jenisAduanID'";
    		if ($koneksi->query($sql)) {
        		echo "Data berhasil dihapus";
    		} else {
        		echo "Terjadi kesalahan saat menghapus data: " . $koneksi->error;
    		}
			}
    		// Ambil data dari tabel 'jenis_aduan'
    		$sql = ("SELECT * FROM jenis_aduan");
			$result = mysqli_query($koneksi, $sql);
    		// Tampilkan data dalam tabel
    		if (mysqli_num_rows($result) > 0) {
        		while ($row = mysqli_fetch_assoc($result)) {
            		echo "<tr>";
            		echo "<td>" . $row['id_aduan'] . "</td>";
            		echo "<td>" . $row['nama_aduan'] . "</td>";
            		echo "<td><button class='btn red' type='submit' name='hapus' value='" . $row['id_aduan'] . "'>Hapus</button></td>";
            		echo "</tr>";
        	}
    		} else {
        		echo "<tr><td colspan='3'>Tidak ada data tersedia</td></tr>";
    		}
    		?>
  			</tbody>
			</table>
		</div>
		</form>
	</div>
	<?php
if (isset($_POST['addItem'])) {
    $newItem = $_POST['newItem'];
    // Simpan item baru ke database (misalnya ke tabel 'jenis_aduan')
    $sql = "INSERT INTO jenis_aduan (nama_aduan) VALUES ('$newItem')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "<script>alert('Item berhasil ditambahkan!')</script>";
    } else {
        echo "<script>alert('Gagal menambahkan item!')</script>";
    }
}

// Ambil daftar item dari database (misalnya dari tabel 'jenis_aduan')
$sql = "SELECT nama_aduan FROM jenis_aduan";
$result = mysqli_query($koneksi, $sql);
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['nama_aduan'] . "'>" . $row['nama_aduan'] . "</option>";
}
?>
<div class="row">
	<div class="col s6 m4">
		<form action="" method="POST">
    		<input type="text" name="newItem" placeholder="Tambah aduan baru">
    		<button class="btn btn-primary" type="submit" name="addItem">Tambah</button>
		</form>
	</div>
</div>



