<?php 

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

    <!-- Mulai Tabel Konten -->
    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="preview-tab" data-toggle="pill" href="#preview" role="tab"
                aria-controls="preview" aria-selected="true">Preview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="chat-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat"
                aria-selected="false">Komentar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="info-tab" data-toggle="pill" href="#info" role="tab" aria-controls="info"
                aria-selected="false">Info</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade active show" id="preview" role="tabpanel" aria-labelledby="preview-tab">

              <div class="card card-primary" style="display: flex; flex-direction: row;">
                <div class="card-body">
                  <div id="div_gambar" class="row">
                  </div>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-sm-12">
                  <div id="dropzone">
                    <form action="Controller/Ajax.php" class="dropzone" id="desainform">
                      <input type="hidden" name="id_k" id="id_k" class="id_k">
                      <input type="hidden" name="form" id="form" value="upload_desain">
                    </form>
                  </div>

                  <!-- <form action="" class="dropzone" id="desainform">
                    <div class="fallback">
                      <input name="file" type="file" multiple />
                    </div>
                    <input type="hidden" name="form" id="form" value="upload_desain">
                    <input type="hidden" name="id_k" id="id_k" class="id_k">
                  </form> -->
                </div>
              </div>

            </div>

            <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab" height="200px;">

              <div class="card-footer card-comments" id="komen" style="height: 350px; overflow-y: auto; ">
                <div id="div_komentar">
                </div>
              </div>

              <div class="card-footer">
                <form action="#" id="form_komentar">
                  <div class="img-push">
                    <input type="hidden" name="id_konten" id="id_konten">
                    <input type="hidden" name="id_user" id="id_user">
                    <input type="hidden" name="waktu" id="waktu" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="text" name="komentar" id="komentar" class="form-control form-control-sm"
                      placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>

            </div>

            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">

              <div class="modal-body">

                <form id="form_konten" action="#">

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
                      <input type="text" class="form-control" id="judul" placeholder="Judul" required>
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
                        <option value='<h5><span class="right badge badge-success">Done</span></h5>'>Done</option>
                        <option value='<h5><span class="right badge badge-warning">Revision</span></h5>'>Revision
                        </option>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="refresh();">Save changes</button>
              </div>
              </form>

            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Akhir Tabel Konten -->

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

  refresh = () => {

    var id_konten = sessionStorage.getItem("id_konten");
    getKontenById(id_konten)

  }

  bottom_chat = () => {
    let chatList = document.getElementById("komen")
    chatList.scrollTop = chatList.scrollHeight
  }

  $(function () {

    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
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

        if (res.data.length != 0) {
          res.data.forEach((val, i) => {
            let el = `
                    <div class="col-sm-3">
                      <button type="button" class="btn btn-danger btn-group-sm float-right" onclick="deleteGambar('${val.id}', '${val.gambar}')"><i class="fas fa-times"></i></button>
                      <a href="${val.gambar}" data-toggle="lightbox" data-title=""
                        data-gallery="gallery">
                        <img src="${val.gambar}" class="img-fluid mb-2" alt="white sample">
                      </a>
                    </div>`

            $('#div_gambar').append(el)

          })

        } else {
          let el = `<div class="m-auto"> <h5> <i class="far fa-images mr-2"></i> Belum Ada Desain</h5> </div>`

          $('#div_gambar').append(el)
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
          let el = `<div class="m-auto">

          <h5 class="mt-3" style="text-align:center;"><i class="mr-2 far fa-comment-dots"></i>Tidak Ada Komentar</h5>
                  
                </div>`

          $('#div_komentar').append(el)
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


        // panggil fungsi untuk get data
        getKomentarById()

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

  insertDesain = () => {

    let formData = new FormData()

    formData.append('form', 'upload_desain')
    formData.append('image', $('#desainform')[0].files[0])
    formData.append('id_konten', $('#id_konten').val())
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

        getKontenGambar(id_konten)


      },
      error: (err) => {
        console.log(err.message)
      }
    })
  }

  $(document).ready(() => {

    Dropzone.options.desainform = {
      dictDefaultMessage: "Haloo...",
      acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
      init: function () {
        myDropzone = this;
        myDropzone.processQueue();

        this.on("complete", function () {
          if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
            var _this = this;
            _this.removeAllFiles();
          }
          list_image();
        });
      },
    };

    var id_konten = sessionStorage.getItem("id_konten");

    document.getElementById("id_konten").value = id_konten;
    document.getElementById("id_k").value = id_konten;

    var id_user = sessionStorage.getItem("id_user");
    document.getElementById("id_user").value = id_user;

    getKontenGambar(id_konten)
    getKontenById(id_konten)
    getKomentarById(id_konten)

    $('#konten').summernote({
      tabsize: 2,
      minHeight: 350
    });

    // ambil event ketika form di submit
    $('#form_konten').on('submit', (e) => {
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

  })
</script>