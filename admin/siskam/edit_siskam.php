<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.nama, d.id_siskam, d.hari, d.jaga FROM 
		tb_siskam d join tb_pdd p on d.id_pdd=p.id_pend WHERE id_siskam='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_siskam" name="id_siskam" value="<?php echo $data_cek['id_siskam']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					 readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelain</label>
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
				<label class="col-sm-2 col-form-label">jaga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jaga" name="jaga" value="<?php echo $data_cek['jaga']; ?>"
					 required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">rt</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
					 required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-siskam" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_siskam SET 
		hari='".$_POST['hari']."',
		jaga='".$_POST['jaga']."',
		rt='".$_POST['rt']."',
		WHERE id_siskam='".$_POST['id_siskam']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-siskam';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-siskam';
        }
      })</script>";
    }}
