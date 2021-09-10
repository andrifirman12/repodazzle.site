<?php 

date_default_timezone_set('Asia/Jakarta');
$datetime = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
  .login-page {
   min-height: 100%;
   background: url("assets/dist/img/jakal.png");
   background-size: cover;
   background-blend-mode: multiply;
  }

  .login-box {
   background: white;
   background-size: cover;
   background-blend-mode: multiply;
   opacity: 0.95;
  }
 </style>
 <title>Dazzle Repository Login</title>

 <link rel="icon" href="assets/dist/img/dazzle.png?v=2">
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 <!-- Toastr -->
 <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
 <div class="login-box">
  <div class="login-logo mt-4">
   <img src="assets/dist/img/dzl.png" alt="Dazzle Logo" style="transform: scale(1.3)">
  </div>
  <!-- /.login-logo -->
  <div class="card">
   <div id="overlay">
   </div>
   <div class="card-body login-card-body">

    <form action="" id="form_login" method="post">
     <input type="hidden" name="dateTime" id="dateTime" value="<?= $datetime; ?>">
     <div class="input-group mb-3">
      <input type="email" class="form-control" placeholder="Email" id="email">
      <div class="input-group-append">
       <div class="input-group-text">
        <span class="fas fa-envelope"></span>
       </div>
      </div>
     </div>
     <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Password" id="password">
      <div class="input-group-append">
       <div class="input-group-text">
        <span class="fas fa-lock"></span>
       </div>
      </div>
     </div>

     <div class="row">
      <!-- /.col -->
      <div class="col-4">
       <button type="submit" class="btn btn-block" style="background-color:#b80d0d; color: white;">Sign In</button>
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
 <script src="assets/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="assets/dist/js/adminlte.min.js"></script>
 <!-- SweetAlert2 -->
 <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="assets/plugins/toastr/toastr.min.js"></script>
</body>

</html>


<script>
 var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
 });

 checkLogin = () => {

  let status = localStorage.getItem("status");

  if (status == "logedin") {
   window.location.href = 'home.php'
  }


 }

 $(document).ready(() => {

  checkLogin()

  authUser = () => {

   let formData = new FormData()

   formData.append('form', 'auth_user')
   formData.append('email', $('#email').val())
   formData.append('password', $('#password').val())
   formData.append('dt', $('#dateTime').val())

   $.ajax({
    type: 'POST',
    url: 'controller/Ajax.php',
    data: formData,
    mimeTypes: "multipart/form-data",
    contentType: false,
    processData: false,
    dataType: "json",
    success: (res) => {

     window.location.href = 'home.php'
     localStorage.setItem("status", "logedin")
     localStorage.setItem("id_user", res.data.id);
     localStorage.setItem("last_login", $('#dateTime').val());
     localStorage.setItem("role_user", res.data.role);
     localStorage.setItem("nama_user", res.data.nama);


    },
    error: (err) => {

     Toast.fire({
      icon: 'error',
      title: 'Password atau email yang dimasukkan salah, coba lagi...'
     })

    }
   })
  }

  // ambil event ketika form di submit
  $('#form_login').on('submit', (e) => {
   e.preventDefault()

   authUser();

  })

 })
</script>