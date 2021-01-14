<?php 
require '../functions.php';

$key_add = base64_encode("kategori_add");

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

  <title>Ditpolairud | Admin</title>
  
  <!-- favicon -->
  <link rel="shortcut icon" href="../dist/img/polairud.png" type="image/x-icon">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1 class="m-0 text-dark">Tambah Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Form Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="myForm" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori">
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
          var kategori = $('#kategori').val();
          if (kategori == '') {
              Swal.fire({
                  icon: "error",
                  title: "Form harus lengkap",
                  timer: 3000
              })
          } else {
              $('#btn_simpan').addClass('onloading');
              $('#btn_simpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Loading...');
              formData = new FormData($('#myForm')[0]);
              formData.append('key', '<?= $key_add; ?>');

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
                              window.location.href = 'kategori';
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
