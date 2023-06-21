<?php
// Buat koneksi ke database
include "inc/koneksi.php";

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tbl_anggota WHERE id_anggota='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

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

        // Hapus foto sebelumnya jika ada perubahan foto
        $foto_sebelumnya = $data_cek['foto'];
        if (!empty($foto_sebelumnya)) {
            // Hapus file foto sebelumnya
            unlink($foto_sebelumnya);
        }

        // Pindahkan file gambar ke lokasi yang diinginkan
        move_uploaded_file($tmpFoto, $fotoPath);
    } else {
        // Jika tidak ada file gambar diunggah, gunakan foto yang sebelumnya
        $foto = $data_cek['foto'];
    }

    // Query untuk menyimpan data ke database
    $sql_simpan = "UPDATE tbl_anggota SET 
        nama='$nama',
        kelas='$kelas',
        npm='$npm',
        email='$email',
        foto='$foto'
        WHERE id_anggota='" . $_GET['kode'] . "'";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Ubah Anggota Berhasil',
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
                title: 'Ubah Anggota Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=edit_anggota&kode=" . $_GET['kode'] . "';
                }
            });
        </script>";
    }
}

?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Anggota</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $data_cek['kelas']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Npm</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="npm" name="npm" value="<?php echo $data_cek['npm']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Sebelumnya</label>
                <div class="col-sm-6">
                    <?php if (!empty($data_cek['foto'])) : ?>
                        <img src="uploads/<?php echo $data_cek['foto']; ?>"  width="150">
                    <?php else : ?>
                        <span>Tidak Ada Foto Sebelumnya</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data_anggota" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
