<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title title-card">
            Data <?= $title ?>
          </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" id="btn-tambah"><span class="fa fa-plus"></span> Add Data</button>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dt-kategori" class="table table-bordered table-responsive table-striped">
            <thead>
              <tr>
                <th width="1%">No.</th>
                <th width="5%">Ikon</th>
                <th>Nama Tugas</th>
                <th>Status</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

<div class="modal fade" id="modal-form">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">
        <form id="form">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="nama_tugas">Judul Cara Order</label>
                <input type="text" class="form-control" name="nama_tugas" id="nama_tugas">
                <input type="hidden" name="id_tugas" id="id_tugas">
                <span class="nama_tugas_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="deskripsi_singkat">Deskripsi</label>
                <textarea name="deskripsi_singkat" id="deskripsi_singkat" class="form-control"></textarea>
                <span class="deskripsi_singkat_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="urutan">Urutan</label>
                <input type="number" min="0" max="10" class="form-control" name="urutan" id="urutan">
                <span class="urutan_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <div id="show-gambar"></div>
                <input type="file" class="form-control" name="gambar" id="gambar">
                <span class="gambar_error text-danger"></span>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    loadProduct()
    aksi = "";
  })
  function loadProduct()
  {
    dt = $("#dt-kategori").DataTable({
      "lengthChange": true, 
      "responsive":true,
      "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //   "processing": true,
        // "serverSide": true,

        "processing": true,
        "serverSide": true,
        "destroy":true,
        "ajax": {
          "url":base_url+"cms/get-data-tugas",
          "type": "POST",
        },
        "columnDefs": [
        {
          targets : [-1,0],
          orderable: false
        },
        {
          targets : [-1,0,3,4],
          class: 'text-nowrap text-center'
        },
        ],
        "order" : [],
      })

  }



  $('#btn-tambah').click(function(){
    aksi = 'tambah';
    $('#form')[0].reset()
    $('#modal-form').modal('show')
    $('.modal-title').text('Add Category')
    $('.text-danger').empty()
    $('.is-invalid').removeClass('is-invalid')
    $('.is-valid').removeClass('is-valid')
    $("#show-gambar").html("")
  })

  
  $('.btn-submit').click(function(e){
    e.preventDefault('submit')
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url:base_url+'cms/save-tugas/'+aksi,
      dataType:'json',
      type:'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: (response) =>{

        if (response.status) {
          sukses(response.alert);
          $('#modal-form').modal('hide')
          dt.ajax.reload()
        }else{
          var error = response.error
          $.each(error, function(key, value) {

              $('.' + key + '_error').html(value.length > 0 ? `<i class="fa fa-exclamation"> ${value}</i>` : value)
              $('#' + key).removeClass('is-invalid').addClass(value.length > 0 ? 'is-invalid' : 'is-valid').find('.text-danger').remove()
            })
        }

      }
    })
  })

  function ButtonEdit(id)
  {
    aksi = 'ubah'
    // $('#form')[0].reset()
    $('#form')[0].reset()
    
    $('.text-danger').empty()
    $('.is-invalid').removeClass('is-invalid')
    $('.is-valid').removeClass('is-valid')
    $('#modal-form').modal('show')
    $('.modal-title').text('Edit Category')
    $.ajax({
      url:base_url+'cms/get-data-tugas/'+id,
      dataType:'json',
      success: (response) => {
        $.each(response.data, function(key, value) {
          if (key == 'gambar') {
            $("#show-gambar").html(`<img src="${base_url}uploads/tugas/${value}" width="150px" alt="Gambar ${response.data.judul_tugas}">`);
          }else{
            $('#'+key).val(value)
          }
        })
      }
    })
  }

  function UpdateStatus(id)
  {
      $.ajax({
        url:base_url+'cms/update-status-tugas/'+id,
        type:'post',
        dataType:'json',
        success: (response) => {
          sukses(response.alert);
          dt.ajax.reload()
        }
      })
  }

  function ButtonDelete(id)
  {
    Swal.fire({ 
      title: "Are you sure you want to delete data?", 
      text: "Deleted data cannot be recovered!!", 
      icon: "warning", 
      showCancelButton: !0, 
      confirmButtonColor: "#DD6B55", 
      confirmButtonText: "Yes, Deleted!!", 
      closeOnConfirm: !1 
    }).then((result) => {
      if (result.value) {
          $.ajax({
            url:base_url+'cms/delete-tugas/'+id,
            type:'post',
            dataType:'json',
            success: (response) => {
              sukses(response.alert);
              dt.ajax.reload()
            }
          })
      }
    })
  }
</script>