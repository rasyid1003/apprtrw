<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
						<?php
				// ambil data dari database
				$query = "select * from tb_pdd where status='Ada'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>
			


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-3">
					<select name="hari" id="hari" class="form-control">
						<option>- Pilih -</option>
						<option>SENIN</option>
						<option>SELASA</option>
						<option>RABU</option>
						<option>KAMIS</option>
						<option>JUMAT</option>
						<option>SABTU</option>
						<option>MINGGU</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jadwaljaga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jaga" name="jaga" placeholder="jaga " required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">rt</label>
				<div class="col-sm-6">
					<select name="rt" id="rt" class="form-control select2bs4" required>
						<option selected="selected">- rt -</option>
						<?php
				// ambil data dari database
				$query = "select * from tb_pdd";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['rt'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-siskam" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_siskam (id_pdd, hari, jaga,rt) VALUES (
			'".$_POST['id_pdd']."',
            '".$_POST['hari']."',
			'".$_POST['jaga']."',
            '".$_POST['rt']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-siskam';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-siskam';
          }
      })</script>";
    }}
     //selesai proses simpan data
