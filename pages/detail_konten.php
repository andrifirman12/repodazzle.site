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
          <h1>Detail Konten</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="home.php?p=konten">Konten Manajemen</a></li>
            <li class="breadcrumb-item active">Detail Konten</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="col-md-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-desain-tab" data-toggle="pill"
                href="#custom-tabs-four-desain" role="tab" aria-controls="custom-tabs-four-desain"
                aria-selected="true">Desain</a>
            </li>
            <li class="nav-item" onclick="bottom_chat();">
              <a class="nav-link" id="custom-tabs-four-disscusion-tab" data-toggle="pill"
                href="#custom-tabs-four-disscusion" role="tab" aria-controls="custom-tabs-four-disscusion"
                aria-selected="false">Disscusion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-info-tab" data-toggle="pill" href="#custom-tabs-four-info"
                role="tab" aria-controls="custom-tabs-four-info" aria-selected="false">Detail</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-four-desain" role="tabpanel"
              aria-labelledby="custom-tabs-four-home-tab">

              <div class="card">

                <div id="div_btn_download">
                </div>

                <div class="card-body">
                  <div id="div_gambar" class="row" style="display: flex; flex-direction: row;">
                  </div>
                </div>
              </div>

              <div id="fud">
                <form action="controller/Ajax.php" class="dropzone" id="dropzoneFrom">
                  <input type="hidden" name="id_k" id="id_k" class="id_k">
                  <input type="hidden" name="form" id="form" value="upload_desain">
                  <input type="hidden" name="dateTime" id="dateTime" value="<?= $datetime; ?>">
                  <input type="hidden" name="id_admin" id="id_admin">
                  <input type="hidden" name="jdl" id="jdl">
                  <input type="hidden" name="nama_user" id="nama_user">
                </form>
                </form>
              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-disscusion" role="tabpanel"
              aria-labelledby="custom-tabs-four-disscusion-tab">

              <div class="card-footer card-comments" id="komen" style="max-height: 350px; overflow-y: auto; ">
                <div id="div_komentar">
                </div>
              </div>

              <div class="card-footer">
                <form action="#" id="form_komentar">
                  <div class="img-push">
                    <input type="hidden" name="dateTime" id="dateTime">
                    <input type="hidden" name="id_admin" id="id_admin">
                    <input type="hidden" name="id_konten" id="id_konten">
                    <input type="hidden" name="id_user" id="id_user">
                    <input type="hidden" name="waktu" id="waktu" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="text" name="komentar" id="komentar" class="form-control form-control-sm"
                      placeholder="Press enter to post comment" autocomplete="off">
                  </div>
                </form>
              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-info" role="tabpanel"
              aria-labelledby="custom-tabs-four-info-tab">

              <div class="modal-body">

                <form id="form_konten_detail" action="#">
                  <fieldset id="fd">
                    <div id="crud">
                      <input type="hidden" class="form-control" name="crud_data" id="crud_data" value="add">
                    </div>
                    <div id="div_id">
                    </div>

                    <div class="row">
                      <div class="col-md-2 form-group">
                        <label>ID Konten</label>
                        <input type="text" class="form-control id_clr" id="id" readonly>
                      </div>
                      <div class="col-md-6 form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Judul" required autocomplete="off">
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
                          <option value='<h5><span class="right badge badge-warning">Revision</span></h5>'>Revision
                          </option>
                          <option value='<h5><span class="right badge badge-success">Uploaded</span></h5>'>Uploaded
                          </option>
                          <option value='<h5><span class="right badge bg-purple">Working</span></h5>'>Working</option>
                          <option value='<h5><span class="right badge badge-dark">Pending</span></h5>'>Pending</option>
                        </select>
                      </div>
                      <div class="col-md-3 form-group">
                        <label>Tgl Upload</label>
                        <input type="date" class="form-control" id="tgl_upload" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Konten</label>
                        <textarea name="konten" id="konten"></textarea>
                      </div>
                    </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary" onclick="refresh();">Save changes</button>
              </div>
              </fieldset>
              </form>

            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="assets/plugins/jszip/jszip.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>

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

  refresh = () => {

    var id_konten = sessionStorage.getItem("id_konten");
    getKontenById(id_konten)

  }

  bottom_chat = () => {
    let chatList = document.getElementById("komen")
    chatList.scrollTop = chatList.scrollHeight
  }

  checkRoleUser = () => {

    let role_user = localStorage.getItem("role_user");

    if (role_user == "Desainer") {
      $('#desainer').attr("readonly", true);
      $('#kategori').attr("readonly", true);
      $('#judul').attr("readonly", true);
      $('#tgl_upload').attr("readonly", true);
      $("#konten").summernote("disable");
    } else if (role_user == "Pegawai Toko") {
      $('#fd').attr("disabled", "disabled");
      $("#konten").summernote("disable");
      $('#fud').css("display", "none");
    } else if (role_user == "CopyWriter") {
      $('#desainer').attr("readonly", true);
      $('#kategori').attr("readonly", true);
      $('#judul').attr("readonly", true);
      $('#tgl_upload').attr("readonly", true);
      $('#fud').css("display", "none");
    } else if (role_user == "Admin Sosial Media") {
      $('#desainer').attr("readonly", true);
      $('#kategori').attr("readonly", true);
      $('#judul').attr("readonly", true);
      $('#tgl_upload').attr("readonly", true);
      $("#konten").summernote("disable");
      $('#fud').css("display", "none");
      $('#hps_dsn').css("display", "none");
    }

  }

  getKontenGambar = (id) => {

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_konten_gambar',
      },
      dataType: "json",
      success: (res) => {
          
        let ru = localStorage.getItem('role_user')
        
        if (ru == "Admin" || ru == "Desainer" || ru == "Supervisor") {
          
          if (res.data.length != 0) {

          $('#div_btn_download').empty()
          $('#div_gambar').empty()

          var id_konten = localStorage.getItem("id_konten");

          // let btd = `
          //   <button type="button" class="btn btn-success btn-group-xs float-right mt-4" style="width:150px; margin-bottom:-20px; margin-right: 20px;" onclick="zip_desain('${id_konten}')">
          //     <i class="fas fa-times mr-1"></i>  Download All
          //     </button>`

          // $('#div_btn_download').append(btd)

          res.data.forEach((val, i) => {

            let el = `<div class="col-sm-3">
                  <div class="row" id="hps_dsn">
                    <div class="col-md-12">
                    <h6 class="">
                    <a href="${val.gambar}"  download target="_blank" rel="noopener noreferrer">` + val.gambar
              .substring(11) + `</a></h6>
              
                <button type="button" class="btn btn-danger btn-group-xs float-right" style="margin-bottom:-90px;" onclick="deleteGambar('${val.id}', '${val.gambar}')"><i class="fas fa-times"></i></button> 
              
                    </div>
                  </div>

                  <a href="${val.gambar}" data-toggle="lightbox" data-title=""
                    data-gallery="gallery">
                    <img src="${val.gambar}" class="img-fluid mb-2" alt="${val.nama}">
                  </a>
                </div>`

            $('#div_gambar').append(el)

          })

        } else {
          let el = `<div class="m-auto"> <h5> <i class="far fa-images mr-2"></i> Belum Ada Desain</h5> </div>`

          $('#div_gambar').append(el)

        }
        
        } else {
            
            if (res.data.length != 0) {

          $('#div_btn_download').empty()
          $('#div_gambar').empty()

          var id_konten = localStorage.getItem("id_konten");

          // let btd = `
          //   <button type="button" class="btn btn-success btn-group-xs float-right mt-4" style="width:150px; margin-bottom:-20px; margin-right: 20px;" onclick="zip_desain('${id_konten}')">
          //     <i class="fas fa-times mr-1"></i>  Download All
          //     </button>`

          // $('#div_btn_download').append(btd)

          res.data.forEach((val, i) => {

            let el = `<div class="col-sm-3">
                  <div class="row" id="hps_dsn">
                    <div class="col-md-12">
                    <h6 class="">
                    <a href="${val.gambar}"  download target="_blank" rel="noopener noreferrer">` + val.gambar
              .substring(11) + `</a></h6>
              
              
                    </div>
                  </div>

                  <a href="${val.gambar}" data-toggle="lightbox" data-title=""
                    data-gallery="gallery">
                    <img src="${val.gambar}" class="img-fluid mb-2" alt="${val.nama}">
                  </a>
                </div>`

            $('#div_gambar').append(el)

          })

        } else {
          let el = `<div class="m-auto"> <h5> <i class="far fa-images mr-2"></i> Belum Ada Desain</h5> </div>`

          $('#div_gambar').append(el)

        }
            
        }


      },
      error: (err) => {
        console.log(err)
      }
    })
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
          let el = `<option value="">Desainer tidak tersedia!</option>`

          $('#desainer').append(el)
        }
      },
      error: (err) => {
        let el =
              `<option value="">Desainer Kosong</option>`

            $('#desainer').append(el)
        console.log(err)
      }
    })
  }

  getKontenById = (id) => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_konten_by_id',
      },
      dataType: "json",
      success: (res) => {


        getDesainer(res.data.desainer)

        $('.id_clr').val(res.data.id)
        $('#judul').val(res.data.judul)
        $('#jdl').val(res.data.judul)
        $('#kategori').val(res.data.kategori)
        $('#desainer').val(res.data.desainer)
        $('#tgl_upload').val(res.data.tgl_upload)
        $('#status').val(res.data.status)
        $('#konten').summernote('code', res.data.konten)


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
          
        var id_konten = sessionStorage.getItem("id_konten");
        getKontenById(id_konten)

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

  getKomentarById = (id) => {
    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_komentar_by_id',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `<div class="card-comment" style="display: block;">

                  <img class="img-circle img-sm" src="${val.avatar}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      <div>${val.nama}</div>
                      <span class="text-muted float-right">${val.waktu}</span>
                    </span>
                    <div>${val.komentar}</div>
                  </div>

                </div>`


            $('#div_komentar').append(el)

            bottom_chat();
          })

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })
  }

  insertKomentar = () => {

    let formData = new FormData()

    formData.append('form', 'add_komentar')
    formData.append('admin', $('#id_admin').val())
    formData.append('judul', $('#judul').val())
    formData.append('nama_admin', $('#nama_user').val())
    formData.append('time', $('#dateTime').val())
    formData.append('id_konten', $('#id_konten').val())
    formData.append('id_user', $('#id_user').val())
    formData.append('komentar', $('#komentar').val())
    formData.append('waktu', $('#waktu').val())

    $.ajax({
      type: 'POST',
      url: 'controller/Ajax.php',
      data: formData,
      mimeTypes: "multipart/form-data",
      contentType: false,
      processData: false,
      dataType: "json",
      success: (res) => {


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


  deleteGambar = (id, file) => {

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
            id_konten: localStorage.getItem('id_konten'),
            file: file,
            judul: $('#jdl').val(),
            time: datetime,
            admin: localStorage.getItem('id_user'),
            form: 'delete_gambar',
          },
          dataType: "json",
          success: (res) => {

            $('#div_gambar').empty()
            $('#div_btn_download').empty()

            var id_konten = localStorage.getItem("id_konten");
            getKontenGambar(id_konten)

            Toast.fire({
              icon: 'success',
              title: 'Berhasil Menghapus Data, Data Konten telah dihapus'
            })

          },
          error: (err) => {
            console.log(err)
          }
        })
      }
    })
  }

  zip_desain = (id) => {

    $.ajax({
      type: 'GET',
      url: 'controller/Ajax.php',
      data: {
        id: id,
        form: 'get_konten_gambar',
      },
      dataType: "json",
      success: (res) => {

        if (res.data.length != 0) {

          var zip = new JSZip()
          res.data.forEach((val, i) => {
            zip.file(`${val.gambar.substring(11)}`, `http://localhost/dazzle/${val.gambar}`, {
              binary: true
            });
          })
          zip.generateAsync({
              type: "blob"
            })
            .then(function (content) {
              // see FileSaver.js
              saveAs(content, "example.zip");
            });

        } else {

        }

      },
      error: (err) => {
        console.log(err)
      }
    })

  }

  $(document).ready(() => {
      
    var id_konten = sessionStorage.getItem("id_konten");
    getKontenGambar(id_konten)

    checkRoleUser()

    var id_admin = localStorage.getItem('id_user')
    document.getElementById("id_admin").value = id_admin;

    var nu = localStorage.getItem('nama_user')
    document.getElementById("nama_user").value = nu;

    document.getElementById("id_konten").value = id_konten;
    document.getElementById("id_k").value = id_konten;

    var id_user = localStorage.getItem("id_user");
    document.getElementById("id_user").value = id_user;


    getKontenById(id_konten)
    getKomentarById(id_konten)

    $('#konten').summernote({
      tabsize: 1,
      minHeight: 200,
      maxHeight: 400,
      focus: true,
      fontSizes: ['10', '11', '12', '14', '16', '18', '20', '22', '24', '26', '36', '48'],
      lineHeights: ['0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
      toolbar: [
        // [groupName, [list of button]]
        ['fontname', ['fontname']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
    });

    Dropzone.options.dropzoneFrom = {
      dictDefaultMessage: "Click Or Drag Images Here",
      acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,",
      init: function () {
        myDropzone = this;
        myDropzone.processQueue();

        this.on("complete", function () {
          if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
            var _this = this;
            _this.removeAllFiles();
          }
          $('#div_gambar').empty()
          getKontenGambar(id_konten)
        });
      },
    };

    // ambil event ketika form di submit
    $('#form_konten_detail').on('submit', (e) => {
      e.preventDefault()
      // panggil fungsi update
      updateKonten()
      reset()

      getKontenById(id_konten)

    })

    $('#form_komentar').on('submit', (e) => {
      e.preventDefault()

      $('#div_komentar').empty()
      // panggil fungsi update
      insertKomentar()

      $('#komentar').val('')

      getKontenById(id_konten)
      getKomentarById(id_konten)

    })

    setInterval(() => {
      $('#div_komentar').load(`controller/RefreshChat.php?id_konten=${id_konten}`).fadeIn("slow");
    }, 2000);

  });

  $(function () {

    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true,
        alwaysShowClose: false,
      });
    });

    $('.filter-container').filterizr({
      gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>