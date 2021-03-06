<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/adminstyle/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>vendor/adminstyle/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>vendor/adminstyle/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fa  fa-stethoscope fs-2"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LungsCare</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>welcome/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit Menu:</h6>
                        <a class="collapse-item" href="<?= base_url() ?>welcome/pertanyaandiagnosis">Pertanyaan Diagnosis</a>
                        <a class="collapse-item active" href="#">Pertanyaan FAQ</a>
                        <a class="collapse-item" href="<?= base_url() ?>welcome/penyakit">Penyakit</a>
                        <a class="collapse-item" href="<?= base_url() ?>welcome/akun">Akun</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Laporan
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>welcome/datapasien">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Pemeriksa </span></a>
            </li> -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <div class="nav-item mt-3" style="margin-left:500px;">
                        <h1 class="h2 text-gray-800"></h1>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pertanyaan FAQ</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pertanyaan</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($pertanyaan as $tanya) : ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>

                                                            <td><?php echo $tanya['pertanyaan']; ?></td>
                                                            <td>
                                                                <a onclick="javascript:return confirm('Anda yakin ingin menghapus data?')" href="<?= base_url(); ?>/Welcome/hapusFaq/<?php echo $tanya['id']; ?>" type="submit" style="height: 30px; width:35px; margin-top:3px;">
                                                                    <img src="<?= base_url('vendor/'); ?>/starter/assets/trash.svg">
                                                                </a>
                                                                <a href="<?= base_url('welcome') ?>/editfaq/<?php echo $tanya['id']; ?>" type="submit" style="height: 25px;width:27px; margin-top:2px; margin-left:20px;">
                                                                    <img src="<?= base_url('vendor/'); ?>/starter/assets/edit.svg">
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
                                            <br>
                                            <br>

                                            <a class="btn btn-info col-sm-3 float-right" style="margin-right: 0px;" href="<?= base_url('Welcome/tambahfaq') ?>">Tambah FAQ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white" style="margin-top: 40px;">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; LungsCare By: Abrar Dewa Pratama Barus 118140145</span>
                            </div>
                            <br>
                            <div class="copyright text-center my-auto">
                                <span>Tugas Akhir Teknik Informatika</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url() ?>welcome/login">Logout</a>
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

            <!-- Page level plugins -->
            <script src="<?= base_url() ?>vendor/adminstyle/vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= base_url() ?>vendor/adminstyle/js/demo/chart-area-demo.js"></script>
            <script src="<?= base_url() ?>vendor/adminstyle/js/demo/chart-pie-demo.js"></script>
            <script src="<?= base_url() ?>vendor/adminstyle/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>vendor/adminstyle/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?= base_url() ?>vendor/adminstyle/js/demo/datatables-demo.js"></script>


</body>

</html>