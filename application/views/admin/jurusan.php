<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jurusan</h1>
    <?= $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
            <a href="<?= base_url('admin/tambahjurusan') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah jurusan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jurusan as $j) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $j['nama_jurusan'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editjurusan/' . $j['id_jurusan']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $j['id_jurusan'] ?>">
                                        <i class="fas fa-trash"></i>
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




















<?php foreach ($jurusan as $j) : ?>
    <!-- Modal -->
    <div class="modal fade" id="hapus<?= $j['id_jurusan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapusjurusan/' . $j['id_jurusan']) ?>" method="post">
                    <div class="modal-body">
                        Apakah anda ingin hapus data jurusan <b><?= $j['nama_jurusan'] ?></b> ?
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