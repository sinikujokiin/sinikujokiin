<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title title-card">
            <?= $title ?>
          </h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-primary btn-sm" id="btn-tambah"><span class="fa fa-plus"></span> Add Data</button> -->

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dt-kategori" class="table table-bordered table-responsive table-striped">
            <thead>
              <tr>
                <th width="1%">No.</th>
                <th>IP Address</th>
                <th>Link</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Akses</th>
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
          "url":base_url+"cms/get-data-logs",
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


</script>