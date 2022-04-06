<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lungs Care</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="starter/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url() ?>vendor/starter/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: #55BFD8;" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" style="color: #132863;" href="/"><i class="fa  fa-stethoscope fs-2 " style="color: #132863;"></i>LungsCare</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link " href="<?= base_url('welcome') ?>">Home</a></li>
                    <li class=" nav-item"><a class="nav-link active" style="border-bottom: 3px solid ;" href="#">Diagnosis</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('welcome') ?>/faq" ">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <div>
        <section class=" page-section" id="contact">
                            <div class="container">
                                <div class="row gx-4 gx-lg-5 justify-content-center" style="color: #072D5B;">
                                    <div class="col-lg-8 col-xl-6 text-center">
                                        <h2 class="mt-0">Hasil Diagnosa Kamu</h2>
                                        <hr class="divider" />
                                        <p class="text mb-5">Hasil diagnosa ini merupakan perkiraan yang dilakukan oleh sistem LungsCare.</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-xl-7 shadow p-3 mb-5  border" style="background-color: white;">

                                        <div class="col-xl p-3 ">
                                            <div class="row align-items-start">
                                                <div class="col-3 ">
                                                    Nama
                                                </div>
                                                <div class="col-1 text-end">
                                                    :
                                                </div>
                                                <div class="col">
                                                    <?= $nama ?>
                                                </div>
                                            </div>
                                            <div class="row align-items-start pt-3">
                                                <div class="col-3 ">
                                                    Alamat
                                                </div>
                                                <div class="col-1 text-end">
                                                    :
                                                </div>
                                                <div class="col">
                                                    <?= $alamat ?>
                                                </div>
                                            </div>
                                            <div class="row align-items-start pt-3">
                                                <div class="col-3 ">
                                                    Hasil Diagnosa Sistem
                                                </div>
                                                <div class="col-1 text-end">
                                                    :
                                                </div>
                                                <div class="col-5">
                                                    <?php for ($i = 0; $i < count($hasil); $i++) {
                                                        for ($j = 0; $j < count($hasil[$i]); $j++) {
                                                            print($hasil[$i][$j] . ",");
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row align-items-start pt-3">
                                                <div class="col-3 ">
                                                    Persentase Diagnosa Sistem
                                                </div>
                                                <div class="col-1 text-end">
                                                    :
                                                </div>
                                                <div class="col">

                                                    <?php for ($i = 0; $i < count($persentase); $i++) {
                                                        for ($j = 0; $j < count($persentase[$i]); $j++) {
                                                            print(number_format($persentase[$i][$j] * 100, 2, '.', ',') . "%");
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <!-- <div class="row align-items-start pt-3">
                                <div class="col-3 ">
                                    Waktu Eksekusi
                                </div>
                                <div class="col-1 text-end">
                                    :
                                </div>
                                <div class="col">

                                    <?php
                                    print(number_format($waktu, 6, '.', ',') . "ms");
                                    ?>
                                </div>
                            </div> -->
                                            <div class="row align-items-start pt-3">
                                                <div class="col-3 ">
                                                    Tindakan
                                                </div>
                                                <div class="col-1 text-end">
                                                    :
                                                </div>
                                                <div class="col">
                                                    Sebaiknya anda melakukan pemeriksaan lebih lanjut ke dokter spesialis paru
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </section>
            </div>
            <!-- Footer-->
            <footer class=" bg-dark py-5">
                <div class="container px-4 px-lg-5">
                    <div class="small text-center" style="color: whitesmoke;">Copyright &copy; 2021 - Abrar Dewa Pratama Barus</div>
                </div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- SimpleLightbox plugin JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
            <!-- Core theme JS-->
            <script src="<?= base_url() ?>vendor/starter/js/scripts.js"></script>

            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            <script src="https://use.fontawesome.com/d843ff72fd.js"></script>
</body>

</html>