<?php 
require '../functions.php';
$q_galeri = mysqli_query($conn, "SELECT A.id_galeri, A.aktif, A.galeri, A.keterangan, A.created_at, C.nama FROM galeri A  INNER JOIN users C ON C.id = A.id_user ORDER BY id_galeri DESC");
$key_hapus = base64_encode("galeri_hapus");

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
            <h1 class="m-0 text-dark">Master Galeri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Galeri</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
        	<div class="col-sm-12 text-right">
        		<a href="galeri/add" class="btn bg-indigo btn-lg"><i class="fas fa-plus"></i></a>
        	</div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="font-size: 14px;">
                  <thead>
                  <tr>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Pembuat</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_assoc($q_galeri)): ?>
                  <tr>
                    <td>
                      <?php 
                      $foto = $row['galeri'];
                       ?>
                      <div class="myLightbox">
                          <a class="" href="<?= get_profile_foto($foto); ?>"><img src="<?= get_profile_foto($foto); ?>" alt="<?= $foto; ?>" title="<?= $foto ?>"/ width="100" class="img-thumbnail"></a>
                      </div>
                    </td>
                    <td>
                      <?= $row['keterangan']; ?>
                      <br>
                      <div class="text-right">
                        <small class="text-indigo">
                          <?= "created at: ". date('d M, Y', strtotime($row['created_at'])); ?>
                        </small>
                      </div>

                    </td>
                    <td>
                      <?php 
                      echo get_status_galeri($row['aktif']);
                       ?>
                    </td>
                    <td>
                      <?php 
                      echo $row['nama'];
                       ?>
                    </td>
                    <td>
                    	<a href="galeri/edit/<?= base64_encode($row['id_galeri']); ?>/" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    	<a href="#" id="<?= $row['id_galeri']; ?>" class="btn btn-sm btn-danger btn_hapus mt-2"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
              	<?php endwhile; ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

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

<!-- Simple Lightbox -->
  <script src="../plugins/simplelightbox-master/dist/simple-lightbox.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>
	$("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $(document).ready(function(){

      var lightbox = new SimpleLightbox('.myLightbox a');

	    $(document).on('click', '.btn_hapus', function() {
	            let thisid = this.getAttribute('id');
	            console.log(thisid);

	            Swal.fire({
	                title: 'Yakin dihapus?',
	                text: "anda tidak bisa mengembalikan data ini!",
	                icon: 'warning',
	                showCancelButton: true,
	                confirmButtonColor: '#3085d6',
	                cancelButtonColor: '#d33',
	                confirmButtonText: 'Ya, Hapus!'
	            }).then((result) => {
	                if (result.value) {
	                    $('.myloader').css('display', 'none');
	                    $.ajax({
	                        type: "POST",
	                        url: "../functions.php",
	                        data: {
	                            id_galeri: thisid,
	                            key: '<?= $key_hapus; ?>'
	                        },
	                        dataType: "json",
	                        success: function(data) {
	                            console.log(data);
	                            if (data.error == 0) {
	                                $('.myloader').css('display', 'none');
	                                setTimeout(function() {
	                                    Swal.fire({
	                                        position: 'top-end',
	                                        icon: 'success',
	                                        title: data.message,
	                                        showConfirmButton: false
	                                    })
	                                }, 300);
	                                setTimeout(function() {
	                                    window.location.reload();
	                                }, 1000);
	                            } else {
	                                $('.myloader').css('display', 'none');
	                                console.log("error");
	                                console.log(data.message);
	                                Swal.fire({
	                                    icon: "error",
	                                    title: "Ada Kesalahan. silahkan kontak developer",
	                                    text: data.message,
	                                    timer: 3000
	                                })
	                            }
	                        },
	                        error: function(data) {
	                            $('.myloader').css('display', 'none');
	                            console.log(data);
	                            Swal.fire({
	                                icon: "error",
	                                title: "Ada Kesalahan. silahkan kontak developer",
	                                text: data,
	                                timer: 2000
	                            })
	                        },
	                        timeout: function(data) {
	                            $('.myloader').css('display', 'none');
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
	        }) // end of delete function

    })
</script>

</body>
</html>
