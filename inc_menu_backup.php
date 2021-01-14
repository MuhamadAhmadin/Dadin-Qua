<?php 
$q_informasi = mysqli_query($conn, "SELECT * FROM kontak");
$info = mysqli_fetch_assoc($q_informasi);

$q_menu = mysqli_query($conn, "SELECT * FROM menu WHERE aktif = 1 ORDER BY urutan");

 ?>
<header class="navigation">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-0">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="beranda">
              <img src="<?= get_profile_foto_front($info['logo_web']); ?>" alt="" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu"
              aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainmenu">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="beranda">Beranda</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#dirpolairud">Profile Dirpolairud</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#berita">Berita</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link active dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Demografi
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="airudaceh">
                      <i class="fas fa-chevron-right"></i>
                      Demografi Aceh & Airud
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>