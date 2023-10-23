<main id="main">
	<?php if ($section['banner']): ?>
		<section id="clients" class="clients">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 col-6">
					<button type="button" class="btn btn-primary btn-sm"><?= $section['banner']['nama_section'] ?></button>

					<h3><?= $section['banner']['deskripsi_singkat'] ?></h3>
				</div>
				<div class="col-lg-6 col-6">
		          <img src="<?= base_url('uploads/section/'.$section['banner']['background']) ?>" width="100%" alt="">
				</div>
			</div>
		</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($data): ?>
		<section id="clients" class="section-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-12 mt-3">
						<?php foreach ($data as $value): ?>
							<div class="card">
							  <img class="card-img-top" src="<?= base_url('uploads/artikel/'.$value['image']) ?>" alt="Image <?= $value['title'] ?>" title="<?= $value['title'] ?>" style="max-width: 100%;padding: 0px;" width="100%">
							  <div class="card-body">
					  			<span>
					  				<i class="fa fa-calendar-alt"></i>
					  	          <?= hari(date('D', strtotime($value['created_at']))) ?>, <?= dateIndonesia(date('Y-m-d', strtotime($value['created_at']))) ?>
					  			</span>
							    <h5 class="card-title"><?= $value['title'] ?></h5>
							    <p class="card-text"><?= $value['deskripsi_singkat'] ?></p>
							    <a href="<?= base_url('artikel/'.$value['slug']) ?>" class="btn btn-primary">Lihat Selengkapnya</a>
							  </div>
							</div><br>
						<?php endforeach ?>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<div class="card">
						<div class="card-body">
						  <h2><?= $section['side']['nama_section'] ?></h2>
						  <h3><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['side']['deskripsi_singkat']) ?></h3>
						  <p><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'],$section['side']['deskripsi']) ?></p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Clients Section -->
	<?php else: ?>
	<?php endif ?>
</main>