<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Anggota</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Anggota</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anggota" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Npm</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="npm" name="npm" placeholder="Npm" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=add_pengu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Mulai proses simpan data
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];

    // Periksa apakah file gambar diunggah dengan benar
    if ($_FILES['foto']['error'] === 0) {
        $foto = $_FILES['foto']['name'];
        $tmpFoto = $_FILES['foto']['tmp_name'];
        $fotoPath = 'uploads/' . $foto;

        // Pindahkan file gambar ke lokasi yang diinginkan
        move_uploaded_file($tmpFoto, $fotoPath);
    } else {
        // Jika tidak ada file gambar diunggah, berikan nilai default atau tangani kesalahan sesuai kebutuhan Anda
        $foto = ''; // Nilai default atau sesuaikan dengan nama file yang ada
    }

    // Query untuk menyimpan data ke database
    $sql_simpan = "INSERT INTO tbl_anggota (nama, kelas, npm, email, foto) VALUES (
        '$nama',
        '$kelas',
        '$npm',
        '$email',
        '$foto'
    )";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Tambah Anggota Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data_anggota';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Anggota Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add_anggota';
                }
            });
        </script>";
    }
}
// Selesai proses simpan data
?>
