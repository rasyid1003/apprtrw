<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Setting</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">halaman_judul</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="halaman_judul" name="halaman_judul" placeholder="halaman_judul" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">deskripsi_judul Judul</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="deskripsi_judul" name="deskripsi_judul" placeholder="deskripsi_judul" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=add_sett" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Mulai proses simpan data
    $halaman_judul = $_POST['halaman_judul'];
    $deskripsi_judul = $_POST['deskripsi_judul'];

    $sql_simpan = "INSERT INTO tb_setting (halaman_judul, deskripsi_judul) VALUES ('$halaman_judul', '$deskripsi_judul')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
        Swal.fire({title: 'Tambah Pengumuman Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_sett';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Tambah Pengumuman Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add_sett';
            }
        })</script>";
    }
}
?>
