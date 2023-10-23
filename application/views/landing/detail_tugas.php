<main id="main">
	<?php if(isset($banner)):?>
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
	<section id="clients" class="section-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="card" >
						<div class="card-body">
				  			<small style="color: grey;">
				  				<i class="fa fa-bookmark"></i> <?= $web['website_name'] ?>
				  				<i class="fa fa-calendar-alt"></i>
				  	          <?= hari(date('D', strtotime($data['created_at']))) ?>, <?= dateIndonesia(date('Y-m-d', strtotime($data['created_at']))) ?>
				  			</small>
						    <h2 class="card-title text-primary"><?= $data['nama_tugas'] ?></h2>
						    <p class="card-text"><?= $data['deskripsi_singkat'] ?></p>
						</div>
					  <div class="card-body">
					    <p class="card-text"><?= $data['deskripsi'] ?></p>
					  </div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="card">
						<div class="card-body">
							
						  <h2><?= $section['side']['nama_section'] ?></h2>
						  <h3><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['side']['deskripsi_singkat']) ?></h3>
						  <p><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'],$section['side']['deskripsi']) ?></p>

						  <hr>
						  <?php if ($terkait): ?>
						  	
							  <h4>Postingan Terkait</h4>
							  <?php foreach ($terkait as $value): ?>
							  	<small style="color: grey;"><?= hari(date('D', strtotime($value['created_at']))) ?>, <?= dateIndonesia(date('Y-m-d', strtotime($value['created_at']))) ?></small>
							  	<h5><a href="<?= base_url('tugas/'.$value['slug']) ?>" class="text-dark" title="<?= $value['nama_tugas'] ?>"><?= $value['nama_tugas'] ?></a></h5>
							  <?php endforeach ?>
						  <?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Clients Section -->
</main>