<main id="main">
	<?php if ($section['banner']): ?>
		
	<section id="clients" class="clients">
		<div class="row d-flex align-items-center">
			<div class="col-lg-6 col-6">
				<button type="button" class="btn btn-primary btn-sm"><?= $section['banner']['nama_section'] ?></button>

				<h1><?= $section['banner']['deskripsi_singkat'] ?></h1>
			</div>
			<div class="col-lg-6 col-6">
	          <img src="<?= base_url('uploads/section/'.$section['banner']['background']) ?>" width="100%" alt="">
			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($section['cara_order']): ?>
		
	<section id="clients" class="clients section-bg">
		<div class="container">
			
			<div class="row d-flex align-items-center pt-3 pb-3 mt-3 mb-3">
				<div class="col-lg-6 col-6">
					<h1 class="text-primary"><?= 
					str_replace(['/n'], ['<br>'], $section['cara_order']['nama_section']) ?></h1>
				</div>
				<div class="col-lg-6 col-6">
					<h6 class="text-justify" style="line-height: 1.5rem;"><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['cara_order']['deskripsi']) ?></h6>
				</div>
			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($section['cara_ordernya']): ?>
		
	<section id="clients" class="clients">
		<div class="container">
			<div class="section-title">
			  <h2><?= $section['cara_ordernya']['nama_section'] ?></h2>
			  <p><?= str_replace(['{','}'], ['<span>','</span>'], $section['cara_ordernya']['deskripsi']) ?></p>
			</div>
			<div class="row justify-content-center">
				<?php foreach ($data as $value): ?>
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6">
								<img src="<?= base_url('uploads/cara_order/'.$value['gambar']) ?>" width="100%" alt="">
							</div>
							<div class="col-lg-9 col-md-8 col-sm-6" style="align-self: center !important;">
								<h5><?= $value['judul_cara_order'] ?></h5>
								<p><?= $value['deskripsi_cara_order'] ?></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($section['pembayaran']): ?>
		<section id="clients" class="clients section-bg">
			<div class="container">
				<div class="section-title">
				  <h2><?= $section['pembayaran']['nama_section'] ?></h2>
				  <p><?= str_replace('{}', $list_pembayaran.".", $section['pembayaran']['deskripsi']) ?></p>
				</div>
			</div>
			<div class="container" data-aos="zoom-in">
			  <div class="row justify-content-center">
			    <?php foreach ($pembayaran as $value): ?>
			    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
			      <img src="<?= base_url('uploads/pembayaran/').$value['ikon'] ?>" class="img-fluid" title="<?= $value['nama_pembayaran'] ?>" alt="<?= $value['nama_pembayaran'] ?>">
			    </div>
			    <?php endforeach ?>
			  </div>

			</div>
		</section><!-- End Clients Section -->
	<?php endif ?>

	<?php if (isset($section['footer'])): ?>
	<footer id="footer">
	  <div class="footer-newsletter" >
	    <div class="container">
	      <div class="row d-flex align-items-center">
	        <div class="col-lg-6">
	          <h2>
	            <?= 
	            str_replace(['{','}'], ['<br><span class="text-primary">','</span>'], $section['footer']['nama_section']) ?></h2>
	          <p><?= $section['footer']['deskripsi'] ?></p>
	          <?php if ($section['footer']['deskripsi_singkat']): ?>
	            <a href="<?= str_replace('{}', $web['phone'], $section['footer']['deskripsi_singkat'])  ?>" class="btn btn-primary" target="_BLANK" title="">KONSULTASI SEKARANG</a>
	          <?php endif ?>
	        </div>
	        <div class="col-lg-6">
	          <img src="<?= base_url('uploads/section/'.$section['footer']['background']) ?>" width="100%" alt="">
	        </div>
	      </div>
	    </div>
	  </div>
	</footer>
	<?php endif ?>


</main>