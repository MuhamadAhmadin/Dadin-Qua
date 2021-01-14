<?php 
require 'manage/functions.php';


if (!isset($_GET['slug_menu'])) {
  // echo "<script>window.location.href = 'beranda';</script>";
}

$slug_menu = htmlspecialchars(strip_tags($_GET['slug_menu']));

$q_pages = mysqli_query($conn, "SELECT A.*, B.* FROM menu A INNER JOIN pages B ON B.id_page = A.id_page WHERE A.slug_menu = '$slug_menu'");
$pages = mysqli_fetch_assoc($q_pages);


if (mysqli_num_rows($q_pages) == 0) {
  // header("Location: ../../../web/beranda");
}


$q_latest_berita = mysqli_query($conn, "SELECT * FROM berita WHERE status = 1 ORDER BY id_berita DESC LIMIT 5");


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
                    <?= $pages['judul']; ?>
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
                            Halaman
                        </a>
                    </li>
                    <li>
                        <span><i class="fas fa-chevron-right"></i> </span>
                    </li>
                    <li>
                        <a><?= $pages['judul']; ?></a>
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
          <div class="single-blog-details">
              <div class="img">
                  <img src="<?= get_profile_foto_front($pages['gambar']); ?>" alt="thumbnail">
              </div>
              <div class="content">
                  <ul class="top-meta">
                      <li>
                          <p class="date">
                              <?= date('d M, Y', strtotime($pages['created_at'])); ?>
                          </p>
                      </li>
                  </ul>
                  <a>
                      <h4 class="title">
                          <?= $pages['judul']; ?>
                      </h4>
                  </a>
                  <div class="text-area">
                      <?= $pages['deskripsi']; ?>
                  </div>
              </div>
          </div>
         
        
				</div>
				<div class="col-lg-4">
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
  
  <!-- main -->
  <script src="assets/js/contact.js"></script>
  <!-- main -->
  <script src="assets/js/main.js"></script>
</body>


</html>