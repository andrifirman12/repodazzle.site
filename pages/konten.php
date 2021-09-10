<?php 

  date_default_timezone_set('Asia/Jakarta');
  $datetime = date('Y-m-d H:i:s');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konten Manajemen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Konten Manajemen</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="modal fade" id="modal_konten">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modal Konten</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="form_konten" action="#">
              <input type="hidden" name="dateTime" id="dateTime" value="<?= $datetime; ?>">
              <input type="hidden" name="id_admin" id="id_admin">
              <div id="crud">
                <input type="hidden" class="form-control" name="crud_data" id="crud_data" value="add">
              </div>
              <div id="div_id">
              </div>
              <input type="hidden" class="form-control" name="konten" id="konten" value="Tulis Konten Disini...">
              <div class="row">
                <div class="col-md-2 form-group">
                  <label>ID Konten</label>
                  <input type="text" class="form-control id_clr" id="id" readonly>
                </div>
                <div class="col-md-6 form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" id="judul" placeholder="Judul" required minlength="3" autocomplete="off">
                </div>
                <div class="col-md-4 form-group">
                  <label>Kategori</label>
                  <select class="form-control" id="kategori" required>
                    <option value="" disabled selected hidden>Kategori</option>
                    <option value="Promo">Promo</option>
                    <option value="Non Promo">Non Promo</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <label>Desainer</label>
                  <select class="form-control" id="desainer" required>

                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label>Status</label>
                  <select class="form-control" id="status" required>
                    <option value="" disabled selected hidden>Status</option>
                    <option value='<h5><span class="right badge badge-primary">Done</span></h5>'>Done</option>
                    <option value='<h5><span class="right badge badge-warning">Revision</span></h5>'>Revision</option>
                    <option value='<h5><span class="right badge badge-success">Uploaded</span></h5>'>Uploaded</option>
                    <option value='<h5><span class="right badge bg-purple">Working</span></h5>'>Working</option>
                    <option value='<h5><span class="right badge badge-dark">Pending</span></h5>'>Pending</option>
                  </select>
                </div>
                <div class="col-md-3 form-group">
                  <label>Tgl Upload</label>
                  <input type="date" class="form-control" id="tgl_upload" required>
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Mulai Tabel Konten -->
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
            <div class="col-md-5 form-group">
              <label>Dari Tanggal</label>
              <input type="date" class="form-control" id="tgl_start" required placeholder="Start">
            </div>

            <div class="col-md-5 form-group">
              <label>Hingga Tanggal</label>
              <input type="date" class="form-control" id="tgl_end" required>
            </div>
            <div class="col-md-1 form-group mt-auto">
              <button type="button" onclick="dataRange()" class="btn btn-block btn-primary">Apply</button>
            </div>
            <div class="col-md-1 form-group mt-auto">
              <button type="button" onclick="resetTgl()" class="btn btn-block btn-warning">Clear</button>
            </div>
          </div>

        </div>
        <!-- /.card-body -->

      </div>

      <div class="card">
        <div class="card-header">
          <h3 id="ttl_konten" class="card-title"></h3>
          <div class="card-tools">
            <div class="row">

            </div>
            <span id="btn_admin">
              <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal"
                onclick="reset(); getDesainer();" title="Add" data-target="#modal_konten">
                <i class="nav-icon far fa-plus-square mr-2"></i> Tambah Data
              </button>
            </span>
          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table id="data_tables_konten" class="table table-hover text-nowrap" role="grid"
                  aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th style="width: 40px">ID</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Desainer</th>
                      <th>Tgl Upload</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data_konten"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- Akhir Tabel Konten -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  reset = () => {
    $('.id_clr').val('')
    $('#judul').val('')
    $('#kategori').val('')
    $('#desainer').val('')
    $('#tgl_upload').val('')
    $('#status').val('')
  }

  getKonten = () => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_konten',
      },
      dataType: "json",
      success: (res) => {

        let role_user = localStorage.getItem("role_user");

        if (role_user == "Admin" || role_user == "Supervisor") {

          if (res.data.length != 0) {
            res.data.forEach((val, i) => {
              let el = `<tr>
                <td style="vertical-align:middle;">${val.id}</td>
                <td style="vertical-align:middle;">${val.judul}</td>
                <td style="vertical-align:middle;">${val.kategori}</td>
                <td style="vertical-align:middle;">${val.desainer}</td><?php ?>
                <td style="vertical-align:middle;">${val.format_tgl}</td>
                <td style="vertical-align:middle;">${val.status}</td>
                <td style="vertical-align:middle;">
                  <button class="btn btn-warning btn-sm" onclick="getKontenById('${val.id}')">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-primary" onclick="detailKonten('${val.id}')">
                    <i class="fas fa-info-circle"></i>
                  </button>
                  <button class="btn btn-sm btn-danger" onclick="deleteKonten('${val.id}', '${val.judul}')">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>`

              $('#data_konten').append(el)

            })

            $('#data_tables_konten').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": [{
                  title: 'Rekap Data Konten | Dazzle Repo',
                  text: 'PDF',
                  extend: 'pdf',
                  messageTop: `Date Printed : ${today}`,
                  exportOptions: {
                    columns: [0,1,2,3,4,5]
                  },
                },
                {
                  title: 'Rekap Data Konten | Dazzle Repo',
                  text: 'Excel',
                  extend: 'excel',
                  messageTop: `Date Printed : ${today}`,
                  exportOptions: {
                    columns: [0,1,2,3,4,5]
                  },
                },
                {
                  text: 'Pilih Kolom',
                  extend: 'colvis',
                },
              ],
              "lengthMenu": [
                [9, 20, 50, -1],
                [9, 20, 50, "All"]
              ],


            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

          } else {
            let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada Konten!</td>
                </tr>`

            $('#data_konten').append(el)
          }

        } else {

          if (res.data.length != 0) {
            res.data.forEach((val, i) => {
              let el = `<tr>
                <td style="vertical-align:middle;">${val.id}</td>
                <td style="vertical-align:middle;">${val.judul}</td>
                <td style="vertical-align:middle;">${val.kategori}</td>
                <td style="vertical-align:middle;">${val.desainer}</td><?php ?>
                <td style="vertical-align:middle;">${val.format_tgl}</td>
                <td style="vertical-align:middle;">${val.status}</td>
                <td style="vertical-align:middle;">
                  <button class="btn btn-sm btn-primary" onclick="detailKonten('${val.id}')">
                    <i class="fas fa-info-circle"></i>
                  </button>
                </td>
              </tr>`

              $('#data_konten').append(el)

            })

            $('#data_tables_konten').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "lengthMenu": [
                [9, 20, 50, -1],
                [9, 20, 50, "All"]
              ],


            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

          } else {
            let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada Konten!</td>
                </tr>`

            $('#data_konten').append(el)
          }

        }


        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_konten').empty()
          $('#ttl_konten').append(ttl)
        }
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  resetTgl = () => {

    $('#tgl_start').val('')
    $('#tgl_end').val('')

    $('#data_tables_konten').DataTable().clear().destroy();

    getKonten();

  }

  getDesainer = (kode = '') => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_desainer',
      },
      dataType: "json",
      success: (res) => {
        $('#desainer').empty()
        const optionDef = `<option value="">Pilih Desainer</option>`
        $('#desainer').append(optionDef)

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el =
              `<option value="${val.nama}">${val.nama}</option>`

            $('#desainer').append(el)
          })

          if (kode) $('#desainer').val(kode)
        } else {
          let el = `<option value=""> - Desainer tidak tersedia! - </option>`

          $('#desainer').append(el)
        }
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  insertKonten = () => {

    let formData = new FormData()

    formData.append('form', 'add_konten')
    formData.append('admin', $('#id_admin').val())
    formData.append('time', $('#dateTime').val())
    formData.append('judul', $('#judul').val())
    formData.append('kategori', $('#kategori').val())
    formData.append('desainer', $('#desainer').val())
    formData.append('tgl_upload', $('#tgl_upload').val())
    formData.append('status', $('#status').val())
    formData.append('konten', $('#konten').val())

    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: formData,
      mimeTypes: "multipart/form-data",
      contentType: false,
      processData: false,
      dataType: "json",
      success: (res) => {

        // kosongkan isi elemen tbody
        $('#data_konten').empty()
        // panggil fungsi untuk get data
        getKonten()

        reset()

        $('#modal_konten').modal('hide')

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Menambahkan Data, Data Konten telah ditambahkan'
        })

      },
      error: (err) => {
        console.log(err.message)
      }
    })
  }

  getKontenByTgl = (x, y) => {

    $('#data_tables_konten').DataTable().clear().destroy();

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        x: x,
        y: y,
        form: 'get_konten_by_tgl',
      },
      dataType: "json",
      success: (res) => {

        let role_user = localStorage.getItem("role_user");

        if (role_user == "Admin" || role_user == "Supervisor") {

          if (res.data.length != 0) {
            res.data.forEach((val, i) => {
              let el = `<tr>
        <td style="vertical-align:middle;">${val.id}</td>
        <td style="vertical-align:middle;">${val.judul}</td>
        <td style="vertical-align:middle;">${val.kategori}</td>
        <td style="vertical-align:middle;">${val.desainer}</td>
        <td style="vertical-align:middle;">${val.format_tgl}</td>
        <td style="vertical-align:middle;">${val.status}</td>
        <td style="vertical-align:middle;">
          <button class="btn btn-warning btn-sm" onclick="getKontenById('${val.id}')">
            <i class="far fa-edit"></i>
          </button>
          <button class="btn btn-sm btn-primary" onclick="detailKonten('${val.id}')">
            <i class="fas fa-info-circle"></i>
          </button>
          <button class="btn btn-sm btn-danger" onclick="deleteKonten('${val.id}', '${val.judul}')">
            <i class="far fa-trash-alt"></i>
          </button>
        </td>
      </tr>`

              $('#data_konten').append(el)

            })

            $('#data_tables_konten').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": [{
                  title: 'Rekap Data Konten | Dazzle Repo',
                  text: 'PDF',
                  extend: 'pdf',
                  messageTop: `Date Printed : ${today}`,
                  exportOptions: {
                    columns: ':visible'
                  }
                },
                {
                  title: 'Rekap Data Konten | Dazzle Repo',
                  text: 'Excel',
                  extend: 'excel',
                  messageTop: `Date Printed : ${today}`,
                  exportOptions: {
                    columns: ':visible'
                  }
                },
                {
                  text: 'Pilih Kolom',
                  extend: 'colvis',
                },
              ],
              "lengthMenu": [
                [9, 20, 50, -1],
                [9, 20, 50, "All"]
              ],


            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

          } else {
            //     let el = `<tr>
            // <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada Konten!</td>
            // </tr>`

            //     $('#data_konten').append(el)
          }

        } else {

          if (res.data.length != 0) {
            res.data.forEach((val, i) => {
              let el = `<tr>
        <td style="vertical-align:middle;">${val.id}</td>
        <td style="vertical-align:middle;">${val.judul}</td>
        <td style="vertical-align:middle;">${val.kategori}</td>
        <td style="vertical-align:middle;">${val.desainer}</td><?php ?>
        <td style="vertical-align:middle;">${val.format_tgl}</td>
        <td style="vertical-align:middle;">${val.status}</td>
        <td style="vertical-align:middle;">

          <button class="btn btn-sm btn-primary" onclick="detailKonten('${val.id}')">
            <i class="fas fa-info-circle"></i>
          </button>

        </td>
      </tr>`

              $('#data_konten').append(el)

            })

            $('#data_tables_konten').DataTable({
              "responsive": true,
              "lengthMenu": [
                [9, 20, 50, -1],
                [9, 20, 50, "All"]
              ],
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

            });

          } else {
            let el = `<tr>
        <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada Konten!</td>
        </tr>`

            $('#data_konten').append(el)
          }

        }


        if (res.total.length != 0) {
          let ttl = ` Total Data : <span class="">${res.total}</span> `
          $('#ttl_konten').empty()
          $('#ttl_konten').append(ttl)
        }
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  getKontenById = (id) => {
    
    reset() 
      
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_konten_by_id',
      },
      dataType: "json",
      success: (res) => {
        $('#modal_konten').modal('show')

        getDesainer(res.data.desainer)

        $('.id_clr').val(res.data.id)
        $('#judul').val(res.data.judul)
        $('#kategori').val(res.data.kategori)
        $('#desainer').val(res.data.desainer)
        $('#tgl_upload').val(res.data.tgl_upload)
        $('#status').val(res.data.status)
        $('#konten').val(res.data.konten)


        let elId =
          `<input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="${res.data.id}">`
        let elCr = `<input type="hidden" id="crud_data" value="edit">`

        $('#div_id').empty()
        $('#div_id').append(elId)
        $('#crud').empty()
        $('#crud').append(elCr)
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  updateKonten = () => {
    let formData = new FormData()

    formData.append('form', 'edit_konten')
    formData.append('admin', $('#id_admin').val())
    formData.append('time', $('#dateTime').val())
    formData.append('id', $('#id').val())
    formData.append('judul', $('#judul').val())
    formData.append('kategori', $('#kategori').val())
    formData.append('desainer', $('#desainer').val())
    formData.append('tgl_upload', $('#tgl_upload').val())
    formData.append('status', $('#status').val())
    formData.append('konten', $('#konten').val())

    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: formData,
      mimeTypes: "multipart/form-data",
      contentType: false,
      processData: false,
      dataType: "json",
      success: (res) => {

        // kosongkan isi elemen tbody
        $('#data_konten').empty()

        // panggil fungsi untuk get data
        getKonten()

        // tutup modal
        $('#modal_konten').modal('hide')

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Mengubah Data, Data Konten telah diupdate'
        })

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  deleteKonten = (id, judul) => {

    var datetime = document.getElementById("dateTime").value;

    Swal.fire({
      toast: true,
      icon: 'question',
      title: 'Apakah Anda Yakin Ingin Menghapus Data Yang Dipilih ?',
      position: 'top-end',
      showConfirmButton: true,
      timer: 3000
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: 'controller/Ajax.php',
          data: {
            id: id,
            judul: judul,
            time: datetime,
            admin: localStorage.getItem('id_user'),
            form: 'delete_konten',
          },
          dataType: "json",
          success: (res) => {

            // kosongkan isi elemen tbody
            $('#data_konten').empty()

            $('#data_tables_konten').DataTable().clear().destroy();

            // panggil fungsi untuk get data
            getKonten()

            Toast.fire({
              icon: 'success',
              title: 'Berhasil Menghapus Data, Data Konten telah dihapus'
            })

          },
          error: (err) => {
            console.log(err)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Menghapus Data, Data Konten telah dihapus'
        })
      }
    })

  }

  search = (text) => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        keyword: text,
        form: 'search_konten',
      },
      dataType: "json",
      success: (res) => {
        $('#data_konten').empty()
        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
                <td style="vertical-align:middle;">${val.id}</td>
                <td style="vertical-align:middle;">${val.judul}</td>
                <td style="vertical-align:middle;">${val.kategori}</td>
                <td style="vertical-align:middle;">${val.desainer}</td><?php ?>
                <td style="vertical-align:middle;">${val.format_tgl}</td>
                <td style="vertical-align:middle;">${val.status}</td>
                <td style="vertical-align:middle;">
                  <button class="btn btn-warning btn-sm" onclick="getKontenById('${val.id}')">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-primary" onclick="">
                    <i class="fas fa-info-circle"></i>
                  </button>
                  <button class="btn btn-sm btn-danger" onclick="deleteKonten('${val.id}', '${val.judul}')">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>`

            $('#data_konten').append(el)
          })
        } else {
          let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Tidak Ada Konten!</td>
							</tr>`

          $('#data_konten').append(el)
        }
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  detailKonten = (id) => {
    localStorage.id_konten = id;
    sessionStorage.id_konten = id;
    window.open('home.php?p=detail_konten', '_blank');
  }

  checkBtnAdmin = () => {

    let role_user = localStorage.getItem("role_user");

    if (role_user == "Admin" || role_user == "Supervisor") {
      document.getElementById("btn_admin").style.display = "block"
    } else {
      document.getElementById("btn_admin").style.display = "none"
    }

  }

  dataRange = () => {

    var tgl_x = document.getElementById("tgl_start").value;
    var tgl_y = document.getElementById("tgl_end").value;

    getKontenByTgl(tgl_x, tgl_y);

  }

  $(document).ready(() => {
    // panggil fungsi ini
    getKonten()

    var id_admin = localStorage.getItem('id_user')
    document.getElementById("id_admin").value = id_admin;

    checkBtnAdmin()
    // ambil event ketika form di submit
    $('#form_konten').on('submit', (e) => {
      e.preventDefault()

      let crud = $('#crud_data').val()

      if (crud == 'add') {

        if ($.fn.DataTable.isDataTable('#data_tables_konten')) {
          $('#data_tables_konten').DataTable().clear().destroy();
          insertKonten()
          reset()

        } else {
          insertKonten()
          reset()

        }

      } else if (crud == 'edit') {

        $('#data_tables_konten').DataTable().clear().destroy();
        // panggil fungsi update
        updateKonten()
        reset()

      }


    })



  })
</script>