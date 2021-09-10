<style>
  #notif_nav:hover {
    background-color: #f8f9fa;
  }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="color: white;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto mr-2">

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span id="jml_komentar" class="badge badge-primary navbar-badge"></span>
      </a>
      <div id="div_komen" class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
        style="max-height: 350px; overflow-y: auto; min-width: 350px;">

        <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Komentar</a>
      </div>
    </li>

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span id="jml_notif" class="badge badge-danger navbar-badge"></span>
      </a>
      <div id="div_notif" class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
        style="max-height: 350px; overflow-y: auto; min-width: 350px;">
      </div>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

<script>
  detailKonten = (id) => {
    localStorage.id_konten = id;
    window.location.href = "home.php?p=detail_konten";
  }

  updateLastLogin = () => {



    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: {
        id_user: localStorage.getItem('id_user'),
        form: 'update_last_login',
      },
      dataType: "json",
      success: (res) => {

        $('#div_notif').empty()

        if (res.data.length != 0) {

          $("#jml_notif").text(res.total);

          let al = `<span class="dropdown-item dropdown-header">${res.total} Notifikasi</span>`
          $('#div_notif').append(al)

          res.data.forEach((val, i) => {

            let el = `<div class="dropdown-divider"></div>
    <li id="notif_nav" class="item p-3">
            <div class="product-info">
              <a href="#" class="product-title">
                <span class="badge badge-light float-right">${val.waktu}</span></a>
              <span class="product-description">
                ${val.aksi}
              </span>
            </div>
          </li>`

            $('#div_notif').append(el)

          })

          let le = `<div class="dropdown-divider"></div>
  <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
  </div>`


          $('#div_notif').append(le)

        } else {
          let el = `<div class="dropdown-divider"></div>
    <li id="notif_nav" class="item p-3">
    <span class="dropdown-item dropdown-header"> <i class="far fa-bell mr-1"></i> Notif Kosong !</span> 
          </li>`

          $('#div_notif').append(el)

          let le = `<div class="dropdown-divider"></div>
  <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
  </div>`

          $('#div_notif').append(le)

        }

        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_user').empty()
          $('#ttl_user').append(ttl)
        }

      },
      error: (err) => {
        console.log(err)
      }
    })

  }


  getLogNotif = (lg) => {
    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: {
        id_user: localStorage.getItem('id_user'),
        last_login: lg,
        form: 'get_log_notif_nav',
      },
      dataType: "json",
      success: (res) => {

        $('#div_notif').empty()

        if (res.data.length != 0) {

          $("#jml_notif").text(res.total);

          let al = `<span class="dropdown-item dropdown-header">${res.total} Notifikasi</span>`
          $('#div_notif').append(al)

          res.data.forEach((val, i) => {

            let el = `<div class="dropdown-divider"></div>
            <li id="notif_nav" class="item p-3">
                    <div class="product-info">
                      <a href="#" class="product-title">
                        <span class="badge badge-light float-right">${val.waktu}</span></a>
                      <span class="product-description">
                        ${val.aksi}
                      </span>
                    </div>
                  </li>`

            $('#div_notif').append(el)

          })

          let le = `<div class="dropdown-divider"></div>
          <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
          </div>`


          $('#div_notif').append(le)

        } else {
          let el = `<div class="dropdown-divider"></div>
            <li id="notif_nav" class="item p-3">
            <span class="dropdown-item dropdown-header"> <i class="far fa-bell mr-1"></i> Notif Kosong !</span> 
                  </li>`

          $('#div_notif').append(el)

          let le = `<div class="dropdown-divider"></div>
          <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
          </div>`

          $('#div_notif').append(le)

        }

        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_user').empty()
          $('#ttl_user').append(ttl)
        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getLogKomen = (lg) => {
    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: {
        id_user: localStorage.getItem('id_user'),
        last_login: lg,
        form: 'get_log_komen_nav',
      },
      dataType: "json",
      success: (res) => {

        $('#div_komen').empty()

        if (res.data.length != 0) {

          $("#jml_komentar").text(res.total);

          let al = `<span class="dropdown-item dropdown-header">${res.total} Komentar</span>`
          $('#div_komen').append(al)

          res.data.forEach((val, i) => {

            let el = `<div class="dropdown-divider"></div>
            <li id="notif_nav" class="item p-3">
                    <div class="product-info">
                      <a href="#" class="product-title">
                        <span class="badge badge-light float-right">${val.waktu}</span></a>
                      <span class="product-description">
                        ${val.aksi}
                      </span>
                    </div>
                  </li>`

            $('#div_komen').append(el)

          })

          let le = `<div class="dropdown-divider"></div>
          <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
          </div>`


          $('#div_komen').append(le)

        } else {
          let el = `<div class="dropdown-divider"></div>
            <li id="notif_nav" class="item p-3">
            <span class="dropdown-item dropdown-header"> <i class="far fa-comments"></i> Komentar Kosong !</span> 
                  </li>`

          $('#div_komen').append(el)

          let le = `<div class="dropdown-divider"></div>
          <a href="home.php?p=log" class="dropdown-item dropdown-footer">Lihat Semua Log</a>
          </div>`

          $('div_komen').append(le)

        }

        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_user').empty()
          $('#ttl_user').append(ttl)
        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  $(document).ready(() => {

    var user_login = localStorage.getItem('nama_user')
    var last_login = localStorage.getItem('last_login')

    getLogNotif(last_login)
    getLogKomen(last_login)

    // var id_admin = localStorage.getItem('id_user')
    // document.getElementById("id_admin").value = id_admin;

    // setInterval(() => {
    //   getLogNotif(last_login);
    // }, 2000);

    // setInterval(() => {
    //   getLogKomen(last_login)
    // }, 2000);

  })
</script>