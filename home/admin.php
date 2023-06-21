<?php

  $sql = $koneksi->query("SELECT COUNT(id_pend) as pend  from tb_pdd where status='Ada'");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['pend'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
  while ($data= $sql->fetch_assoc()) {
    $kartu=$data['kartu'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='LK'");
  while ($data= $sql->fetch_assoc()) {
    $laki=$data['laki'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='PR'");
  while ($data= $sql->fetch_assoc()) {
    $prem=$data['prem'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_lahir) as lahir from tb_lahir");
  while ($data= $sql->fetch_assoc()) {
    $lahir=$data['lahir'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_mendu) as mendu  from tb_mendu");
  while ($data= $sql->fetch_assoc()) {
    $mendu=$data['mendu'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_datang) as datang  from tb_datang");
  while ($data= $sql->fetch_assoc()) {
    $datang=$data['datang'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
  while ($data= $sql->fetch_assoc()) {
    $pindah=$data['pindah'];
  }

?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Penduduk</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $kartu;  ?>
				</h3>

				<p>Kartu Keluarga</p>
			</div>
			<div class="icon">
				<i class="ion ion-card"></i>
			</div>
			<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>Laki-laki</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>Perempuan</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $lahir;  ?>
				</h3>

				<p>Lahir</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $mendu;  ?>
				</h3>

				<p>Meninggal</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-sad"></i>
			</div>
			<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $datang;  ?>
				</h3>

				<p>Pendatang</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-download"></i>
			</div>
			<a href="index.php?page=data-datang" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $pindah;  ?>
				</h3>

				<p>Pindah</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-upload"></i>
			</div>
			<a href="index.php?page=data-pindah" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	

</div>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table text-"></i> Jadwal siskam</h3>
			<a href="" class="btn btn-warning" onclick="printTable()">
					<i class="fa fa-print" ></i> Print Jadwal </a>
	</div>
	<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			
			<th>Hari</th>
			<th>Nama</th>
			<th>Jaga</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, d.hari, d.jaga, d.id_siskam 
								FROM tb_siskam d 
								INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd 
								ORDER BY d.hari"); // Mengurutkan data berdasarkan kolom "Hari"
		while ($data = $sql->fetch_assoc()) {
		?>
			<tr>
				
				<td><b><?php echo $data['hari']; ?></b></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jaga']; ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
	<tfoot>
		
	</tfoot>
</table>
<script>
	function printTable() {
		var printContents = document.getElementById("example1").outerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>
