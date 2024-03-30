<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Guru</h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Guru</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/editguru/' . $guru['id_guru']) ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Guru</label>
                            <input value="<?= $guru['nama_guru'] ?>" type="text" name="nama_guru" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="text-danger"><?= form_error('nama_guru') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= $guru['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $guru['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control"><?= $guru['alamat']  ?></textarea>
                            <small class="text-danger"><?= form_error('alamat') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mata Pelajaran</label>
                            <input type="text" name="mapel" value="<?= $guru['mapel'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="text-danger"><?= form_error('mapel') ?></small>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->