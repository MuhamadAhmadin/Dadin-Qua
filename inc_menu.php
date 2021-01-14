<?php 
$q_informasi = mysqli_query($conn, "SELECT * FROM kontak");
$info = mysqli_fetch_assoc($q_informasi);

$q_menu = mysqli_query($conn, "SELECT A.menu, 
                                      A.id_menu,
                                      A.link,
                                      A.aktif,
                                      A.urutan,
                                      A.slug_menu,
                                      A.id_page AS id_page_menu,
                                      B.id_page AS id_page_pages
                                        FROM menu A 
                                        LEFT JOIN pages B
                                          ON B.id_page = A.id_page
                                        WHERE A.aktif = 1 AND tipe = 0 ORDER BY A.urutan");

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
                <?php while($menu = mysqli_fetch_assoc($q_menu)): ?>

                  <!-- cek apakah ada submenu dari menu ini -->
                  <?php 
                  $id_menu = $menu['id_menu'];
                  $q_cek = mysqli_query($conn, "SELECT * FROM menu WHERE tipe = 1 AND aktif = 1 AND id_parent_menu = '$id_menu'");
                  if (mysqli_num_rows($q_cek) > 0) {
                    // dropdown menu
                    echo '<li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              '.$menu['menu'].'
                            </a>
                            <div class="dropdown-menu">';

                            $q_submenu = mysqli_query($conn, "SELECT * FROM menu WHERE id_parent_menu = '$id_menu' AND aktif = 1 ORDER BY urutan");
                            while($submenu = mysqli_fetch_assoc($q_submenu)){

                              if ($submenu['id_page'] != 0) {
                                // ke halaman tertentu
                                echo '<a class="dropdown-item" href="page/'.$submenu['slug_menu'].'/">
                                  <i class="fas fa-chevron-right"></i>
                                  '.$submenu['menu'].'
                                </a>';
                              }else{
                                // link biasa
                                echo '<a class="dropdown-item" href="'.$submenu['link'].'">
                                  <i class="fas fa-chevron-right"></i>
                                  '.$submenu['menu'].'
                                </a>';
                              }

                            }
                             
                    echo '</div>
                        </li>';


                    

                  }else{
                    // single menu

                    // cek jika ini adalah ke halaman tertentu maka ada id_halaman
                    if ($menu['id_page_menu'] != 0) {
                      echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="page/'.$menu['slug_menu'].'/">'.$menu['menu'].'</a>';
                      echo '</li>';
                    }else{
                      echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="'.$menu['link'].'">'.$menu['menu'].'</a>';
                      echo '</li>';
                    }
                  }

                   ?>
                <?php endwhile; ?>

              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>