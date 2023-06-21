<?php
include "inc/koneksi.php";

$host = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "data_penduduk"; // Ganti dengan nama database Anda
$outputFile = "backupdatabase/sql_dump_" . date("Y-m-d_H-i-s") . ".sql";
echo $outputFile; // Ganti dengan path ke file SQL dump yang ingin Anda simpan

exportDatabase($host, $username, $password, $database, $outputFile);
?>

<?php
function exportDatabase($host, $username, $password, $database, $outputFile)
{
    // Membuat koneksi ke server MySQL
    $conn = mysqli_connect($host, $username, $password);
    
    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    
    // Memilih database yang akan digunakan
    $selectDb = mysqli_select_db($conn, $database);
    
    // Memeriksa pemilihan database
    if (!$selectDb) {
        die("Gagal memilih database: " . mysqli_error($conn));
    }
    
    // Mendapatkan daftar tabel dalam database
    $tables = array();
    $result = mysqli_query($conn, "SHOW TABLES");
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    
    // Menginisialisasi variabel untuk menyimpan hasil eksport
    $sqlDump = "";
    
    // Loop melalui setiap tabel untuk mendapatkan data
    foreach ($tables as $table) {
        // Mendapatkan struktur tabel
        $result = mysqli_query($conn, "SHOW CREATE TABLE $table");
        $row = mysqli_fetch_row($result);
        $sqlDump .= $row[1] . ";\n\n";
        
        // Mendapatkan data dalam tabel
        $result = mysqli_query($conn, "SELECT * FROM $table");
        while ($row = mysqli_fetch_assoc($result)) {
            $columnNames = implode(", ", array_keys($row));
            $columnValues = implode("', '", array_values($row));
            $sqlDump .= "INSERT INTO $table ($columnNames) VALUES ('$columnValues');\n";
        }
        
        $sqlDump .= "\n";
    }
    
    // Menulis hasil eksport ke file
    file_put_contents($outputFile, $sqlDump);
    
    // Menutup koneksi
    mysqli_close($conn);
    
    echo "<script>
			Swal.fire({
				title: 'Eksport Database Berhasil. $outputFile',
				text: '',
				icon: 'success',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=view-backup';
				}
			});
		</script>";
}
?>
