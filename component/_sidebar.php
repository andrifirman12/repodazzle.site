<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-danger elevation-4" style="height: auto; min-height: 100%;">
  <!-- Brand Logo -->
  <!-- <a href="home.php" class="brand-link">
    <img src="assets/dist/img/dzl.png" alt="AdminLTE Logo" class="ml-4 mt-auto d-block p-1"
      style="transform: scale(1.2);">
    <span class="brand-text font-weight-light"></span>
  </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="" class="img-circle elevation-2 mt-2" alt="User Image" id="side_avatar"
          style="width: 35px; height: 35px;">
      </div>
      <div class="info">
        <a href="#" class="d-block" id="side_name"></a>
        <span class="right badge badge-danger" id="side_role"></span>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-header"><strong> MENU </strong></li>

        <!-- Add icons to the links using the .nav-icon class
    with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="home.php?" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="home.php?p=jadwal" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Jadwal
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="home.php?p=konten" class="nav-link">
            <i class="nav-icon fas fa-drafting-compass"></i>
            <p>
              Konten
            </p>
          </a>
        </li>

        <li class="nav-item" id="nav_admin" style="display:none;">
          <a href="home.php?p=user" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              User
            </p>
          </a>
        </li>

        <li class="nav-header"><strong> EXAMPLES </strong></li>

        <li class="nav-item">
          <a href="home.php?p=ig_dazzle" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Instagram
            </p>
          </a>
        </li>

        <li class="nav-item" onclick="logout()">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Log Out
            </p>
          </a>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>

  getUserActive = (id) => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_user_active',
      },
      dataType: "json",
      success: (res) => {

        $('#side_name').text(res.data.nama)
        $('#side_role').text(res.data.role)
        $("#side_avatar").attr("src", res.data.avatar);

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  detUser = () => {
    window.location.href = "home.php?p=detail_user";
  }

  $(document).ready(() => {
    // panggil fungsi ini
    var id_user = localStorage.getItem("id_user");
    getUserActive(id_user)
    
    document.getElementById('side_name').setAttribute('onclick', `detUser()`)

    var role_user = localStorage.getItem("role_user");

    if (role_user == "Admin" || role_user == "Supervisor") {
      document.getElementById("nav_admin").style.display = "block"
    }

  })
</script>