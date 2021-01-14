<?php 
require '../functions.php';

$key_update = base64_encode("kontak_update");

$q_kontak = mysqli_query($conn, "SELECT * FROM kontak");
$kontak = mysqli_fetch_assoc($q_kontak);

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
            <h1 class="m-0 text-dark">Informasi Kontak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Informasi Kontak</li>
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
                <h3 class="card-title">Informasi Kontak</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="myForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="logo_web_old" id="logo_web_old" value="<?= $kontak['logo_web']; ?>">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputFile">Logo Website</label>
                    <?php if ($kontak['logo_web'] !== ''): ?>
                      <br>
                      <?php 
                      $foto = $kontak['logo_web'];
                       ?>
                      <div class="myLightbox">
                          <a class="" href="<?= get_profile_foto($foto); ?>"><img src="<?= get_profile_foto($foto); ?>" alt="<?= $foto; ?>" title="<?= $foto ?>"/ width="300" class="img-thumbnail"></a>
                      </div>
                      <br>
                      <small>Logo sekarang</small>
                    <?php endif ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo_web" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Email 1</label>
                    <input type="text" class="form-control" name="email1" id="email1" placeholder="Masukkan email 1" value="<?= $kontak['email1']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Email 2</label>
                    <input type="text" class="form-control" name="email2" id="email2" placeholder="Masukkan email 2" value="<?= $kontak['email2']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Telp 1</label>
                    <input type="text" class="form-control" name="telp1" id="telp1" placeholder="Masukkan telp 1" value="<?= $kontak['telp1']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Telp 2</label>
                    <input type="text" class="form-control" name="telp2" id="telp2" placeholder="Masukkan telp 2" value="<?= $kontak['telp2']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat" style="resize: y; max-height: 300px;min-height: 100px;" cols="30" rows="5" class="form-control"><?= $kontak['alamat']; ?></textarea>
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

      // CKEDITOR.replace('keterangan');

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
              // formData.append('keterangan', CKEDITOR.instances.keterangan.getData());

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
                              window.location.href = 'kontak';
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
