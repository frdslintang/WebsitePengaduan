        <div class="row">
          <div class="col s12 m9">
            <h3 style="color: #283593; font-weight: 600;">Pengaduan</h3>
          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tanggal Masuk</th>
				<th>Jenis Aduan</th>
				<th>Status</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan
		INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik
		INNER JOIN jenis_aduan ON pengaduan.id_aduan = jenis_aduan.id_aduan
		ORDER BY pengaduan.id_pengaduan DESC
		");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['nama_aduan']; ?></td>
			<td><?php echo $r['status']; ?></td>
			<td><a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>
		</tr>
            <?php  }
             ?>
          </tbody>
        </table>        
