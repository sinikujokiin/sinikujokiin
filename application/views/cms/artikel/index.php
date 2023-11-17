<?php $userData = $this->session->userdata('userData'); ?>
<link rel="stylesheet" href="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.css">
<script src="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title title-card">
            Data <?= $title ?>
          </h3>
          <div class="card-tools">
            <a href="<?= base_url("cms/list-artikel/add") ?>" class="btn btn-primary btn-sm" title="Add Article"><span class="fa fa-plus"></span> Add Article</a>
            <!-- <button type="button" class="btn btn-primary btn-sm" id="btn-tambah"><span class="fa fa-plus"></span> Add Data</button> -->
           
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dt-menu-artikel" class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>No.</th>
                <th width="5%">Image</th>
                <th>Title</th>
                <?php if ($userData['role_id'] == 1): ?>
                <th>Created By</th>
                  
                <?php endif ?>
                <th>Created Date</th>
                <th>Last Modified</th>
                <th width="1%">Status</th>
                <th>Action</th>
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



<script>
  $(document).ready(function(){
      loadArticle()
      aksi = "";
    })

  $('#content').summernote({
    height:'200px',
    toolbar: [
        // ['headline', ['style']],
        ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
        ['textsize', ['fontsize']],
        ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
    ]
  })

  $("#penulis, #publish").change(function(){
    loadArticle()
  })

  function loadArticle()
  {
      var penulis = $("#penulis").val()
      var publish = $("#publish").val()
        dt = $("#dt-menu-artikel").DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //   "processing": true,
        // "serverSide": true,

          "processing": true,
          "serverSide": true,
          "destroy":true,
          "ajax": {
              "url":base_url+"cms/get-data-artikel",
              "type": "POST",
              "data":{
                penulis:penulis,
                publish:publish,
              }
          },
          "columnDefs": [
          {
              targets : [-1,0],
              orderable: false
          },
          {
              targets : [-1,0, 4,5],
              class: 'text-nowrap text-center'
          }
          ],
          "order" : [],
        })

  }

  $("#status").change(function(){
    var status = $(this).prop('checked'); 
    if (status) {
      $(".custom-control-label").text('Active')
    }else{
      $(".custom-control-label").text('Non Active')
    }
  })


  $('#btn-tambah').click(function(){
    aksi = 'tambah';
    $('#form')[0].reset()
    $('#modal-form').modal('show')
    $('.modal-title').text('Add Article')
    $('.text-danger').empty()
    $('.is-invalid').removeClass('is-invalid')
    $('.is-valid').removeClass('is-valid')
    $(".custom-control-label").text('Non Active')
    $("#show-image").html('')
      $('#content').summernote('code',"");

  })

  
  $('.btn-submit').click(function(e){
    e.preventDefault('submit')
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url:base_url+'cms/save-artikel/'+aksi,
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
    $('.modal-title').text('Edit Article')
    $.ajax({
      url:base_url+'cms/get-data-artikel/'+id,
      dataType:'json',
      success: (response) => {
        $.each(response.data, function(key, value) {
          if (key == 'content') {
            $('#'+key).summernote('code', value);

          }else if (key == 'image') {
            $("#show-image").html(`
              <a href="javascript:;" onclick="showImage(this)" data-status="detail" data-image="${site_url}/image/artikel/${value}" title="Image ${response.data.title}">Click To See Image</a>
              `);
          }else if (key == 'status') {
            $('#'+key).prop('checked', value == 'Active' ? true : false )
            $(".custom-control-label").text(value)
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
      title: 'Notes',
      input: 'textarea',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: (cek) => {
        if (cek == '') {
            Swal.showValidationMessage(
              `Notes Harap diisi`
            )
        }else{
          return cek;
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((respon) => {
      if (respon.isConfirmed) {
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
                url:base_url+'cms/delete-artikel/'+id,
                type:'post',
                dataType:'json',
                data:{
                  note:respon.value
                },
                success: (response) => {
                  sukses(response.alert);
                  dt.ajax.reload()
                }
              })
          }
        })
      }

    })
  }

  function showImage(data){
    var image = $(data).data('image')
    var status = $(data).data('status')
    $('#modal-form').modal('hide')
    $('#modal-show').modal('show')
    $(document).on('hide.bs.modal','#modal-show', function () {
      if (aksi=="ubah") {
        $('#modal-form').modal('show')
      }
    });
    if (status == undefined) {
      aksi = ''
    }
    $("#show-image").html(`<img src="${image}" alt="" width="100%" height="400px"">`)

  }

  function UpdateStatus(id)
  {
      $.ajax({
        url:base_url+'cms/update-status-artikel/'+id,
        type:'post',
        dataType:'json',
        success: (response) => {
          sukses(response.alert);
          dt.ajax.reload()
        }
      })
  }
</script>