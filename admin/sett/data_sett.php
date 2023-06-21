<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pengumuman</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-sett" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Pengumuman</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>halaman_judul</th>
						<th>deskripsi_judul</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $sql = $koneksi->query("select * from tb_setting");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['halaman_judul']; ?>
						</td>
						<td>
							<?php echo $data['deskripsi_judul']; ?>
						</td>
							<a href="?page=edit_sett=<?php echo $data['id_sett']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del_sett&kode=<?php echo $data['id_sett']; ?>" onclick="return confirm('Apakah anda yakin hapus Pengumuman ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->