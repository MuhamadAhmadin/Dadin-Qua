<?php 
require 'manage/functions.php';

if (!isset($_GET['slug_kategori'])) {
  echo "<script>window.location.href = 'beranda';</script>";
}

$slug_kategori = htmlspecialchars(strip_tags($_GET['slug_kategori']));


// get detail kategori
$q_kat = mysqli_query($conn, "SELECT id_kategori, slug_kategori, kategori FROM kategori WHERE slug_kategori = '$slug_kategori'");
$kat = mysqli_fetch_assoc($q_kat);

$id_kategori = $kat['id_kategori'];


// pagination
// konfigurasi
$jumlahDataPerHalaman = 6;
$jumlahData = count(query("SELECT A.slug, A.id_berita, A.judul, A.gambar, A.deskripsi, A.status, A.id_kategori, A.created_at, B.kategori, C.nama as author FROM berita A INNER JOIN kategori B ON B.id_kategori = A.id_kategori INNER JOIN users C ON C.id = A.id_user WHERE A.status = 1 AND A.id_kategori = '$id_kategori' ORDER BY A.id_berita DESC"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$q_berita = query("SELECT A.slug, A.id_berita, A.judul, A.gambar, A.deskripsi, A.status, A.id_kategori, A.created_at, B.kategori, C.nama as author FROM berita A INNER JOIN kategori B ON B.id_kategori = A.id_kategori INNER JOIN users C ON C.id = A.id_user WHERE A.status = 1 AND A.id_kategori = '$id_kategori' ORDER BY A.id_berita DESC LIMIT $awalData, $jumlahDataPerHalaman");
// End Pagination Query



// For right widget
$q_latest_berita = mysqli_query($conn, "SELECT * FROM berita WHERE status = 1 ORDER BY id_berita DESC LIMIT 5");

$q_cat = mysqli_query($conn, "SELECT B.slug_kategori, B.kategori, COUNT(A.id_berita) AS JML FROM berita A INNER JOIN kategori B ON B.id_kategori = A.id_kategori GROUP BY B.kategori");



 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include('inc_base_href.php'); ?>

  <title> Dadin Qua </title>
  <!-- favicon -->
  <link rel="shortcut icon" href="assets/images/dadinqua.png" type="image/x-icon">
  <!-- bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <!-- Flat Icon -->
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <!-- animate -->
  <link rel="stylesheet" href="assets/css/animate.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <!-- magnific popup -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <!-- AOS css -->
  <link rel="stylesheet" href="assets/css/aos.css">
  <!-- stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- responsive -->
  <link rel="stylesheet" href="assets/css/responsive.css">

  <?php include("inc_header.php"); ?>
</head>

<body>

  <!-- preloader area start -->
  <?php include('inc_preloader.php'); ?>
  <!-- preloader area end -->

  <!-- Navebar Area start -->
  <?php include('inc_menu.php'); ?>
  <!-- Navebar Area End -->

  <!-- Breadcrumb Area Start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="title">
                    Kategori: <?= $kat['kategori']; ?>
                </h4>
                <ul class="breadcrumb-list">
                    <li>
                        <a href="beranda">
                            <i class="fas fa-home"></i>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <span><i class="fas fa-chevron-right"></i> </span>
                    </li>
                    <li>
                    	<a>
                    		Berita
                    	</a>
                    </li>
                    <li>
                    	<span><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li>
                        <a href="berita"> Kategori</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

	<!-- Blog Page Grid Area Start -->
	<section class="blog-page single-blog-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php foreach($q_berita as $row): ?>
				          <div class="col-lg-6 col-md-6 kotak mb-5">
				            <a href="berita/<?= $row['slug']; ?>/">
				              <div class="bungkus" style='background:url("<?= get_profile_foto_front($row['gambar']); ?>");'>
				              </div>
				            </a>
				              <a href="berita/<?= $row['slug']; ?>/" class="title judul"><?= limit_string($row['judul'], 57, 57); ?></a>
				              <p class="deskripsi"><?= limit_string(htmlspecialchars(strip_tags($row['deskripsi'])), 230, 230) ?></p>
				          </div>
				        <?php endforeach; ?>
					</div>
					

          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="kategori/<?= $kat['slug_kategori']; ?>/?halaman=1" aria-label="Previous">
                      <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
                    </a>
                  </li>

                  <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                    <?php if( $i == $halamanAktif ) : ?>
                      <li class="page-item"><a class="page-link active" href="kategori/<?= $kat['slug_kategori']; ?>/?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                      <li class="page-item"><a class="page-link" href="kategori/<?= $kat['slug_kategori']; ?>/?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>

                  <li class="page-item">
                    <a class="page-link" href="kategori/<?= $kat['slug_kategori']; ?>/?halaman=<?= $jumlahHalaman; ?>" aria-label="Next">
                      <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>

				</div>
				<div class="col-lg-4">
					<div class="categori-widget">
						<h4 class="title">
						Kategori
						</h4>
						<ul class="cat-list">
							<?php while($kat = mysqli_fetch_assoc($q_cat)): ?>
							<li>
								<a href="kategori/<?= $kat['slug_kategori']; ?>/">
									<p>
										<?= $kat['kategori']; ?>
									</p>
									<span class="count">
										<?= $kat['JML']; ?>
									</span>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<div class="latest-post-widget">
						<h4 class="title">
						Berita Terbaru
						</h4>
						<ul class="post-list">
							<?php while($latest = mysqli_fetch_assoc($q_latest_berita)): ?>
							<li>
								<div class="post">
									<div class="post-img">
										<img src="<?= get_profile_foto_front($latest['gambar']); ?>" alt="thumbnail">
									</div>
									<div class="post-details">
										<a href="berita/<?= $latest['slug']; ?>/" class="post-title">
											<?= limit_string($latest['judul'], 50, 50); ?>
										</a>
									</div>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Page Grid Area End -->


 <?php include('inc_footer.php');  ?>


  <!-- jquery -->
  <script src="assets/js/jquery.js"></script>
  <!-- popper -->
  <script src="assets/js/popper.min.js"></script>
  <!-- bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- way poin js-->
  <script src="assets/js/waypoints.min.js"></script>
  <!-- owl carousel -->
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- magnific popup -->
  <script src="assets/js/jquery.magnific-popup.js"></script>
  <!-- aos js-->
  <script src="assets/js/aos.js"></script>
  <!-- counterup js-->
  <script src="assets/js/jquery.countdown.min.js"></script>
  <!-- easing js-->
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <!-- Map js -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7eALQrRUekFNQX71IBNkxUXcz-ALS-MY&amp;sensor=false"></script> -->
  <script src="assets/js/gmap.js"></script>
  <!-- main -->
  <script src="assets/js/contact.js"></script>
  <!-- main -->
  <script src="assets/js/main.js"></script>
</body>


</html>