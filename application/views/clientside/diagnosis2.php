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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Penyakit</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    // $sum = 0;
                    // for ($i = 1; $i < count($penyakit); $i++) {
                    //     # code...
                    //     if ($penyakit[$i - 1] != $penyakit[$i]) {
                    //         $sum++;
                    //     }
                    // }
                    echo $sum;
                    ?>

                </tbody>

            </table>

        </div>
    </div>
    <!-- <?php
            $sum = 0;
            foreach ($penyakit as $pen) : ?>
        <label for="pertanyaan" class="form-label"><?php echo $pen++; ?>.</label>
    <?php endforeach; ?> -->
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