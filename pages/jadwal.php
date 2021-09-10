<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Calendar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Calendar</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body p-0">
              <!-- THE CALENDAR -->
              <div id="calendar" style="padding: 25px;"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  detailKonten = (id) => {
    sessionStorage.id_konten = id;
    window.location.href = "home.php?p=detail_konten";
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



  $(document).ready(() => {
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
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
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

  })
</script>