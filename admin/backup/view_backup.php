<!DOCTYPE html>
<html>
<head>
    <title>Backup Database</title>
</head>
<body>
    <h2>Backup Database</h2>
    <ul>
        <li class="btn btn-success "><a href="index.php?page=add-backup">Backup Database</a></li>
    </ul>

    <table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Bulan</th>
						<th>NO KK</th>
						<th>Nama</th>
						<th>keterangan</th>
						<th>Biaya Detail</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
</body>
</html>
<?php
function lihatDanHapusFileDiFolder($folderPath) {
    // Mengecek apakah folder valid
    if (!is_dir($folderPath)) {
        echo "Folder tidak valid.";
        return;
    }

    // Mendapatkan daftar file dalam folder
    $files = scandir($folderPath);

    // Menampilkan daftar file
    echo "Daftar file dalam folder $folderPath:<br>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $folderPath . '/' . $file;
            echo "<tr>$file <a href=\"$filePath\" download>Download</a> <a href=\"index.php?page=del-backup&file=$filePath\">Hapus</a><br></tr>";
        }
    }
}

// Contoh penggunaan fungsi
$folder = "backupdatabase"; // Ganti dengan path ke folder yang diinginkan
lihatDanHapusFileDiFolder($folder);

?>
