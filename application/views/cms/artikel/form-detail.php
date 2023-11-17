<link rel="stylesheet" href="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.css">
<script src="<?= base_url('assets/cms/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title title-card">
            <?= $title ?>
          </h3>
          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h2 title="title" class=""><?= $data['title'] ?></h2>

          <hr>
          <time style="color: grey;">
            
          <?= hari(date('D', strtotime($data['created_at']))) ?>, <?= dateIndonesia(date('Y-m-d', strtotime($data['created_at']))) ?> <?= date("H:i", strtotime($data['created_at'])) ?> WIB
          </time>
          <figure>
            <img src="<?= base_url('uploads/artikel/').$data['image'] ?>" alt="<?= $data['title'] ?>" width="100%"/>
            <figcaption style="color: grey;"><?= $data['deskripsi_singkat'] ?></figcaption>
          </figure>
          <article>
            <?= $data['content'] ?>
          </article>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?= base_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" title="Back To List Article" class="btn btn-secondary"><span class="fa fa-arrow-left"></span> Back</a>
          <a href="<?= base_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/edit/'.encrypt_decrypt('encrypt', $data['id_artikel'])) ?>" title="Edit Article" class="btn text-light btn-warning"><span class="fa fa-edit"></span> Edit</a>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
