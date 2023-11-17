
<div class="contaner-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title title-card">
				    <?= $title ?>
				  </h3>
				</div>
	        <form id="form">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
					    <div class="form-group">
					      <label for="ikon">Ikon Tugas</label>
                <div id="preview-ikon" class="mb-3"></div>
					      <input type="text" name="ikon" class="form-control"  id="ikon" placeholder="fa fa-home">
					      <!-- <input type="file" name="ikon" class="form-control" accept="image/*" id="ikon"> -->
					      <span class="ikon_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
					    <div class="form-group">
					      <label for="nama_tugas">Nama Tugas</label>
					      <input type="text" name="nama_tugas" class="form-control" id="nama_tugas" placeholder="nama tugas">
					      <span class="nama_tugas_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
					    <div class="form-group">
					      <label for="title">Deskripsi Singkat</label>
					      <textarea name="deskripsi_singkat" id="deskripsi_singkat" placeholder="deskripsi singkat" class="form-control"></textarea>
					      <span class="deskripsi_singkat_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
					    
					    <div class="form-group">
					      <label for="deskripsi">Deskripsi</label>
					      <textarea name="deskripsi" id="deskripsi" placeholder="deskripsi lengkap" class="form-control"></textarea>
					      <span class="deskripsi_error text-danger"></span><br>
					      <small><b>Word Count : </b><b id="sum-count"></b></small>
					    </div>
					  </div>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url($this->uri->segment(1).'/'.$this->uri->segment(2)); ?>" class="btn btn-secondary" title="Back To List">Back</a>
					<button type="button" class="btn btn-primary btn-submit" id="btn-submit" data-draft="false">Submit</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.css">

<script src="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.js"></script>

<script>
	$("#ikon").keyup(()=>{
		var ikon = $("#ikon").val()
		console.log(ikon)
		$("#preview-ikon").html(`<span class="${ikon} fa-5x"></span>`)
	})

	$('#deskripsi').summernote({
	  height: "300px",
	  // toolbar:[
	  // 	['style', ['undo','redo', 'bold', 'italic', 'underline', 'clear']],
	  // 	['font', ['strikethrough', 'superscript', 'subscript']],
	  // 	['fontsize', ['fontname','fontsize']],
	  // 	['color', ['color']],
	  // 	['para', ['ul', 'ol', 'paragraph']],
	  // 	['height', ['height']],
	  // 	['insert', ['picture', 'link', 'video', 'table', 'hr']],
	  // 	['misc', ['fullscreen']]
	  // ],
	    callbacks: {
	          onImageUpload: function(image) {
	              uploadImage(image[0]);
	          },
	          onMediaDelete : function(target) {
	              deleteImage(target[0].src);
	          },
	          onChange: function(contents, $editable) {
	          	var cont = $("#deskripsi").summernote('code');
	          	cont = cont.replace(/<[^>]*>/g," ");
	          	cont = cont.replace(/\s+/g, ' ');
	          	cont = cont.trim();
	          	var n = cont.split(" ").length
	          	$("#sum-count").text(n)
            }
	    }
	})

	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#preview').html(`<img src="${e.target.result}" width="50%" height="auto" alt="Preview Image">`)
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#image").change(function(){
	    readURL(this);
	});

	function uploadImage(image) {
	      var data = new FormData();
	      data.append("image", image);
	      data.append("title", $("#title").val());
	      $.ajax({
	          url: `${base_url}cms/upload-image-tugas`,
	          cache: false,
	          contentType: false,
	          processData: false,
	          data: data,
	          type: "POST",
	          dataType:"json",
	          success: function(response) {
	            $('#deskripsi').summernote("insertImage", `${response.image}`);
	          },
	          error: function(data) {
	              console.log(data);
	          }
	      });
	  }

      function deleteImage(src) {
          $.ajax({
              data: {src : src},
              type: "POST",
              url: `${base_url}cms/delete-image-tugas`,
              cache: false,
              success: function(response) {
                  console.log(response);
              }
          });
      }

      $('.btn-submit').click(function(e){
	    e.preventDefault('submit')
	    var formData = new FormData($('#form')[0]);
	    $.ajax({
	      url:base_url+'cms/save-tugas/tambah',
	      dataType:'json',
	      type:'POST',
	      data: formData,
	      contentType: false,
	      processData: false,
	      success: (response) =>{

	        if (response.status) {
	          sukses(response.alert);
		          $(".swal2-confirm").click(function(){
		            window.location.href = `${base_url}cms/list-tugas`
		          })
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
</script>