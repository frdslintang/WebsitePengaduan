        <div class="row">
          <div class="col s12 m9">
            <h3 style="color: #283593; font-weight: 600;">User</h3>
          </div>  
          <div class="col s12 m3">
            <div class="section"></div>
            <a class="waves-effect waves-light btn modal-trigger blue" href="tambahUser.php"><i class="material-icons">add</i></a>
          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Telephone</th>
				<th>level</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
		  <?php 
			$no = 1;
			$tampil = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY nama_petugas ASC");
			while ($r = mysqli_fetch_assoc($tampil)) {
			?>
    			<tr>
        			<td><?php echo $no++; ?></td>
        			<td><?php echo $r['nama_petugas']; ?></td>
        			<td><?php echo $r['username']; ?></td>
        			<td><?php echo $r['telp_petugas']; ?></td>
        			<td><?php echo $r['level']; ?></td>
        			<td>
            			<a class="btn teal modal-trigger" href="editUser.php?id_petugas=<?php echo $r['id_petugas']; ?>">Edit</a>
            			<a class="red btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=user_hapus&id_petugas=<?php echo $r['id_petugas']; ?>">Hapus</a>
        			</td>
    			</tr>
			<?php  
			}
			?>
        </tbody>
        </table>        
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>