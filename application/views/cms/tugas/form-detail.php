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
            
          <?= hari(date('D', strtotime($data['publish_date']))) ?>, <?= dateIndonesia(date('Y-m-d', strtotime($data['publish_date']))) ?> <?= date("H:i", strtotime($data['publish_date'])) ?> WIB
          </time>
          <figure>
            <?php 
            $year = date("Y", strtotime($data['created_date']));
            $month = date("m", strtotime($data['created_date']));
            $date = date("d", strtotime($data['created_date']));
            $url = "uploads/article/default/".$year."/".$month."/".$date."/" ?>
            <img src="<?= base_url($url).$data['image'] ?>" alt="<?= $data['alt'] ?>" width="100%"/>
            <figcaption style="color: grey;"><?= $data['sub_title'] ?></figcaption>
          </figure>
          <article>
            <?= $data['content'] ?>
          </article>

          <?php 
          $color = ['danger', 'primary', 'success', 'info', 'warning', 'secondary'];
          foreach ($hastags as $hastag): ?>
            <a href="<?= $hastag['hastag_link'] ?>" class="badge badge-<?=$color[rand(0,5)] ?> badge-sm" title="<?= $hastag['hastag_name'] ?>"><?= $hastag['hastag_name'] ?></a>
          <?php endforeach ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?= base_url($this->uri->segment(1)) ?>" title="Back To List Article" class="btn btn-secondary"><span class="fa fa-arrow-left"></span> Back</a>
          <a href="<?= base_url($this->uri->segment(1).'/edit/'.encrypt_decrypt('encrypt', $data['article_id'])) ?>" title="Edit Article" class="btn text-light btn-warning"><span class="fa fa-edit"></span> Edit</a>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
