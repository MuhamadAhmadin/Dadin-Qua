<?php 


 ?>
<aside class="main-sidebar sidebar-dark-indigo elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link navbar-indigo">
      <img src="../dist/img/polairud.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light ">Ditpolairud <b>ASIK</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= get_profile_foto($user_data['foto']); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user_data['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="dashboard" class="nav-link <?= active('dashboard'); ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-header">MASTER DATA</li>

          <li class="nav-item has-treeview <?= active('kategori', true); ?>">
            <a href="#" class="nav-link <?= active('kategori'); ?>">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Master Kategori Berita
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kategori" class="nav-link <?= active('kategori'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Kategori Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Kategori Berita</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview <?= active('member', true); ?>">
            <a href="#" class="nav-link <?= active('member'); ?>">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Master Struktur Org.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="member" class="nav-link <?= active('member'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Struktur Org.</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="member/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Struktur Org.</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?= active('galeri', true); ?> <?= active('dirpolairud', true); ?> <?= active('kontak', true); ?> <?= active('faq', true); ?>">
            <a href="#" class="nav-link <?= active('galeri'); ?> <?= active('dirpolairud'); ?> <?= active('kontak'); ?> <?= active('faq'); ?>">
              <i class="nav-icon fas fa-laptop-house"></i>
              <p>
                Master Front Web
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="galeri" class="nav-link <?= active('galeri'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dirpolairud" class="nav-link <?= active('dirpolairud'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Dirpolairud</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kontak" class="nav-link <?= active('kontak'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informasi Kontak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="faq" class="nav-link <?= active('faq'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pertanyaan & Jawaban</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?= active('berita', true); ?>">
            <a href="#" class="nav-link <?= active('berita'); ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Master Berita
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="berita" class="nav-link <?= active('berita'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="berita/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Berita</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>