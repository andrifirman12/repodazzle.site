<?php 

date_default_timezone_set('Asia/Jakarta');
$datetime = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dazzle Repository</title>

  <link rel="icon" href="assets/dist/img/dazzle.png?">
  <link href="assets/plugins/instagram/shared/css/instagram.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- InputMask -->
  <script src="assets/plugins/moment/moment.min.js"></script>
  <!-- <script src="assets/plugins/inputmask/jquery.inputmask.min.js"></script> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="assets/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- fullCalendar -->
  <link rel="stylesheet" href="assets/plugins/fullcalendar/main.css">


</head>

<body class="sidebar-mini sidebar-collapse">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Mulai Navbar -->
    <?php include_once 'component/_navbar.php';?>
    <!-- Akhir navbar -->

    <!-- Mulai Navbar -->
    <?php include_once 'component/_sidebar.php';?>
    <!-- Akhir navbar -->

    <?php
   $lnk = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_URL);
   if (empty($lnk)) {
   include_once 'pages/dashboard.php';
   } elseif ($lnk == 'user') {
   include_once 'pages/user.php';
   } elseif ($lnk == 'konten') {
   include_once 'pages/konten.php';
   } elseif ($lnk == 'detail_konten') {
   include_once 'pages/detail_konten.php';
   } elseif ($lnk == 'ig_dazzle') {
   include_once 'pages/instagram.php';
   } elseif ($lnk == 'jadwal') {
   include_once 'pages/jadwal.php';
   } elseif ($lnk == 'wa') {
   include_once 'pages/iframe.php';
   } elseif ($lnk == 'ig') {
   include_once 'pages/iframe.php';
   } elseif ($lnk == 'detail_user') {
   include_once 'pages/detail_user.php';
   } elseif ($lnk == 'log') {
   include_once 'pages/log.php';
   }
  ?>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2021 <a href="https://repodazzle.site">Repodazzle.site</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI -->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Summernote -->
  <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- Toastr -->
  <script src="assets/plugins/toastr/toastr.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/jszip/jszip.min.js"></script>
  <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- date-range-picker -->
  <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="assets/plugins/moment/moment.min.js"></script>
  <script src="assets/plugins/fullcalendar/main.js"></script>
  <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="assets/dist/js/demo.js"></script>
  <!-- Page specific script -->

  <script>
    var id_admin = localStorage.getItem('id_user')

    var today = new Date().toLocaleString();
    
    detailKonten = (id) => {
      sessionStorage.id_konten = id;
      localStorage.id_konten = id;
          window.open('home.php?p=detail_konten', '_blank');
    }

    logout = () => {

      localStorage.clear();
      window.location.href = 'index.php'

    }

    $(document).ready(() => {
      var ssl = localStorage.getItem("status");
      if (window.localStorage) {
        if (ssl == "logedin") {
          console.log("login")
        } else if (ssl === null) {
          window.location.href = 'index.php'
        }
      }

      var last_login = localStorage.getItem('last_login')

      setInterval(() => {
        getLogKomen(last_login)
        getLogNotif(last_login);
      }, 2000);

    });
  </script>
</body>

</html>