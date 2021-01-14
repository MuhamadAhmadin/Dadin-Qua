<?php 
require '../functions.php';

$key_update = base64_encode("galeri_update");

if (!isset($_GET['id'])) {
  echo "<script>window.location.href = 'dashboard';</script>";
}

$id_galeri = base64_decode(htmlspecialchars(strip_tags($_GET['id'])));
$q_galeri = mysqli_query($conn, "SELECT A.id_galeri, A.aktif, A.galeri, A.keterangan, A.created_at, C.nama FROM galeri A  INNER JOIN users C ON C.id = A.id_user WHERE A.id_galeri = '$id_galeri' ORDER BY A.id_galeri DESC");
$galeri = mysqli_fetch_assoc($q_galeri);

if (mysqli_num_rows($q_galeri) == 0) {
  header("Location: ../../../galeri");
}

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

  <!-- Simple Lightbox -->
  <link rel="stylesheet" href="../plugins/simplelightbox-master/dist/simple-lightbox.css">

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
            <h1 class="m-0 text-dark">Edit Galeri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Galeri</li>
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
                <h3 class="card-title">Form Galeri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="myForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_galeri" id="id_galeri" value="<?= $galeri['id_galeri']; ?>">
                <input type="hidden" name="galeri_old" id="galeri_old" value="<?= $galeri['galeri']; ?>">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <?php if ($galeri['galeri'] !== ''): ?>
                      <br>
                      <?php 
                      $foto = $galeri['galeri'];
                       ?>
                      <div class="myLightbox">
                          <a class="" href="<?= get_profile_foto($foto); ?>"><img src="<?= get_profile_foto($foto); ?>" alt="<?= $foto; ?>" title="<?= $foto ?>"/ width="300" class="img-thumbnail"></a>
                      </div>
                      <br>
                      <small>Gambar sekarang</small>
                    <?php endif ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="galeri" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" value="<?= $galeri['keterangan']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="aktif" id="aktif" class="form-control">
                      <?php foreach($arr_status_galeri as $key => $value): ?>
                        <?php if ($key == $galeri['aktif']): ?>
                          <option value="<?= $key; ?>" selected><?= $value; ?></option>
                        <?php else: ?>
                          <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
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

<!-- CKEditor -->
<script src="../plugins/ckeditor/ckeditor.js"></script>

<!-- Simple Lightbox -->
  <script src="../plugins/simplelightbox-master/dist/simple-lightbox.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>

    $(document).ready(function(){

      var lightbox = new SimpleLightbox('.myLightbox a');

      $(document).on('click', '#btn_simpan', function(e) {
          // $('.page-loader-wrapper').css('display', 'block');
          e.preventDefault();
          var keterangan = $('#keterangan').val();
          if (keterangan == '') {
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
                              window.location.href = 'galeri';
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