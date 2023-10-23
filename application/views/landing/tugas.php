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
	<?php if ($section['tugas']): ?>
		
	<section id="clients" class="clients section-bg">
		<div class="container">
			
			<div class="row d-flex align-items-center pt-3 pb-3 mt-3 mb-3">
				<div class="col-lg-4 col-6">
					<h1 class="text-primary"><?= 
					str_replace(['/n'], ['<br>'], $section['tugas']['nama_section']) ?></h1>
				</div>
				<div class="col-lg-8 col-6">
					<h6 class="text-justify" style="line-height: 1.5rem;"><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['tugas']['deskripsi']) ?></h6>
				</div>
			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($section['unggulan']): ?>
		
	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
	  <div class="container" data-aos="fade-up">

	    <div class="section-title">
	      <h2><?= $section['unggulan']['nama_section'] ?></h2>
	      <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['unggulan']['deskripsi_singkat']) ?></h3>
	      <p><?= $section['unggulan']['deskripsi'] ?></p>
	    </div>

	    <div class="row justify-content-center">
	    	<?php if ($data): ?>
		      <?php foreach ($data as $value): ?>
		        
		      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
		        <div class="icon-box mt-3">
		          <div class="icon"><i class="<?= $value['ikon'] ?>"></i></div>
		          <h4><a href="#"><?= $value['nama_tugas'] ?></a></h4>
		          <p><?= $value['deskripsi_singkat'] ?></p>
		          <?php if ($value['deskripsi']): ?>
		            <!-- <a href="<?= base_url('tugas/'.$value['slug']) ?>" title="Lihat Detail">Lihat Selengkapnya</a> -->
		          <?php endif ?>
		        </div>
		      </div>
		      <?php endforeach ?>
	    	<?php else: ?>
	    		<div class="col-lg-8 col-12">
	    			<h4>Data tidak ditemukan</h4>
	    		</div>
	    	<?php endif ?>

	    </div>
	    <div class="section-title">
	    	
	    <div class="row justify-content-center mt-4">
	        <div class="col-lg-6 col-sm-12">
	          <a href="<?= base_url('cara-order') ?>" class="btn btn-primary" title="Lihat Cara Order">Lihat Cara Order</a>
	        </div>
	     </div>
	    </div>

	  </div>
	</section><!-- End Services Section -->
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
	            <a href="<?= $section['footer']['deskripsi_singkat'] ?>" class="btn btn-primary" target="_BLANK" title="">KONSULTASI SEKARANG</a>
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