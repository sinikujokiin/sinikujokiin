<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="<?= base_url('assets/landing') ?>/css/style-testimoni.css" rel="stylesheet">
<script src="<?= base_url('assets/landing') ?>/js/testimoni.js"></script>
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
	<?php if ($section['testimonial']): ?>
		
	<section id="clients" class="clients section-bg">
		<div class="container">
			
			<div class="row d-flex align-items-center pt-3 pb-3 mt-3 mb-3">
				<div class="col-lg-4 col-6">
					<h1 class="text-primary"><?= 
					str_replace(['/n'], ['<br>'], $section['testimonial']['nama_section']) ?></h1>
				</div>
				<div class="col-lg-8 col-6">
					<h6 class="text-justify" style="line-height: 1.5rem;"><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['testimonial']['deskripsi']) ?></h6>
				</div>
			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>
	<?php if ($section['testimoni_client']): ?>
		
	<section id="clients" class="clients mt-3 pt-3">
		<div class="container">
			<div class="section-title">
			  <h2><?= str_replace(['{','}'], ['<span>','</span>'], $section['testimoni_client']['nama_section']) ?></h2>
			  <p><?= str_replace(['{','}'], ['<span>','</span>'], $section['testimoni_client']['deskripsi']) ?></p>
			</div>
			<div id="customers-testimonials" class="owl-carousel">

	            <!--TESTIMONIAL 1 -->
	            <?php foreach ($data as $value): ?>
		            <div class="item">
		              <div class="shadow-effect">
		                <img class="img-circle" src="<?= base_url('uploads/testimoni/'.$value['image']) ?>" alt="">
		                <p><?= $value['text'] ?></p>
		              </div>
		              <div class="testimonial-name">
		              	<p><?= $value['nama'] ?></p>
		              	<span><?= substr($value['universitas'], 0,-3)."***" ?></span>
		              		
		              </div>
		            </div>
	            <?php endforeach ?>
	            <!--END OF TESTIMONIAL 1 -->
	          </div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ?>

	<?php if ($section['testimoni_chat']): ?>
		
	<section id="clients" class="clients mt-3 pt-3">
		<div class="container">
			<div class="section-title">
			  <h2><?= str_replace(['{','}'], ['<span>','</span>'], $section['testimoni_chat']['nama_section']) ?></h2>
			  <p><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['testimoni_chat']['deskripsi']) ?></p>
			</div>
		</div>
	</section><!-- End Clients Section -->
	<div id="slider-container" class="slider">
		<?php foreach ($testimoni_chat as $value): ?>
			<div class="slide">
				<img src="<?= base_url('uploads/testimoni_chat/').$value['image'] ?>" alt="Image Testimoni Chat" title="<?= $value['text'] ?>">
			</div>
			
		<?php endforeach ?>
	</div>
	<?php endif ?>


	<div class="overlay"></div>

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