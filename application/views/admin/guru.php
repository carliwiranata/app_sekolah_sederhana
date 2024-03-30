<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Guru</h1>
    <?= $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            <a href="<?= base_url('admin/tambahguru') ?>" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Tambah Guru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($guru as $g) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $g['nama_guru'] ?></td>
                                <td><?= $g['jenis_kelamin']  ?></td>
                                <td><?= $g['alamat']  ?></td>
                                <td><?= $g['mapel']  ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editguru/' . $g['id_guru']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $g['id_guru'] ?>">
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




















<?php foreach ($guru as $g) : ?>
    <!-- Modal -->
    <div class="modal fade" id="hapus<?= $g['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapusguru/' . $g['id_guru']) ?>" method="post">
                    <div class="modal-body">
                        Apakah anda ingin hapus data guru <b><?= $g['nama_guru'] ?></b> ?
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