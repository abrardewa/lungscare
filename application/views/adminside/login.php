<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login LungsCare</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>vendor/adminstyle/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="" style="background: linear-gradient(
            to bottom,
            rgba(154, 190, 236, 0.8) 5%,
            rgba(66, 126, 196, 0.8) 100%
        ),
        url(<?= base_url() ?>/vendor/starter/assets/img/dokter.jpeg);">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 125px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5" style="height: 450px;">
                                    <div class="text-center mt-5">
                                        <h1 class="h4 text-gray-900 mb-4">LungsCare</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form method="POST" action="<?= base_url('welcome/login'); ?>">
                                        <a style="text-align:left; font-family:Roboto Slab; color:black"> Username</a>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="abrar" value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <a style="text-align:left; font-family:Roboto Slab; color:black"> Password</a>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="********">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <button type="submmit" class="btn btn-primary btn-user btn-block" style="font-family:Roboto Slab;">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>vendor/adminstyle/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/adminstyle/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>vendor/adminstyle/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>vendor/adminstyle/js/sb-admin-2.min.js"></script>

</body>

</html>