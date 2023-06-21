<?php
if(isset($_GET['kode'])){
    // Mengambil data foto yang akan dihapus
    $sql_foto = "SELECT foto FROM tbl_anggota WHERE id_anggota='".$_GET['kode']."'";
    $query_foto = mysqli_query($koneksi, $sql_foto);
    $data_foto = mysqli_fetch_assoc($query_foto);
    $foto = $data_foto['foto'];

    // Menghapus foto dari direktori
    if(!empty($foto)){
        $path = "uploads/" . $foto;
        if(file_exists($path)){
            unlink($path);
        }
    }

    // Menghapus data anggota dari database
    $sql_hapus = "DELETE FROM tbl_anggota WHERE id_anggota='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Pengumuman Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_anggota';
            }
        })</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Hapus Pengumuman Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_anggota';
            }
        })</script>";
    }
}
