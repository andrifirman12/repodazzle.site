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
          <h1>User Manajemen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">User Manajemen</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="modal fade" id="modal_user">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modal User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="form_user" action="#">

              <div id="crud">
                <input type="hidden" class="form-control" name="crud_data" id="crud_data" value="add">
              </div>
              <div id="div_id">
              </div>

              <div class="row">
                <div class="col-md-2 form-group">
                  <label for="exampleInputEmail1">ID User</label>
                  <input type="text" class="form-control id_clr" id="id" readonly>
                </div>
                <div class="col-md-6 form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" autocomplete="off" autocomplete="off" required minlength="3">
                </div>
                <div class="col-md-4 form-group">
                  <label>Role</label>
                  <select class="form-control" id="role" required>
                    <option value="Pegawai Toko">Pegawai Toko</option>
                    <option value="Admin">Admin</option>
                    <option value="Desainer">Desainer</option>
                    <option value="CopyWriter">CopyWriter</option>
                    <option value="Admin Sosial Media">Admin Sosial Media</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="col-md-4 form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="avatar" accept="image/*" required>
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input type="hidden" id="imageOld" name="imageOld">
                  </div>
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

    <!-- Mulai Tabel User -->
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <!-- <h3 id="ttl_user" class="card-title"></h3> -->
          <div class="card-tools">
            <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal" onclick="resetIMG();" title="Add"
              data-target="#modal_user">
              <i class="nav-icon far fa-plus-square mr-2"></i> Tambah Data
            </button>
          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <input type="hidden" name="dateTime" id="dateTime" value="<?= $datetime; ?>">
          <input type="hidden" name="id_admin" id="id_admin">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table id="data_tables_user" class="table table-hover text-nowrap" role="grid"
                  aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th>ID</th>
                      <th>Avatar</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data_user"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- Akhir Tabel User -->

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

  $(function () {
    bsCustomFileInput.init();
  });

  checkAdmin = () => {

    let role_user = localStorage.getItem("role_user");

    if (role_user == "Admin" || role_user == "Supervisor") {
      
    } else {
      window.location.href = 'home.php'
      
    }


  }
  

  reset = () => {
    $('.id_clr').val('')
    $('#nama').val('')
    $('#email').val('')
    $('#password').val('')
    $('#role').val('')
    $('#avatar').val('')
    $('.custom-file-label').text('Choose')

    let elCr = `<input type="hidden" id="crud_data" value="add">`
    $('#crud').empty()
    $('#crud').append(elCr)

  }
  
    resetIMG = () => {
    
    $("#avatar").prop('required',true);
    $('.id_clr').val('')
    $('#nama').val('')
    $('#email').val('')
    $('#password').val('')
    $('#role').val('')
    $('#avatar').val('')
    $('.custom-file-label').text('Choose')

    let elCr = `<input type="hidden" id="crud_data" value="add">`
    $('#crud').empty()
    $('#crud').append(elCr)

  }

  getUser = () => {
      
     
    var role_admin = localStorage.getItem('role_user');
      
    if (role_admin == "Supervisor") {
        
        $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_user',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
              
              if (val.role !== "Supervisor") {
              
                                let el = `<tr>
        <td>${val.id}</td>
        <td><img src="${val.avatar}" class="img-rounded" style="width:40px; height:40px;" alt="Avatar"></td>
        <td>${val.nama}</td>
        <td>${val.email}</td>
        <td>${val.password}</td>
        <td>${val.role}</td>
        <td>
        <button class="btn btn-warning btn-sm" onclick="getUserById('${val.id}')">
          <i class="far fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="deleteUser('${val.id}', '${val.role}', '${val.avatar}')">
          <i class="far fa-trash-alt"></i>
        </button>
        </td>
        </tr>`

            $('#data_user').append(el)
            
              } else {
                  
                  let el = `<tr>
        <td>${val.id}</td>
        <td><img src="${val.avatar}" class="img-rounded" style="width:40px; height:40px;" alt="Avatar"></td>
        <td>${val.nama}</td>
        <td>${val.email}</td>
        <td>*********</td>
        <td>${val.role}</td>
        <td>
            <button class="btn btn-warning btn-sm" onclick="getUserById('${val.id}')">
                <i class="far fa-edit"></i>
            </button>
        </td>
        </tr>`

            $('#data_user').append(el)
                  
              }

          })

          $('#data_tables_user').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data User | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
                exportOptions: {
                  columns: [0,2,3,4,5]
                },
              },
              {
                title: 'Rekap Data User | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
                exportOptions: {
                  columns: [0,2,3,4,5]
                },
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
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        } else {
          let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada User!</td>
							</tr>`

          $('#data_user').append(el)
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
        
    } else {
        
        $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        form: 'get_user',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
              
              if (val.role !== "Supervisor") {
              
                                let el = `<tr>
        <td>${val.id}</td>
        <td><img src="${val.avatar}" class="img-rounded" style="width:40px; height:40px;" alt="Avatar"></td>
        <td>${val.nama}</td>
        <td>${val.email}</td>
        <td>${val.password}</td>
        <td>${val.role}</td>
        <td>
        <button class="btn btn-warning btn-sm" onclick="getUserById('${val.id}')">
          <i class="far fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="deleteUser('${val.id}', '${val.role}', '${val.avatar}')">
          <i class="far fa-trash-alt"></i>
        </button>
        </td>
        </tr>`

            $('#data_user').append(el)
            
              } else {
                  
                  let el = `<tr>
        <td>${val.id}</td>
        <td><img src="${val.avatar}" class="img-rounded" style="width:40px; height:40px;" alt="Avatar"></td>
        <td>${val.nama}</td>
        <td>${val.email}</td>
        <td>*********</td>
        <td>${val.role}</td>
        <td>
            No Action
        </td>
        </tr>`

            $('#data_user').append(el)
                  
              }

          })

          $('#data_tables_user').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                title: 'Rekap Data User | Dazzle Repo',
                text: 'PDF',
                extend: 'pdf',
                messageTop: `Date Printed : ${today}`,
                exportOptions: {
                  columns: [0,2,3,4,5]
                },
              },
              {
                title: 'Rekap Data User | Dazzle Repo',
                text: 'Excel',
                extend: 'excel',
                messageTop: `Date Printed : ${today}`,
                exportOptions: {
                  columns: [0,2,3,4,5]
                },
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
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        } else {
          let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Belum Ada User!</td>
							</tr>`

          $('#data_user').append(el)
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
  
      
  }


  insertUser = () => {

    let formData = new FormData()

    formData.append('form', 'add_user')
    formData.append('admin', $('#id_admin').val())
    formData.append('nama', $('#nama').val())
    formData.append('time', $('#dateTime').val())
    formData.append('email', $('#email').val())
    formData.append('password', $('#password').val())
    formData.append('role', $('#role').val())
    formData.append('image', $('#avatar')[0].files[0])

    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: formData,
      mimeTypes: "multipart/form-data",
      contentType: false,
      processData: false,
      dataType: "json",
      success: (res) => {

        $('#modal_user').modal('hide')

        // kosongkan isi elemen tbody
        $('#data_user').empty()

        // panggil fungsi untuk get data
        getUser()

        reset()

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Menambahkan Data, Data User telah ditambahkan'
        })

      },
      error: (err) => {
          
        $('#modal_user').modal('hide')

        // kosongkan isi elemen tbody
        $('#data_user').empty()

        // panggil fungsi untuk get data
        getUser()
        
        Toast.fire({
          icon: 'error',
          title: 'Email Sudah Terdaftar, Gunakan Email yang lain'
        })
        
      }
    })
  }

  getUserById = (id) => {
      
    $('#avatar').removeAttr('required');
    var role_admin = localStorage.getItem('role_user');
    
    $("#role option[value='Supervisor']").remove();
      
    if (role_admin == "Supervisor") { 
        
        var s= document.getElementById('role');
        s.options[s.options.length]= new Option('Supervisor', 'Supervisor');
        
    } else {
        
    }
      
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_user_by_id',
      },
      dataType: "json",
      success: (res) => {
        $('#modal_user').modal('show')

        $('.id_clr').val(res.data.id)
        $('#nama').val(res.data.nama)
        $('#email').val(res.data.email)
        $('#password').val(res.data.password)
        $('#role').val(res.data.role)
        $('.custom-file-label').text(res.data.avatar)
        $('#imageOld').val(res.data.avatar)


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

  updateUser = () => {
    let formData = new FormData()

    formData.append('form', 'edit_user')
    formData.append('id', $('#id').val())
    formData.append('admin', $('#id_admin').val())
    formData.append('time', $('#dateTime').val())
    formData.append('nama', $('#nama').val())
    formData.append('email', $('#email').val())
    formData.append('password', $('#password').val())
    formData.append('role', $('#role').val())
    formData.append('image', $('#avatar')[0].files[0])
    formData.append('image_old', $('#imageOld').val())

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
        $('#data_user').empty()

        // panggil fungsi untuk get data
        getUser()

        // tutup modal
        $('#modal_user').modal('hide')

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Mengubah Data, Data User telah diupdate'
        })

      },
      error: (err) => {
        
        $('#modal_user').modal('hide')

        // kosongkan isi elemen tbody
        $('#data_user').empty()

        // panggil fungsi untuk get data
        getUser()
        
        Toast.fire({
          icon: 'error',
          title: 'Email Sudah Terdaftar, Gunakan Email yang lain'
        })
        
      }
    })
  }

  deleteUser = (id, role, avatar) => {

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
        $('#data_tables_user').DataTable().clear().destroy();


    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        role: role,
        avatar: avatar,
        time: datetime,
        admin: localStorage.getItem('id_user'),
        form: 'delete_user',
      },
      dataType: "json",
      success: (res) => {

        // kosongkan isi elemen tbody
        $('#data_user').empty()

        // panggil fungsi untuk get data
        $('#data_tables_user').DataTable().clear().destroy();
        getUser()

        Toast.fire({
          icon: 'success',
          title: 'Berhasil Menghapus Data, Data User telah dihapus'
        })

      },
      error: (err) => {
        console.log(err)
      }
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
        form: 'search_user',
      },
      dataType: "json",
      success: (res) => {
        $('#data_user').empty()
        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<tr>
        <td>${val.id}</td>
        <td><img src="${val.avatar}" class="img-rounded" style="width:40px; height:40px;" alt="Avatar"></td>
        <td>${val.nama}</td>
        <td>${val.email}</td>
        <td>${val.password}</td>
        <td>${val.role}</td>
        <td>
          <button class="btn btn-warning btn-sm" onclick="getUserById('${val.id}')" title="Edit">
          <i class="far fa-edit"></i>
          </button>
          <button class="btn btn-sm btn-danger" onclick="deleteUser('${val.id}', '${val.avatar}')">
          <i class="far fa-trash-alt"></i>
          </button>
        </td>
        </tr>`

            $('#data_user').append(el)
          })
        } else {
          let el = `<tr>
                <td colspan="7" style="vertical-align:middle; text-align:center;">Tidak Ada User!</td>
							</tr>`

          $('#data_user').append(el)
        }
      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  $(document).ready(() => {

    var id_admin = localStorage.getItem('id_user')
    document.getElementById("id_admin").value = id_admin;

    checkAdmin()
    // panggil fungsi ini
    getUser()
    // ambil event ketika form di submit
    $('#form_user').on('submit', (e) => {
      e.preventDefault()

      let crud = $('#crud_data').val()

      if (crud == 'add') {
        // panggil fungsi insert

        if ($.fn.DataTable.isDataTable('#data_tables_user')) {
          $('#data_tables_user').DataTable().clear().destroy();
          insertUser()
          reset()
        } else {
          insertUser()
          reset()
        }

      } else if (crud == 'edit') {

        $('#data_tables_user').DataTable().clear().destroy();

        // panggil fungsi update
        updateUser()
        reset()

      }
    })

    // search
    $('#keyword').on('keyup', (e) => {
      search(e.target.value)
    })

  })
</script>
