<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Official Dazzle Instagram</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Dazzle's Instagram</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <!-- Mulai Tabel Konten -->
      <div class="col-12">

         <div class="modal fade" id="modal_ig">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Instagram</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">

                     <form id="form_ig" action="#">
                        <div id="crud">
                           <input type="hidden" class="form-control" name="crud_data" id="crud_data" value="add">
                        </div>
                        <div id="div_id">
                        </div>
                        <div class="row">
                           <div class="col-md-2 form-group">
                              <label>IG Username</label>
                              <input type="text" class="form-control" id="ig_username" placeholder="Username" required>
                           </div>
                           <div class="col-md-2 form-group">
                              <label>IG Password</label>
                              <input type="text" class="form-control" id="ig_password" placeholder="Password" required>
                           </div>
                           <div class="col-md-2 form-group">
                              <label>Status</label>
                              <select class="form-control" id="status" required>
                                 <option value="" disabled selected hidden>Status</option>
                                 <option value="Digunakan">Digunakan</option>
                                 <option value="Tidak Digunakan">Tidak Digunakan</option>
                              </select>
                           </div>
                           <div class="col-md-6 form-group">
                              <label>Access Token</label>
                              <input type="text" class="form-control" id="access_token" placeholder="Access Token"
                                 required>
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

         <div class="row">
            <input type="hidden" class="form-control" name="act_tkn" id="act_tkn">
            <div class="col-md-12">

               <div class="card" id="ig">
                  <div class="card-header">
                     <h3 id="ttl_konten" class="card-title"></h3>
                     <div class="card-tools">
                        <div class="row">

                        </div>
                        <a href="home.php?p=ig_dazzle" id="r5">
                           <button type="button" onclick="getActiveIG()" class="btn btn-sm btn-primary mr-2">
                              <i class="nav-icon fas fa-sync-alt"></i>
                           </button>
                        </a>
                        <span id="btn_admin">
                           <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal"
                              onclick="reset();" title="Add" data-target="#modal_ig">
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
                              <table id="data_tables_ig" class="table table-hover text-nowrap" role="grid"
                                 aria-describedby="example2_info">
                                 <thead>
                                    <tr role="row">
                                       <th style="width: 40px">Username</th>
                                       <th>Password</th>
                                       <th>Status</th>
                                       <th>Access Token</th>
                                       <th>Aksi</th>
                                    </tr>
                                 </thead>
                                 <tbody id="data_ig"></tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->

               </div>

               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Lastest Post Instagram</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body m-auto">


                     <!-- BEGIN - Show Instagram -->
                     <div id="instafeed" class="instagram-gallery-medium ml-1"></div>
                     <!-- END - Show Instagram -->

                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
               </div>

            </div>
         </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- BEGIN - FC Instagram - Script -->
<script src="assets/plugins/instagram/shared/js/FCInstagram.js"></script>
<script type="text/javascript" src="assets/plugins/instagram/shared/js/base.js"></script>
<script type="text/javascript" src="assets/plugins/instagram/shared/js/clipboard.min.js"></script>
<script type="text/javascript" src="assets/plugins/instagram/shared/js/common.js"></script>
<script type="text/javascript" src="assets/plugins/instagram/shared/js/FCInstagram.js"></script>

<script>
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });

   function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();

      Toast.fire({
         icon: 'success',
         title: 'Berhasil Menyalin Access Token, Jaga Kerahasiaan Access Token'
      })

   }

   reset = () => {
      $('.id_clr').val('')
      $('#ig_username').val('')
      $('#ig_password').val('')
      $('#access_token').val('')
      $('#status').val('')
   }

   checkRoleUser = () => {

      let role_user = localStorage.getItem("role_user");

      if (role_user == "Admin" || role_user == "Supervisor" || role_user == "Admin Sosial Media") {
         $('#ig').css("display", "block")
      } else {
         $('#ig').css("display", "none")
      }

   }


   getIG = () => {
      $.ajax({
         type: 'GET',
         url: 'controller/Ajax.php',
         data: {
            form: 'get_ig_info',
         },
         dataType: "json",
         success: (res) => {

            if (res.data.length != 0) {
               res.data.forEach((val, i) => {
                  let el = `<tr>
                <td>${val.ig_username}</td>
                <td>${val.ig_password}</td>
                <td>${val.status}</td>
                <td> <p style="display:none;" id="acc_tkn${i}">${val.access_token}</p>
                <button class="btn btn-info" onclick="copyToClipboard('#acc_tkn${i}')">Salin</button>
                </td>
                <td>
                <button class="btn btn-warning btn-sm" onclick="getIGById('${val.id}')">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger" onclick="deleteIG('${val.id}')">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>`

                  $('#data_ig').append(el)

               })

               $('#data_tables_ig').DataTable({
                  "searching": false,
                  "responsive": true,
                  "lengthChange": false,
                  "autoWidth": false,
                  "lengthMenu": [
                     [9, 20, 50, -1],
                     [9, 20, 50, "All"]
                  ],


               })

            } else {
               let el = `<tr>
                <td colspan="5" style="vertical-align:middle; text-align:center;">Belum Ada Instagram !</td>
                </tr>`

               $('#data_ig').append(el)
            }

         },
         error: (err) => {
            console.log(err)
         }
      })
   }
   
   errorIG = () => {
       Toast.fire({
          icon: 'error',
          title: 'Access Token Salah, Periksa Kembali Access Token'
        })
   }

   insertIG = () => {

      let formData = new FormData()

      formData.append('form', 'add_ig')
      formData.append('ig_username', $('#ig_username').val())
      formData.append('ig_password', $('#ig_password').val())
      formData.append('status', $('#status').val())
      formData.append('access_token', $('#access_token').val())

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
            $('#data_ig').empty()
            // panggil fungsi untuk get data

            $('#data_tables_ig').DataTable().clear().destroy();

            getIG()

            reset()

            $('#modal_ig').modal('hide')

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

   getIGById = (id) => {
      $.ajax({
         type: 'GET',
         url: 'controller/Ajax.php',
         data: {
            id: id,
            form: 'get_ig_by_id',
         },
         dataType: "json",
         success: (res) => {
            $('#modal_ig').modal('show')

            $('#ig_username').val(res.data.ig_username)
            $('#ig_password').val(res.data.ig_password)
            $('#access_token').val(res.data.access_token)
            $('#status').val(res.data.status)

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

   updateIG = () => {

      $('#data_tables_ig').DataTable().clear().destroy();

      let formData = new FormData()

      formData.append('form', 'edit_ig')
      formData.append('id', $('#id').val())
      formData.append('ig_username', $('#ig_username').val())
      formData.append('ig_password', $('#ig_password').val())
      formData.append('status', $('#status').val())
      formData.append('access_token', $('#access_token').val())

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
            $('#data_ig').empty()

            // panggil fungsi untuk get data
            getIG()

            // tutup modal
            $('#modal_ig').modal('hide')


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

   deleteIG = (id) => {

      Swal.fire({
         toast: true,
         icon: 'question',
         title: 'Apakah Anda Yakin Ingin Menghapus Data Yang Dipilih ?',
         position: 'top-end',
         showConfirmButton: true,
         timer: 3000
      }).then((result) => {

         $('#data_tables_ig').DataTable().clear().destroy();

         if (result.isConfirmed) {
            $.ajax({
               type: 'POST',
               url: 'controller/Ajax.php',
               data: {
                  id: id,
                  form: 'delete_ig',
               },
               dataType: "json",
               success: (res) => {

                  // kosongkan isi elemen tbody
                  $('#data_ig').empty()

                  getIG()

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

   var at = localStorage.getItem("act_tkn");

   $(document).ready(() => {

      checkRoleUser()

      getIG()
      getActiveIG()

      

      $('#form_ig').on('submit', (e) => {
         e.preventDefault()

         let crud = $('#crud_data').val()

         if (crud == 'add') {

            insertIG()
            reset()

         } else if (crud == 'edit') {

            updateIG()
            reset()

         }

      })

   })

   jQuery.fn.FCInstagram.accessData = {
      accessToken: `${at}`, // Token
   };

      $('#instafeed').FCInstagram({
      max: 18, // A number between 1 and 25 of photos to show. Default: 9
      autoplay: true, // Set autoplay video: true/false. Default: false
      complete: function () { // A callback function to execute after the display of the photos.
         console.log('completed');
      }
   });
</script>

</body>

</html>