<?php 

cek_on_admin($_SESSION['level']);

// Ambil Data User Login
$id_user = $_SESSION['id_user'];
$q_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_user'");
$user_data = mysqli_fetch_assoc($q_user);

 ?>

<nav class="main-header navbar navbar-expand navbar-dark navbar-indigo">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item">
        <a class="nav-link" href="../logout" role="button"><i
            class="fas fa-power-off"></i></a>
      </li>
    </ul>
  </nav>