<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ganti Password</h1>
    <?= $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/gantipassword') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="text-danger"><?= form_error('password') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="text-danger"><?= form_error('konfirmasi_password') ?></small>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->