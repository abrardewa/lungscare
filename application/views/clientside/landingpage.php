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
	<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
		<div class="container px-4 px-lg-5">
			<a class="navbar-brand" style="color: #132863;" href="#page-top"><i class="fa  fa-stethoscope fs-2 " style="color: #132863;"></i> LungsCare</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto my-2 my-lg-0">
					<li class="nav-item"><a class="nav-link active " style="border-bottom: 3px solid ;" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="#Diagnosis">Diagnosis</a></li>
					<li class="nav-item"><a class="nav-link" href="#FAQ">FAQ</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->

	<div>
		<header class="masthead">
			<div class="container px-4 px-lg-5 h-100">
				<div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
					<div class="col-lg-8 align-self-end">
						<h1 class="text-white font-weight-bold">Lindungi Paru-Paru Kamu</h1>
						<hr class="divider" />
					</div>
					<div class="col-lg-8 align-self-baseline">
						<p class="text-white-75 mb-5">Mulailah peduli dengan kesehatan paru-paru kamu, kesehatan itu mahal</p>
					</div>
				</div>
			</div>
		</header>
		<section class="page-section" style="background-color: #5f8fca;" id="Diagnosis">
			<div class="container px-4 px-lg-5">
				<div class="row gx-4 gx-lg-5 justify-content-center">
					<div class="col-lg-8 text-center">
						<h2 class="text-white mt-0">Cek Kesehatan Kamu Disini</h2>
						<hr class="divider divider-light" />
						<p class="text-white-75 mb-4">Cek kesehatan kamu dengan cara mengisi form yang sesuai dengan gejala yang kamu alami</p>
						<a class="btn btn-info btn-xl" style="color: whitesmoke;" href="<?= base_url(); ?>welcome/proses">Cek Sekarang!</a>
					</div>
				</div>
			</div>
		</section>
		<section class="page-section" id="cek">
			<div class="container px-4 px-lg-5">
				<h2 class="text-center mt-0">Lindungi Diri Kamu!</h2>
				<hr style="height: 3 rem;max-width: 5.25rem;margin: 1.5rem auto;background-color: #3a56f4;opacity: 1;" />
				<div class="row gx-4 gx-lg-4 ">
					<div class="col-lg-4 col-md-6 text-center">
						<div class="mt-5">
							<div class="mb-1"><i class="fa bi-search fs-2 text-primary"></i></div>
							<h3 class="h4 mb-2">Cek</h3>
							<p class="text-muted mb-0">Periksa dini kondisi paru-paru kamu dan lakukan tindakan pertama secara mandiri jika mendesak</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="mt-5">
							<div class="mb-2"><i class="fa  fa-stethoscope fs-2 text-primary"></i></div>
							<h3 class="h4 mb-2">Periksa Ke Dokter</h3>
							<p class="text-muted mb-0">Periksa kondisi kesehatan paru-paru kamu ke dokter terdekat</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="mt-5">
							<div class="mb-2"><i class="fa bi-heart fs-2 text-primary"></i></div>
							<h3 class="h4 mb-2">Care</h3>
							<p class="text-muted mb-0">Jaga kesehatan paru kamu sesuai anjuran dokter</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="page-section bg-dark text-white" id="FAQ">
			<div class="container px-4 px-lg-5 text-center">
				<h2 class="mb-4">Ketahui informasi tentang penyakit paru-paru</h2>
				<a class="btn btn-info btn-xl" style="color: whitesmoke;" href="<?= base_url('welcome') ?>/faq">Cek Disini!</a>
			</div>
		</section>

	</div>
	<!-- Footer-->
	<footer class="bg-dark py-5">
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