<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Log Activity</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Log Activity</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Range</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dr">
              <h5 class="mt-1"><i class="far fa-calendar-alt"></i></h5>
            </button>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body collapse" id="dr">

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" id="dt_x" data-target="#reservationdatetime">
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <div class="input-group date" id="rty" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" id="dt_y" data-target="#rty">
                  <div class="input-group-append" data-target="#rty" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-1">
              <button type="button" onclick="log_range()" class="btn btn-block bg-purple">Apply</button>
            </div>

            <div class="col-md-2 form-group mt-auto">
              <button type="button" onclick="getLog()" class="btn btn-block btn-primary">Today</button>
            </div>
            <div class="col-md-1 form-group mt-auto">
              <button type="button" onclick="getLog3d()" class="btn btn-block btn-primary">3 Day</button>
            </div>
            <div class="col-md-1 form-group mt-auto">
              <button type="button" onclick="getLog7d()" class="btn btn-block btn-primary">7 Day</button>
            </div>
            <div class="col-md-1 form-group mt-auto">
              <button type="button" onclick="getLogAll()" class="btn btn-block btn-secondary">All</button>
            </div>
          </div>

        </div>
        <!-- /.card-body -->

      </div>

      <div class="card">
        <div class="card-header">
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="table-responsive">
                <div class="col-sm-12">
                  <table id="data_tables_log" class="table table-hover text-nowrap" role="grid"
                    aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
                        <th>ID User</th>
                        <th>User</th>
                        <th>Jenis Aksi</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="data_log"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- Akhir Tabel Konten -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  var id_admin = sessionStorage.getItem('id_user')

  var today = new Date().toLocaleString();
  // var dd = String(today.getDate()).padStart(2, '0');
  // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  // var yyyy = today.getFullYear();

  // today = mm + '/' + dd + '/' + yyyy;

  detailKonten = (id) => {
    sessionStorage.id_konten = id;
    window.location.href = "home.php?p=detail_konten";
  }

  log_range = () => {

    var dt_x = $('#dt_x').val();
    var dt_y = $('#dt_y').val();
    
    $('#data_tables_log').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_log_dt',
        dt_x: dt_x,
        dt_y:dt_y,
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
                <td>${val.id_user}</td>
                <td>${val.nama}</td>
                <td>${val.jenis_aksi}</td>
                <td>${val.waktu}</td>
                <td>${val.aksi}</td>
              </tr>`

            $('#data_log').append(el)

          })

          $('#data_tables_log').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
              },
              {
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
              },
              {
                text: 'Pilih Kolom',
                extend: 'colvis',
              },
            ],
            "lengthMenu": [
              [10, 20, 50, -1],
              [10, 20, 50, "All"]
            ]


          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })

    // var dt_x = $('#dt_x').val();
    // var dt_y = $('#dt_y').val();
    // console.log(dt_x, dt_y)

  }

  getLog = () => {

    $('#data_tables_log').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_log',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
                <td>${val.id_user}</td>
                <td>${val.nama}</td>
                <td>${val.jenis_aksi}</td>
                <td>${val.waktu}</td>
                <td>${val.aksi}</td>
              </tr>`

            $('#data_log').append(el)

          })

          $('#data_tables_log').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
              },
              {
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
              },
              {
                text: 'Pilih Kolom',
                extend: 'colvis',
              },
            ],
            "lengthMenu": [
              [10, 20, 50, -1],
              [10, 20, 50, "All"]
            ],


          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getLog3d = () => {

    $('#data_tables_log').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_log_3d',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
            <td>${val.id_user}</td>
            <td>${val.nama}</td>
            <td>${val.jenis_aksi}</td>
            <td>${val.waktu}</td>
            <td>${val.aksi}</td>
          </tr>`

            $('#data_log').append(el)

          })

          $('#data_tables_log').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
              },
              {
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
              },
              {
                text: 'Pilih Kolom',
                extend: 'colvis',
              },
            ],
            "lengthMenu": [
              [10, 20, 50, -1],
              [10, 20, 50, "All"]
            ],


          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getLog7d = () => {

    $('#data_tables_log').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_log_7d',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
        <td>${val.id_user}</td>
        <td>${val.nama}</td>
        <td>${val.jenis_aksi}</td>
        <td>${val.waktu}</td>
        <td>${val.aksi}</td>
      </tr>`

            $('#data_log').append(el)

          })

          $('#data_tables_log').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`
              },
              {
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
              },
              {
                text: 'Pilih Kolom',
                extend: 'colvis',
              },
            ],
            "lengthMenu": [
              [10, 20, 50, -1],
              [10, 20, 50, "All"]
            ],


          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getLogAll = () => {

    $('#data_tables_log').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_log_all',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
                <td>${val.id_user}</td>
                <td>${val.nama}</td>
                <td>${val.jenis_aksi}</td>
                <td>${val.waktu}</td>
                <td>${val.aksi}</td>
              </tr>`

            $('#data_log').append(el)

          })

          $('#data_tables_log').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
              },
              {
                title: 'Rekap Data Log | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
              },
              {
                text: 'Pilih Kolom',
                extend: 'colvis',
              },
            ],
            "lengthMenu": [
              [10, 20, 50, -1],
              [10, 20, 50, "All"]
            ],


          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }


  $(document).ready(() => {

    getLog()

    $('#reservationdatetime').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      icons: {
        time: 'far fa-clock'
      },
    });

    $('#rty').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      icons: {
        time: 'far fa-clock'
      },
    });



  })
</script>