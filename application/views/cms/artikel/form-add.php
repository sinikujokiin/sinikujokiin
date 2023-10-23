
<div class="contaner-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title title-card">
				    <?= $title ?>
				  </h3>
				  <div class="card-tools">
				  </div>
				</div>
	        <form id="form">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
					    <div class="form-group">
					      <label for="image">Image</label>
                <div id="preview" class="mb-3"></div>
					      <input type="file" name="image" class="form-control" accept="image/*" id="image">
					      <span class="image_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
					    <div class="form-group">
					      <label for="title">Title</label>
					      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					      <input type="hidden" name="id_artikel" id="id_artikel" value="">
					      <span class="title_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
						  <div class="form-group">
						    <label for="kategori">Kategori</label>
						    <select class="form-control select2-tags" name="kategori" width="100%" id="kategori">
						    	<option value="">Ketik untuk mencari atau membuat tag baru</option>
						      <?php foreach ($kategori as $value): ?>
						        <option value="<?= $value['kategori'] ?>"><?= $value['kategori'] ?></option>
						      <?php endforeach ?>
						    </select>
						    <span class="kategori_portfolio_error text-danger"></span>
						  </div>
					  </div>
					  <div class="col-12">
					    
					    <div class="form-group">
					      <label for="deskripsi_singkat">Deskripsi Singkat</label>
					      <textarea name="deskripsi_singkat" id="deskripsi_singkat" class="form-control"></textarea>
					      <span class="deskripsi_singkat_error text-danger"></span>
					    </div>
					  </div>
					  <div class="col-12">
					    
					    <div class="form-group">
					      <label for="content">Content</label>
					      <textarea name="content" id="content" class="form-control"></textarea>
					      <small><b>Word Count : </b><b id="sum-count"></b></small>
					      <span class="content_error text-danger"></span>
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
	$(document).ready(function(){
		$(".select2-tags").select2({
		  placeholder:"Ketik untuk mencari atau membuat tag baru",
		  tags:true,
		  theme:'bootstrap4'
		})
	})
	$('#content').summernote({
	  height: "300px",
	  toolbar:[
	  	['style', ['undo','redo', 'bold', 'italic', 'underline', 'clear']],
	  	['font', ['strikethrough', 'superscript', 'subscript']],
	  	['fontsize', ['fontname','fontsize']],
	  	['color', ['color']],
	  	['para', ['ul', 'ol', 'paragraph']],
	  	['height', ['height']],
	  	['insert', ['picture', 'link', 'video', 'table', 'hr']],
	  	['misc', ['fullscreen']]
	  ],
	    callbacks: {
	          onImageUpload: function(image) {
	              uploadImage(image[0]);
	          },
	          onMediaDelete : function(target) {
	              deleteImage(target[0].src);
	          },
	          onChange: function(contents, $editable) {
	          	var cont = $("#content").summernote('code');
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
	          url: `${base_url}cms/upload-image-artikel`,
	          cache: false,
	          contentType: false,
	          processData: false,
	          data: data,
	          type: "POST",
	          dataType:"json",
	          success: function(response) {
	            // aksi = aksi

	            $('#content').summernote("insertImage", `${base_url+response.image}`);
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
              url: `${base_url}cms/delete-image-artikel`,
              cache: false,
              success: function(response) {
                  console.log(response);
              }
          });
      }

      $('.btn-submit').click(function(e){
	    // aksi='edit'
	    // e.preventDefault('submit')
	    draft = $(this).data("draft");
	    var formData = new FormData($('#form')[0]);
	    formData.append('draft', draft);
	    $.ajax({
	      url:base_url+'cms/save-artikel/add',
	      dataType:'json',
	      type:'POST',
	      data: formData,
	      contentType: false,
	      processData: false,
	      success: (response) =>{

	        if (response.status) {
	          sukses(response.alert);
		          $(".swal2-confirm").click(function(){
		            window.location.href = `${base_url}cms/list-artikel`
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


	  $(document).ready(function(){
	  	$(".select2-tag").select2({
	  		tags:true,
	  		theme:"bootstrap4"
	  	})
	  })


	  $(".btn-add-form").click(function(){
	  	addForm()
	  })

	  function addForm(){
	  	var addrow = `
	  		<div class="row form-baru">
	    		<div class="col-lg-5 col-sm-12">
				    <div class="form-group">
				      <label for="hastag_name">Hastag</label>
				      <input type="text" class="form-control" name="hastag_name[]" id="hastag_name">
				      <span class="hastag_name_error text-danger"></span>
				    </div>
	    		</div>
	    		<div class="col-lg-6 col-sm-12">
	    			 <div class="form-group">
				      <label for="hastag_link">Hastag Link</label>
				      <input type="text" class="form-control" name="hastag_link[]" id="hastag_link">
				      <span class="hastag_link_error text-danger"></span>
				    </div>
	    		</div>
	    		<div class="col-lg-1 col-sm-12" style="align-self: center;">
	    			<button type="button" class="btn btn-remove-form btn-sm btn-danger" ><span class="fa fa-times"></span></button>
	    		</div>
	    	</div>
	  	`;
	  	$("#additional-hastag").append(addrow)
	  }

	  $("#additional-hastag").on("click", ".btn-remove-form", function(){
         $(this).parent().parent('.form-baru').remove();
        });
</script>