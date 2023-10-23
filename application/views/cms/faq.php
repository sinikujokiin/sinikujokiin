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
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Status</th>
                <th>Created At</th>
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
                <label for="pertanyaan">Pertanyaan</label>
                <input type="text" class="form-control" name="pertanyaan" id="pertanyaan">
                <input type="hidden" name="id_faq" id="id_faq">
                <span class="pertanyaan_error text-danger"></span>
              </div>
              <div class="form-group">
                <label for="jawaban">Jawaban</label>
                <textarea class="form-control" name="jawaban" id="jawaban"></textarea>
                <span class="jawaban_error text-danger"></span>
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
      "lengthChange": true, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //   "processing": true,
        // "serverSide": true,

        "processing": true,
        "serverSide": true,
        "destroy":true,
        "ajax": {
          "url":base_url+"cms/get-data-faq",
          "type": "POST",
        },
        "columnDefs": [
        {
          targets : [-1,0],
          orderable: false
        },
        {
          targets : [-1,0],
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
  })

  
  $('.btn-submit').click(function(e){
    e.preventDefault('submit')
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url:base_url+'cms/save-faq/'+aksi,
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
      url:base_url+'cms/get-data-faq/'+id,
      dataType:'json',
      success: (response) => {
        $.each(response.data, function(key, value) {
          if (key == 'description_role') {
            $('textarea#'+key).val(value)
          }else{
            $('#'+key).val(value)
          }
        })
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
            url:base_url+'cms/delete-faq/'+id,
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

  function UpdateStatus(id)
  {
      $.ajax({
        url:base_url+'cms/update-status-faq/'+id,
        type:'post',
        dataType:'json',
        success: (response) => {
          sukses(response.alert);
          dt.ajax.reload()
        }
      })
  }
</script>