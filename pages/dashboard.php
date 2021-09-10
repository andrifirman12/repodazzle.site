<style>
  .fc-time {
    display: none;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner ml-2">
              <h3 id="total_konten"></h3>

              <p>Total Konten</p>
            </div>
            <div class="icon">
              <i class="fab fa-instagram-square mr-3"></i>
            </div>
            <a href="home.php?p=konten" class="small-box-footer">Selengkapnya<i
                class="fas fa-arrow-circle-right ml-2"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner ml-2">
              <h3 id="total_upld"></h3>

              <p>Konten Diupload</p>
            </div>
            <div class="icon">
              <i class="fas fa-cloud-upload-alt mr-3"></i>
            </div>
            <a href="home.php?p=konten" class="small-box-footer">Selengkapnya<i
                class="fas fa-arrow-circle-right ml-2"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner ml-2">
              <h3 id="total_user"></h3>

              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-friends mr-3"></i>
            </div>
            <a href="home.php?p=user" class="small-box-footer">Selengkapnya<i
                class="fas fa-arrow-circle-right ml-2"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-12 connectedSortable ui-sortable">
          <div class="row">

            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Uploaded</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <input type="hidden" name="dateTime" id="dateTime" value="<?= $datetime; ?>">
                  <input type="hidden" name="id_admin" id="id_admin">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="data_tables_konten_done" class="table table-hover text-nowrap" role="grid"
                          aria-describedby="example2_info">
                          <thead>
                            <tr role="row">
                              <th>Judul</th>
                            </tr>
                          </thead>
                          <tbody id="data_konten_done"></tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
            </div>

            <!-- /.col -->
            <div class="col-md-8"">
              <div class=" card card-primary">
              <div class="card-body p-0" id="tgln" style="height: 600px">
                <!-- THE CALENDAR -->
                <div id="calendar" style="padding: 25px; max-height:600px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

      </div>
  </section>

</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
</div>
<!-- /.content-wrapper -->

<script>

  getActiveIG = () => {

    let formData = new FormData()

    formData.append('form', 'get_active_ig')

    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: formData,
      mimeTypes: "multipart/form-data",
      contentType: false,
      processData: false,
      dataType: "json",
      success: (res) => {

        localStorage.setItem("act_tkn", res.data.access_token);

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getKontenDone = () => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_konten_done',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
        <td> <span class="text-primary" onclick="detailKonten(\`${val.id}\`)" ><u>${val.judul}</u></span></td>
        </tr>`

            $('#data_konten_done').append(el)

          })

          $('#data_tables_konten_done').DataTable({
            "searching": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "lengthMenu": [
              [8, 20, 50, -1],
              [8, 20, 50, "All"]
            ]
          })

        } else {
          let el = `<tr>
                <td colspan="2" style="vertical-align:middle; text-align:center;">Belum Ada User!</td>
							</tr>`

          $('#data_konten_done').append(el)
        }

        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_konten_done').empty()
          $('#ttl_konten_done').append(ttl)
        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  jadwalKonten = () => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_jadwal_konten',
      },
      success: (res) => {

      },
      error: (err) => {

      }
    })
  }

  dashboardPage = () => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_data_dashboard',
      },
      dataType: "json",
      success: (res) => {

        $("#total_konten").text(`${res.total_konten}`);
        $("#total_upld").text(`${res.total_upld}`);
        $("#total_user").text(`${res.total_user}`);

      },
      error: (err) => {

      }
    })
  }



  $(document).ready(() => {

    getActiveIG()
    dashboardPage()
    getKontenDone()

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      displayEventTime: 'true',
      initialView: 'timeGridWeek',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events

      eventClick: function (info) {

        var str = info.event.title
        var id_konten = str.substring(0, 7);
        detailKonten(id_konten);

      },

      events: 'controller/Jadwal.php',

    });

    calendar.render();
    // $('#calendar').fullCalendar()

    $('.fc-scrollgrid-sync-table').css('height', '320px')

  })
</script>