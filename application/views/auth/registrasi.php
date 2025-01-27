<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="col-lg-9 mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                                    <?= $this->session->flashdata('pesan') ?>
                                </div>
                                <form class="user" action="<?= base_url('auth/registrasi') ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Anda" value="<?= set_value('nama') ?>">
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            <small class="text-danger"><?= form_error('password') ?></small>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="konfirmasi_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                                            <small class="text-danger"><?= form_error('konfirmasi_password') ?></small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Registrasi Akun</button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth') ?>">Anda sudah punya akun silahkan login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>