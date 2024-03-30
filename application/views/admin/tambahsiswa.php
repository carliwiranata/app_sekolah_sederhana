<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa</h1>
    <?= $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahsiswa') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto</label>
                            <input required type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="">Nis</label>
                            <input type="number" class="form-control" name="nis" value="<?= set_value('nis') ?>">
                            <small class="text-danger"><?= form_error('nis') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" value="<?= set_value('nama_siswa') ?>">
                            <small class="text-danger"><?= form_error('nama_siswa') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= set_value('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= set_value('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kelas</label>
                            <select name="id_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $k) : ?>
                                    <option value="<?= $k['id_kelas'] ?>" <?= set_value('id_kelas') == $k['id_kelas'] ? 'selected' : '' ?>><?= $k['nama_kelas'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_kelas') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jurusan</label>
                            <select name="id_jurusan" class="form-control">
                                <option value="">Pilih Jurusan</option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option value="<?= $j['id_jurusan'] ?>" <?= set_value('id_jurusan') == $j['id_jurusan'] ? 'selected' : '' ?>><?= $j['nama_jurusan'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_jurusan') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control"><?= set_value('alamat')  ?></textarea>
                            <small class="text-danger"><?= form_error('alamat') ?></small>
                        </div>

                        <button class="btn btn-primary float-right" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->