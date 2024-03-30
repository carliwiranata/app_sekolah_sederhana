<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jurusan</h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahjurusan') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama jurusan</label>
                            <input value="<?= set_value('nama_jurusan') ?>" type="text" name="nama_jurusan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="text-danger"><?= form_error('nama_jurusan') ?></small>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->