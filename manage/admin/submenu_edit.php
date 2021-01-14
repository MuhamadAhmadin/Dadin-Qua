<?php 
require '../functions.php';

if (!isset($_GET['id'])) {
  echo "<script>window.location.href = 'dashboard';</script>";
}

$id_submenu = base64_decode(htmlspecialchars(strip_tags($_GET['id'])));
$q_submenu = mysqli_query($conn, "SELECT * FROM submenu WHERE id_submenu = '$id_submenu'");
$submenu = mysqli_fetch_assoc($q_submenu);

if (mysqli_num_rows($q_submenu) == 0) {
  header("Location: ../../../submenu");
}

$key_update = base64_encode("submenu_update");

$qparent_menu = mysqli_query($conn, "SELECT * FROM menu");

 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <?php include('inc_base_href.php'); ?>

  <?php include('inc_head.php'); ?>
</head>
<body class="hold-transition sidebar-mini accent-indigo">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('inc_navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('inc_sidebar.php'); ?>

  <div class="myloader"></div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit subMenu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">subMenu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form submenu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="myForm" method="POST">
                <input type="hidden" name="id_submenu" value="<?= $id_submenu; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama submenu</label>
                    <input type="text" class="form-control" name="submenu" id="submenu" placeholder="Masukkan Nama submenu" value="<?= $submenu['submenu']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Link submenu</label>
                    <input type="text" class="form-control" name="link_submenu" id="link_submenu" placeholder="Masukkan Link" value="<?= $submenu['link_submenu']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Urutan</label>
                    <input type="number" class="form-control" name="urutan_submenu" id="urutan_submenu" min="0" max="20" value="<?= $submenu['urutan_submenu']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="aktif" id="aktif" class="form-control">
                      <?php foreach($arr_status_galeri as $key => $value): ?>
                        <?php if ($key == $submenu['aktif']): ?>
                          <option value="<?= $key; ?>" selected><?= $value; ?></option>
                        <?php else: ?>
                          <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Parent Menu</label>
                    <select name="id_menu" id="id_menu" class="form-control">
                    <?php while($pmenu = mysqli_fetch_assoc($qparent_menu)): ?>
                      <?php if ($submenu['id_menu'] == $pmenu['id_menu']): ?>
                        <option value="<?= $pmenu['id_menu']; ?>" selected><?= $pmenu['menu']; ?></option>
                      <?php else: ?>
                        <option value="<?= $pmenu['id_menu']; ?>"><?= $pmenu['menu']; ?></option>
                      <?php endif; ?>
                    <?php endwhile; ?>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" id="btn_simpan" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <?php include('inc_footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>

    $(document).ready(function(){

      $(document).on('click', '#btn_simpan', function(e) {
          // $('.page-loader-wrapper').css('display', 'block');
          e.preventDefault();
          var submenu = $('#submenu').val();
          if (submenu == '') {
              Swal.fire({
                  icon: "error",
                  title: "Form harus lengkap",
                  timer: 3000
              })
          } else {
              $('#btn_simpan').addClass('onloading');
              $('#btn_simpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Loading...');
              formData = new FormData($('#myForm')[0]);
              formData.append('key', '<?= $key_update; ?>');

              $.ajax({
                  type: "POST",
                  url: "../functions.php",
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(data) {
                      console.log(data);
                      $('#btn_simpan').removeClass('onloading');
                      $('#btn_simpan').html('Simpan');
                      if (data.error == 0) {
                          setTimeout(function() {
                              Swal.fire({
                                  position: 'top-end',
                                  icon: 'success',
                                  title: data.message,
                                  showConfirmButton: false
                              })
                          }, 300);
                          setTimeout(function() {
                              window.location.href = 'submenu';
                          }, 1000);
                      } else {

                          console.log("error");
                          console.log(data.message);
                          Swal.fire({
                              icon: "error",
                              title: "Ada Kesalahan",
                              text: data.message,
                              timer: 3000
                          })
                      }
                  },
                  error: function(data) {
                      console.log(data);
                      $('#btn_simpan').removeClass('onloading');
                      $('#btn_simpan').html('Simpan');
                      Swal.fire({
                          icon: "error",
                          title: "Ada Kesalahan. silahkan kontak developer",
                          text: data,
                          timer: 2000
                      })
                  },
                  timeout: function(data) {
                      console.log(data);;
                      Swal.fire({
                          icon: "error",
                          title: "Connection Timed Out",
                          text: data,
                          timer: 2000
                      })
                  }
              })
          }
      })

    })
</script>

</body>
</html>
