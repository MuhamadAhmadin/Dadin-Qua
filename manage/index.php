<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dadin Qua | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicon -->
  <link rel="shortcut icon" href="../assets/images/dadinqua.png" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

 

  <!-- MyCSS -->
  <!-- <link rel="stylesheet" href="dist/css/mycss.css"> -->

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style>
		.myloginpage {
			background: url('../assets/images/bgku.png');
			background-repeat: no-repeat;
			background-size: cover;
		}

		.login-logo a {
			color: white;
		}

	</style>

</head>
<body class="hold-transition login-page myloginpage">

<div class="login-box">
  <div class="login-logo">
  	<img src="../assets/images/dadinqua.png" alt="logo" width="100"><br>
    <a href="index2.html"><b>Dadin</b> Qua</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk masuk ke dalam sistem</p>

      <form action="" method="post" id="myForm">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" id="btn_login" class="btn btn-primary btn-block bg-navy btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  
 $(document).ready(function() {
      
     $('#btn_login').click(function(e) {
         e.preventDefault();
         var username = $('#username').val();
         var password = $('#password').val();

         if (username == '' || password == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Form tidak boleh kosong',
            })
         } else {
             $(this).addClass('onloading');
             $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Loading...');
             $.ajax({
                 type: "POST",
                 url: "functions.php",
                 data: $('#myForm').serialize() + "&key=login",
                 dataType: "json",
                 success: function(data) {
                     console.log('sukses');
                     console.log(data);
                     $('#btn_login').removeClass('onloading');
                     $('#btn_login').html('Login');
                     if (data.error == 1) {
                         Swal.fire({
                             text: "Akun tidak ditemukan",
                             timer: 1500,
                         });
                     } else {
                         // jika akun ditemukan, cek levelnya
                         switch (data.level) {
                             case '1':
                                 // backend ke admin
                                 Swal.fire({
                                     icon: "success",
                                     title: 'Hai, ' + data.nama,
                                     html: 'Anda berhasil login!',
                                     timer: 2000,
                                     onBeforeOpen: () => {
                                         Swal.showLoading()
                                         timerInterval = setInterval(() => {}, 100)
                                     },
                                     onClose: () => {
                                         clearInterval(timerInterval)
                                     }
                                 }).then((result) => {
                                     if (
                                         /* Read more about handling dismissals below */
                                         result.dismiss === Swal.DismissReason.timer
                                     ) {
                                         console.log('I was closed by the timer')
                                     }
                                 });
                                 setTimeout(function() {
                                     window.location.href = 'admin/';
                                 }, 2100)
                                 break;

                             case '2':
                                 // backend ke staff
                                 Swal.fire({
                                     icon: "success",
                                     title: 'Hai, ' + data.nama,
                                     html: 'Anda berhasil login!',
                                     timer: 2000,
                                     onBeforeOpen: () => {
                                         Swal.showLoading()
                                         timerInterval = setInterval(() => {}, 100)
                                     },
                                     onClose: () => {
                                         clearInterval(timerInterval)
                                     }
                                 }).then((result) => {
                                     if (
                                         /* Read more about handling dismissals below */
                                         result.dismiss === Swal.DismissReason.timer
                                     ) {
                                         console.log('I was closed by the timer')
                                     }
                                 });
                                 setTimeout(function() {
                                     window.location.href = 'staff/';
                                 }, 2100)
                                 break;

                             default:
                                 console.log('Wait a minute... check the switch');
                         }
                     }
                 },
                 error: function(data) {
                     console.log('error');
                     console.log(data.err_msg);
                 },
                 timeout: function(data) {
                     console.log("timeout koneksi terlalu lambat");
                 }
             })
         }
     })
 })

</script>

</body>
</html>
