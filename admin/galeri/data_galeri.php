<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Anggota</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add_anggota" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Anggota</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Npm</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from tbl_anggota");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['kelas']; ?></td>
                            <td><?php echo $data['npm']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <?php if (!empty($data['foto'])) : ?>
                                    <img src="uploads/<?php echo $data['foto']; ?>" alt="Foto Anggota" width="100">

                                <?php else : ?>
                                    <span>Tidak Ada Foto</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?page=edit_anggota&kode=<?php echo $data['id_anggota']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del_anggota&kode=<?php echo $data['id_anggota']; ?>" onclick="return confirm('Apakah anda yakin hapus Pengumuman ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
</div>
