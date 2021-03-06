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
    <link href="<?= base_url() ?>/vendor/starter/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: #55BFD8;" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" style="color: #132863;" href="/"><i class="fa  fa-stethoscope fs-2 " style="color: #132863;"></i>LungsCare</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link " href="<?= base_url('welcome') ?>" ">Home</a></li>
                    <li class=" nav-item"><a class="nav-link" href="<?= base_url('welcome') ?>/diagnosis">Diagnosis</a></li>
                    <li class="nav-item"><a class="nav-link active" style="border-bottom: 3px solid ;" href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->

    <div>
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center" style="color: #072D5B;">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">FAQ Penyakit Paru</h2>
                        <hr class="divider" />
                        <p class="text mb-5">Berisi tentang pertanyaan-pertanyaan seputar penyakit paru-paru</p>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-xl shadow p-3 mb-5  border" style="background-color: white;">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <?php
                                $no = 1;
                                foreach ($faq as $key => $f) : ?>
                                    <h3 class="accordion-header" id="panelsStayOpen-headingOne<?= $f['id']; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne<?= $f['id']; ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne<?= $f['id']; ?>">
                                            <?php echo $no++ . ". "; ?>
                                            <?php echo $f['pertanyaan']; ?>
                                        </button>
                                    </h3>
                                    <div id="panelsStayOpen-collapseOne<?= $f['id']; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne<?= $f['id']; ?>">
                                        <div class="accordion-body">
                                            <?php echo $f['jawaban'] ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
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