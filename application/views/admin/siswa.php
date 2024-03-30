<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa</h1>
    <?= $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            <a href="<?= base_url('admin/tambahsiswa') ?>" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Tambah Siswa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama </th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $s) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s['nis']  ?></td>
                                <td><?= $s['nama_siswa']  ?></td>
                                <td><?= $s['jenis_kelamin']  ?></td>
                                <td><?= $s['alamat']  ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editsiswa/' . $s['id_siswa']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $s['id_siswa'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?= $s['id_siswa'] ?>">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


<?php foreach ($siswa as $s) : ?>
    <!-- Modal -->
    <div class="modal fade" id="detail<?= $s['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?= base_url('assets/img/siswa/' . $s['foto']) ?>" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <table class="table">
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td><?= $s['nis'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>:</td>
                                    <td><?= $s['nama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $s['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $s['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?= $s['nama_kelas'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td><?= $s['nama_jurusan'] ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($siswa as $s) : ?>
<div class="modal fade" id="hapus<?= $s['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/hapussiswa/' . $s['id_siswa']) ?>" method="post">
                <div class="modal-body">
                    Apakah anda ingin hapus data guru <b><?= $s['nama_siswa'] ?></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach ?>