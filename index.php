<?php 
require 'manage/functions.php';

$q_berita = mysqli_query($conn, "SELECT A.slug, A.id_berita, A.judul, A.gambar, A.deskripsi, A.status, A.id_kategori, A.created_at, B.kategori, C.nama as author FROM berita A INNER JOIN kategori B ON B.id_kategori = A.id_kategori INNER JOIN users C ON C.id = A.id_user WHERE A.status = 1 ORDER BY A.id_berita DESC LIMIT 6");

$q_gal = mysqli_query($conn, "SELECT * FROM galeri WHERE aktif = 1");
$q_member = mysqli_query($conn, "SELECT * FROM member WHERE aktif = 1");

$q_dir = mysqli_query($conn, "SELECT * FROM dirpolairud");
$dir = mysqli_fetch_assoc($q_dir);

$q_kontak = mysqli_query($conn, "SELECT * FROM kontak");
$kontak = mysqli_fetch_assoc($q_kontak);

$q_faq = mysqli_query($conn, "SELECT * FROM faq WHERE aktif = 1 ORDER BY urutan ASC");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <!-- Simple Lightbox -->
  <link rel="stylesheet" href="manage/plugins/simplelightbox-master/dist/simple-lightbox.css">



  <?php include("inc_header.php"); ?>
</head>

<body class="home7">

  <!-- preloader area start -->
  <?php include('inc_preloader.php'); ?>
  <!-- preloader area end -->

  <!-- Navebar Area start -->
  <?php include('inc_menu.php'); ?>
  <!-- Navebar Area End -->

  <!-- Hero Area Start -->
  <div id="home" class="hero-area">
    <div class="curve curve-bottom"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex align-self-center">
          <div class="left-content">
            <div class="content">
              <h1 class="title">
                DADIN QUA
              </h1>

              <p class="subtitle">
                Depot Isi Ulang Air Mineral
              </p>
              <div class="links">
                <a href="#" class="mybtn1"><span>SELENGKAPNYA</span> </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-first order-lg-last">
          <div class="right-img">
            <div class="discount-circle">
              <div class="discount-circle-inner">
                <div class="price">
                  DADIN
                  <span>QUA</span>
                </div>
              </div>
            </div>
            <img class="img-fluid img" src="assets/images/dadinqua.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End -->

  <!-- Blog Page Grid Area Start -->
  <section class="blog-page single-blog-area" id="berita">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="section-title extra">
            <h2 class="title">Informasi Terkini</h2>
            <p>
              Informasi terkini dari Depot Dadin Qua
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <?php while($row = mysqli_fetch_assoc($q_berita)): ?>
          <div class="col-lg-4 col-md-6 kotak mb-5">
            <a href="berita/<?= $row['slug']; ?>/">
              <div class="bungkus" style='background:url("<?= get_profile_foto_front($row['gambar']); ?>");'>
              </div>
            </a>
              <a href="berita/<?= $row['slug']; ?>/" class="title judul"><?= limit_string($row['judul'], 57, 57); ?></a>
              <p class="deskripsi"><?= limit_string(htmlspecialchars(strip_tags($row['deskripsi'])), 230, 230) ?></p>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="row compare-section" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="col-12 d-flex justify-content-center">
          <div class="links">
              <a href="berita" class="mybtn1"><span>LIHAT SEMUA</span> </a>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Page Grid Area End -->

  <!-- Deal Of the Week Start -->
  <section class="dealofweek" id="dirpolairud">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="section-title">
            <h2 class="title">Dadin Qua</h2>
            <p>
              Sejarah Dadin Qua
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="deal-slider-area">
              <div class="s">
                  <div class="item">
                      <div class="content">
                          <div class="row">
                            <div class="col-lg-6">
                                <div class="left-area">
                                    <img src="<?= get_profile_foto_front($dir['foto']); ?>" alt="dirpolairud">
                                  </div>
                            </div>
                            <div class="col-lg-6 d-flex">
                                <div class="right-area">
                                    <!-- <ul class="stars">
                                      <li>
                                          <i class="fas fa-star"></i>
                                      </li>
                                      <li>
                                          <i class="fas fa-star"></i>
                                      </li>
                                      <li>
                                          <i class="fas fa-star"></i>
                                      </li>
                                      <li>
                                          <i class="fas fa-star"></i>
                                      </li>
                                      <li>
                                          <i class="fas fa-star"></i>
                                      </li>
                                    </ul> -->
                                    <h4 class="name" style="font-size: 22px;">
                                       <?= $dir['nama']; ?>
                                    </h4>
                                    <p class="description">
                                      <?= $dir['keterangan']; ?>
                                    </p>
                                    
                                    <div class="links">
                                      <a href="<?= $dir['link_detail']; ?>" class="mybtn1"><span>Detail</span></a>
                                    </div>

                                  </div>
                            </div>
                          </div>
                        </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Deal Of the Week Start -->

  <!-- Member Area Start -->
  <section class="pricing" id="member">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <div class="section-title">
              <h2 class="title">Struktur Dadin Qua</h2>
              <p>
                Struktur Dadin Qua
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="product-slider" data-aos="fade-up">
              <?php while($member = mysqli_fetch_assoc($q_member)): ?>
              <div class="item">
                <div class="single-product">
                  <div class="img" style="background: rgba(23, 78, 191, 1);">
                    <div class="myLightbox">
                          <a class="" style="position: relative;z-index: 5 !important;" href="<?= get_profile_foto_front($member['foto']); ?>"><img src="<?= get_profile_foto_front($member['foto']); ?>" alt="foto" title="<?= $member['nama']; ?>" width="100" class="img-thumbnail"></a>
                      </div>
                    
                    <div class="links">
                        <!-- <a href="#" class="mybtn1"><span>Buy Now</span> </a> -->
                      </div>
                  </div>
                  <div class="content" style="padding-top: 15px;">
                    <h4 class="title" style="font-size: 14px;">
                      <?= $member['nama']; ?>
                    </h4>
                    <p><?= $member['keterangan']; ?></p>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- member part End -->

   <!--  Video Area Start -->
  <section class="video" id="video">
      <div class="curve curve-bottom"></div>
      <div class="curve curve-top"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="section-title">
            <h2 class="title">Keluarga Sehat, Minum Air Mineral</h2>
            <p>
              Karena Air, adalah Sumber Kehidupan
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="video-wrapper">
            <div class="video-box" data-aos="fade-right">
              <div class="overly"></div>
              <div class="play-icon">
                <a href="https://www.youtube.com/watch?v=BCHhwxvQqxg" class="video-play-btn mfp-iframe">
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-6">
              <div class="fun-box" data-aos="fade-left">
                <div class="inner-content inner-content1">
                  <div class="icon">
                    <i class="flaticon-guarantee"></i>
                  </div>
                  <h5 class="categori">100% Air Murni</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="fun-box" data-aos="fade-left">
                <div class="inner-content inner-content2" style="margin-top: 0px;">
                  <div class="icon">
                    <i class="flaticon-delivery-truck"></i>
                  </div>
                  <h5 class="categori">Menerima Delivery</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6" style="margin-top: 30px;">
              <div class="fun-box" data-aos="fade-left">
                <div class="inner-content inner-content3" style="margin-bottom: 0px;">
                  <div class="icon">
                    <i class="flaticon-return"></i>
                  </div>
                  <h5 class="categori">Konsisten</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <a href="https://www.youtube.com/channel/UC6Zi_GR6XLtcxxjZXDMJ89w" target="_blank">
                <div class="fun-box" data-aos="fade-left">
                  <div class="inner-content inner-content4">
                    <div class="icon">
                      <i class="flaticon-support-2"></i>
                    </div>
                    <h5 class="categori">Pelayanan Ramah</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Video Area End -->

  

  

  <!-- Pricing Area Start -->
  <section class="pricing" id="pricing">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <div class="section-title">
              <h2 class="title">Galeri Kami</h2>
              <p>
                Seputar tentang kegiatan-kegiatan Dadin Qua
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="product-slider" data-aos="fade-up">
              <?php while($gal = mysqli_fetch_assoc($q_gal)): ?>
              <div class="item">
                <div class="single-product">
                  <div class="img">
                    <div class="myLightbox">
                          <a class="" style="position: relative;z-index: 5 !important;" href="<?= get_profile_foto_front($gal['galeri']); ?>"><img src="<?= get_profile_foto_front($gal['galeri']); ?>" alt="galeri" title="<?= $gal['keterangan']; ?>" width="100" class="img-thumbnail"></a>
                      </div>
                    
                    <div class="links">
                        <!-- <a href="#" class="mybtn1"><span>Buy Now</span> </a> -->
                      </div>
                  </div>
                  <div class="content">
                    <h4 class="title">
                      <?= $gal['keterangan']; ?>
                    </h4>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- pricing part End -->


  <!-- Partner Area Start -->
  <section id="faq" class="faq">
      <div class="curve curve-bottom"></div>
      <div class="curve curve-top"></div>
    <div class="container">
      <div class="section-title extra">
        <h2 class="title">Ada Pertanyaan?</h2>
        <p>
          Dibawah ini sudah kami sediakan pertanyaan yang sering ditanyakan.
        </p>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="panel-group accordion" id="accordion-1">
            <?php $expanded = 0;?>
            <?php while($faq = mysqli_fetch_assoc($q_faq)): ?>
              <div class="panel">
                <div class="panel-heading">
                  <h4 data-toggle="collapse" aria-expanded="<?= ($expanded > 0) ? 'true' : 'false'; ?>" data-target="#<?= $faq['id_faq']; ?>" aria-controls="<?= $faq['id_faq']; ?>" class="panel-title">
                    <?= $faq['tanya']; ?>
                  </h4>
                </div>
                <div id="<?= $faq['id_faq']; ?>" class="panel-collapse collapse" aria-labelledby="<?= $faq['id_faq']; ?>" data-parent="#accordion-1">
                  <div class="panel-body">
                    <p>
                        <?= $faq['jawab']; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
          <div class="faq-img">
            <img src="assets/images/galon.png" alt="" width="300">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Partner Area End -->

  <!-- Contact Area Start -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="section-title">
            <h2 class="title">Kontak Kami</h2>
            <p>
              Jangan sungkan untuk mengontak langsung kepada kami, mari berdiskusi
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="info-box box1">
            <div class="left">
              <div class="icon">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <div class="right">
              <div class="content">
                <p><?= $kontak['telp1']; ?></p>
                <p><?= $kontak['telp2']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="info-box box2">
            <div class="left">
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
            <div class="right">
              <div class="content">
                <p><?= $kontak['email1']; ?></p>
                <p><?= $kontak['email2']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="info-box box3">
            <div class="left">
              <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
              </div>
            </div>
            <div class="right">
              <div class="content">
                <p><?= $kontak['alamat']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="contact-form-wrapper">
            <form id="contact-form" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="input-field borderd" id="name" placeholder="Nama" required>
                </div>
                <div class="col-md-12">
                  <input type="email" class="input-field borderd" id="email" placeholder="Email" required>
                </div>
                <div class="col-12">
                  <textarea class="input-field borderd textarea" rows="3" id="message"
                    placeholder="Tulis pesan disini" required></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="mybtn1"> <span>Kirim Pesan</span></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="google_map_wrapper">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2630071801136!2d108.22332631431519!3d-6.7377363677524675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ed719186911c3%3A0xa9c044531cfe9316!2sDadin%20Galon!5e0!3m2!1sen!2sid!4v1610556420747!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Area End -->


  <?php include('inc_footer.php'); ?>


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

  <!-- Simple Lightbox -->
  <script src="manage/plugins/simplelightbox-master/dist/simple-lightbox.js"></script>

  <script>
  $(document).ready(function(){

    var lightbox = new SimpleLightbox('.myLightbox a');

  })  
  </script>
</body>


</html>