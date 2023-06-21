<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_setting WHERE id=1";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Pengumuman Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data_sett';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Pengumuman Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data_sett';
                    }
                })</script>";
            }
        }

