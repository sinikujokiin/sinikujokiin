
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="
background: url(<?= base_url('uploads/section/'.$section['home']['background']) ?>) no-repeat center top; !important;
">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-6">
        <h6><?= $section['home']['nama_section'] ?></h6>
        <h1><?= str_replace(['{','}'], ['<span>','</span>'], $section['home']['deskripsi_singkat']) ?></h1>
        <h5><?= str_replace(['{','}'], ['<b>','</b>'], $section['home']['deskripsi']) ?></h5>
        <div class="d-flex">
          <a href="https://api.whatsapp.com/send/?phone=<?= $web['phone'] ?>&text=Halo...&type=phone_number&app_absent=0" target="_BLANK" class="btn-get-started">Hubungi Kami <span class="fa fa-arrow-right"></span></a>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center">
        <?php foreach ($fitur as $value): ?>
        <div class="col-md-6 col-lg-<?= 12/count($fitur) ?> d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="<?= $value['ikon'] ?>"></i></div>
            <h4 class="title"><a href="#"><?= $value['nama_fitur'] ?></a></h4>
            <span class="title"><?= $value['deskripsi_singkat'] ?></span>
            <p class="description">
              <?= $value['deskripsi'] ?></p>
          </div>
        </div>
        <?php endforeach ?>
      </div>

    </div>
  </section><!-- End Featured Services Section -->
  <?php if (isset($section['jenis_joki'])): ?>

  <section id="featured-services" class="featured-services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center">
        <?php foreach ($jenis_joki as $value): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url('uploads/jenis_joki/'.$value['image']) ?>" alt="Image Jenis Joki" title="<?= $value['nama_jenis'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $value['nama_jenis'] ?></h5>
              <p class="card-text"><?= $value['deskripsi'] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>

    </div>
  </section><!-- End Featured Services Section -->
<?php endif ?>
  <?php if ($section['best_price']): ?>
    
  <section id="clients" class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <img src="<?= base_url('uploads/section/'.$section['best_price']['background']) ?>" width="100%" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <h2><?= str_replace(['{','}'],['<span class="text-primary">','</span>'], $section['best_price']['nama_section']) ?></h2>
          <h6><?= str_replace(['{','}'],['<span class="text-primary">','</span>'], $section['best_price']['deskripsi_singkat']) ?></h6>
          <hr>
          <h6><?= str_replace(['{','}'],['<span class="text-primary">','</span>'], $section['best_price']['deskripsi']) ?></h6>
          <a href="https://api.whatsapp.com/send/?phone=<?= $web['phone'] ?>&text&type=phone_number&app_absent=0" class="btn btn-primary" title="Cek Harga">Cek Harga Tugasmu <span class="fa fa-arrow-right"></span></a>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?= $web['total_pelanggan'] ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Client</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-check"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?= $web['total_tugas_selesai'] ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Tugas Selesai</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-mortarboard-fill"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?= $web['total_universitas'] ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Universitas</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?= $web['total_tim'] ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Tim Profesional</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->


  <?php if (isset($section['payment'])): ?>
  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients section-bg">
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

  <?php if (isset($section['service'])): ?>
    
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><?= $section['service']['nama_section'] ?></h2>
        <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['service']['deskripsi_singkat']) ?></h3>
        <p><?= $section['service']['deskripsi'] ?></p>
      </div>

      <div class="row justify-content-center">
        <?php foreach ($tugas as $value): ?>
          
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="<?= $value['ikon'] ?>"></i></div>
            <h4><a href="#"><?= $value['nama_tugas'] ?></a></h4>
            <p><?= $value['deskripsi_singkat'] ?></p>
            <?php if ($value['deskripsi']): ?>
              <a href="<?= base_url('tugas/'.$value['slug']) ?>" title="Lihat Detail">Lihat Selengkapnya</a>
            <?php endif ?>
          </div>
        </div>
        <?php endforeach ?>

      </div>
      <?php if (count($tugas) == 6): ?>
        <div class="row text-center justify-content-center mt-3">
          <div class="col-lg-6 col-sm-12">
            <a href="<?= base_url('list-tugas') ?>" class="btn btn-primary" title="Lihat Semua Layanan">Lihat Semua Layanan</a>
          </div>
        </div>
      <?php endif ?>

    </div>
  </section><!-- End Services Section -->
  <?php endif ?>

<?php if (isset($section['testimoni'])): ?>

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials" 
  style="
  <?php if ($section['testimoni']['background']): ?>
    background: url(<?= base_url('uploads/section/'.$section['testimoni']['background']) ?>) top left !important; object-fit: cover !important; background-repeat: no-repeat !important; width: 100% !important; 
  <?php endif ?>

  ">
    <div class="container" data-aos="zoom-in">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php foreach ($testimoni as $value): ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url('uploads/testimoni/'.$value['image']) ?>" class="testimonial-img" alt="">
                <h3><?= $value['nama'] ?></h3>
                <h4><?= substr($value['universitas'], 0,-4)."***" ?></h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $value['text'] ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          <?php endforeach ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->
<?php endif ?>

  <?php if (isset($section['portfolio'])): ?>
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><?= $section['portfolio']['nama_section'] ?></h2>
        <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['portfolio']['deskripsi_singkat']) ?></h3>
        <p><?= $section['portfolio']['deskripsi'] ?></p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <?php foreach ($kategori as $value): ?>
              <li data-filter=".<?= url_title($value['kategori_portfolio'], 'dash', true)  ?>"><?= $value['kategori_portfolio'] ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($portfolio as $value): ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?= url_title($value['kategori_portfolio'], 'dash', true)  ?>">
            <img src="<?= base_url('uploads/portfolio/'.$value['image']) ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $value['deskripsi'] ?></h4>
              <p><?= $value['kategori_portfolio'] ?></p>
              <a href="<?= base_url('uploads/portfolio/'.$value['image']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $value['deskripsi'] ?>"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Portfolio Section -->
  <?php endif; ?>

  <?php if (isset($section['team'])): ?>
  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><?= $section['team']['nama_section'] ?></h2>
        <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['team']['deskripsi_singkat']) ?></span></h3>
        <p><?= str_replace(['{','}'], ['<span class="text-primary">','</span>'], $section['team']['deskripsi']) ?></p>
      </div>

      <div class="row justify-content-center">
        <?php foreach ($team as $value): ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="<?= base_url('uploads/team/').$value['image'] ?>" class="img-fluid" title="Gambar <?= $value['nama'] ?>" alt="Gambar <?= $value['nama'] ?>">
                <?php if (isset($value['social'])): ?>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                <?php endif ?>
              </div>
              <div class="member-info">
                <h4><?= $value['nama'] ?></h4>
                <span><?= $value['jabatan'] ?></span>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
  </section><!-- End Team Section -->
  <?php endif ?>
  <?php if (isset($section['price'])): ?>
  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pricing</h2>
        <h3>Check our <span>Pricing</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <h3>Free</h3>
            <h4><sup>$</sup>0<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li class="na">Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="box featured">
            <h3>Business</h3>
            <h4><sup>$</sup>19<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <h3>Developer</h3>
            <h4><sup>$</sup>29<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <span class="advanced">Advanced</span>
            <h3>Ultimate</h3>
            <h4><sup>$</sup>49<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->
<?php endif; ?>
  <!-- ======= Frequently Asked Questions Section ======= -->
  <?php if (isset($section['faq'])): ?>
  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><?= $section['faq']['nama_section'] ?></h2>
        <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['faq']['deskripsi_singkat']) ?></h3>
        <p><?= $section['faq']['deskripsi'] ?></p>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-10">
          <ul class="faq-list">
            <?php foreach ($faq as $value): ?>
              
            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq<?= encrypt_decrypt('encrypt', $value['id_faq']) ?>"><?= $value['pertanyaan'] ?> <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq<?= encrypt_decrypt('encrypt', $value['id_faq']) ?>" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <?= $value['jawaban'] ?>
                </p>
              </div>
            </li>
            <?php endforeach ?>

          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->
    
  <?php endif ?>

  <?php if (isset($section['contact'])): ?>
    
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2><?= $section['contact']['nama_section'] ?></h2>
        <h3><?= str_replace(['{','}'], ['<span>','</span>'], $section['contact']['deskripsi_singkat']) ?></h3>
        <p><?= $section['contact']['deskripsi'] ?></p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="fa fa-map"></i>
            <h3>Our Address</h3>
            <p><?= $web['address'] ?></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="fa fa-envelope"></i>
            <h3>Email Us</h3>
            <p><?= $web['email'] ?></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="fa fa-phone"></i>
            <h3>Call Us</h3>
            <p><?= $web['phone'] ?></p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <!-- <div class="col-lg-12 ">
          <?= $web['link_map'] ?>
        </div> -->

        <!-- <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> -->

      </div>

    </div>
  </section><!-- End Contact Section -->
  <?php endif ?>

</main><!-- End #main -->


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
            <a href="<?= $section['footer']['deskripsi_singkat'] ?>" class="btn btn-primary" target="_BLANK" title="">KEPOIN SEKARANG</a>
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