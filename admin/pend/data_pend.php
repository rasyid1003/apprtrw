<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penduduk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pend" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
				<a href="" class="btn btn-warning" onclick="printTable()">
					<i class="fa fa-print"></i> Print Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>JK</th>
						<th>Alamat</th>
						<th>No KK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala from 
						tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
						left join tb_kk k on a.id_kk=k.id_kk where status='Ada'");
					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['jekel']; ?></td>
							<td><?php echo $data['desa']; ?> RT <?php echo $data['rt']; ?>/ RW <?php echo $data['rw']; ?>.</td>
							<td><?php echo $data['no_kk']; ?>-<?php echo $data['kepala']; ?></td>
							<td>
								<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-user"></i>
								</a>
								<a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php 
// Mendapatkan daftar printer yang terdeteksi
$printerList = shell_exec("lpstat -p -d");

// Memproses output untuk mendapatkan daftar printer
$printerLines = explode("\n", trim($printerList));
$printers = array();
foreach ($printerLines as $line) {
    if (strpos($line, "printer") !== false) {
        $printerName = explode(" ", $line)[1];
        $printers[] = $printerName;
    }
}

// Menampilkan daftar printer yang terdeteksi
echo "Daftar Printer Terdeteksi:<br>";
foreach ($printers as $printer) {
    echo $printer . "<br>";
}

// Memilih printer pertama sebagai printer default
if (!empty($printers)) {
    $selectedPrinter = $printers[0];
    shell_exec("lpoptions -d " . $selectedPrinter);
    echo "Printer berhasil diatur: " . $selectedPrinter;
} else {
    echo "Tidak ada printer yang terdeteksi";
}

?>

<script>
	function printTable() {
    var tableContents = document.getElementById("example1").cloneNode(true);
    var tableRows = tableContents.getElementsByTagName("tr");
    
    // Menghapus kolom Aksi
    for (var i = 0; i < tableRows.length; i++) {
        var tableCells = tableRows[i].getElementsByTagName("td");
        if (tableCells.length > 6) {
            tableRows[i].removeChild(tableCells[tableCells.length - 1]);
        }
    }
    
    var printWindow = window.open('', '', 'height=500,width=800');
    printWindow.document.write('<html><head><title>Data Penduduk</title>');
    printWindow.document.write('<style>table{border-collapse: collapse;}th, td{border: 1px solid black;padding: 5px;}</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h1>Data Penduduk</h1>');
    printWindow.document.write(tableContents.outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}


</script>
