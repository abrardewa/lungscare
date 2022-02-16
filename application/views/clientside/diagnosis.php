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
                                        <h2 class="mt-0">Ayo Cek Kesehatan Kamu!</h2>
                                        <hr class="divider" />
                                        <p class="text mb-5">Untuk mengecek kesehatan kamu isilah form di bawah sesuai dengan apa yang kamu rasakan.</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-xl-9 shadow p-3 mb-5  border" style="background-color: white;">
                                        <div class="col-xl p-3 ">
                                            <form action="<?= base_url('Welcome/diagnosis'); ?>" method="post">
                                                <div class="mb-3 mt-3">
                                                    <label for="nama" class="form-label">1.</label>
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control rounded-pill" id="nama" name="nama" placeholder="Masukkan nama lengkap anda..." value="<?= set_value('nama'); ?>">
                                                </div>
                                                <div class=" mb-3">
                                                    <label for="alamat" class="form-label">2.</label>
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" placeholder="Masukkan alamat anda..." value="<?= set_value('alamat'); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bb" class="form-label">3.</label>
                                                    <label for="bb" class="form-label">Besar Penurunan Berat Badan (Isi 0 Jika tidak ada penurunan berat badan)</label>
                                                    <input type="text" class="form-control rounded-pill" id="bb" name="bb" placeholder="Masukkan besar penurunan berat badan anda... (Kg)" value="<?= set_value('bb'); ?>">
                                                </div>
                                                <?php
                                                $no = 4;
                                                $id = 0;
                                                foreach ($pertanyaan as $tanya) : ?>
                                                    <div class="mb-3">
                                                        <label for="pertanyaan" class="form-label"><?php echo $no++; ?>.</label>
                                                        <label for="pertanyaan" class="form-label"><?= $tanya['pertanyaan']; ?></label>
                                                        <input type="hidden" name="gejala<?= $id; ?>" id="gejala<?= $id; ?>" value="<?= $tanya['gejala']; ?> ">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="jawaban">
                                                                <input class="form-check-input" type="radio" name="jawaban<?= $id; ?>" id="jawaban<?= $id; ?>" value="0.9">
                                                                Sangat / Sering
                                                            </label>
                                                        </div>
                                                        <div class="form-check" value="<?= set_value('jawaban'); ?>">
                                                            <label class="form-check-label" for="jawaban">
                                                                <input class="form-check-input" type="radio" name="jawaban<?= $id; ?>" id="jawaban<?= $id; ?>" value="0.6">
                                                                Ya / Cukup Sering
                                                            </label>
                                                        </div>
                                                        <div class="form-check" value="<?= set_value('jawaban'); ?>">
                                                            <label class="form-check-label" for="jawaban">
                                                                <input class="form-check-input" type="radio" name="jawaban<?= $id; ?>" id="jawaban<?= $id; ?>" value="0.3">
                                                                Sedikit / Jarang
                                                            </label>
                                                        </div>
                                                        <div class="form-check" value="<?= set_value('jawaban'); ?>">
                                                            <label class="form-check-label" for="jawaban">
                                                                <input class="form-check-input" type="radio" name="jawaban<?= $id; ?>" id="jawaban<?= $id; ?>" value="0">
                                                                Tidak / Tidak Pernah
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <label hidden><?= $id++; ?></label>
                                                <?php endforeach; ?>
                                                <div class="form-group">
                                                    <br>
                                                    <button type="submit" class="btn btn-info col-sm-2 ">Submit</button>
                                                </div>
                                            </form>
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