<?php
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "<script>
			Swal.fire({
				title: 'Database Berhasil Di Hapus',
				text: '',
				icon: 'success',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=view-backup';
				}
			});
		</script>";
    } else {
        echo "File tidak ditemukan.";
    }
}
?>
