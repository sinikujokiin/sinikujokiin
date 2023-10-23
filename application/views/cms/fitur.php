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
                <th width="5%">Gambar</th>
                <th>Nama Fitur</th>
                <th>Link</th>
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
                <label for="nama_fitur">Nama Fitur</label>
                <input type="text" class="form-control" name="nama_fitur" id="nama_fitur">
                <input type="hidden" name="id_fitur" id="id_fitur">
                <span class="nama_fitur_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="deskripsi_singkat">Deskripsi SIngkat</label>
                <input type="text" class="form-control" name="deskripsi_singkat" id="deskripsi_singkat">
                <span class="deskripsi_singkat_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                <span class="deskripsi_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control"  id="link" placeholder="link">
                <div id="preview-link"></div>
                <span class="link_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="ikon">Ikon Tugas</label>
                <div id="preview-ikon"></div>
                <input type="text" name="ikon" class="form-control"  id="ikon" placeholder="fa fa-home">
                <!-- <input type="file" name="ikon" class="form-control" accept="image/*" id="ikon"> -->
                <span class="ikon_error text-danger"></span>
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
  $("#ikon").keyup(()=>{
    var ikon = $("#ikon").val()
    console.log(ikon)
    $("#preview-ikon").html(`<span class="${ikon} fa-5x"></span>`)
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
          "url":base_url+"cms/get-data-fitur",
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
    $("#preview-ikon").html("")
    $("#preview-link").html("")
  })

  
  $('.btn-submit').click(function(e){
    e.preventDefault('submit')
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url:base_url+'cms/save-fitur/'+aksi,
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
      url:base_url+'cms/get-data-fitur/'+id,
      dataType:'json',
      success: (response) => {
        $.each(response.data, function(key, value) {
          if (key == 'ikon') {
            $("#preview-ikon").html(`<span class="${value} fa-5x"></span>`);
            $('#'+key).val(value).trigger('change')
          }else if(key == 'link'){
            if (value) {
              $("#preview-link").html(`<a href="${value}" title="Kunjungi Link">Kunjungi Link</a>`);
              $('#'+key).val(value).trigger('change')
            }
          }else{
            $('#'+key).val(value).trigger('change')
          }
        })
      }
    })
  }

  function UpdateStatus(id)
  {
      $.ajax({
        url:base_url+'cms/update-status-fitur/'+id,
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
            url:base_url+'cms/delete-fitur/'+id,
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