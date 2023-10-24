
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="author" content="<?= $web['website_name'] ?>">
  <title><?= $web['website_name']." | ".$title ?></title>
  <meta content="<?= str_replace(['{','}'], ['',''], $web['deskripsi'] ) ?>" name="description">
  <?php if ($this->uri->segment(2)): ?>
    <meta content="<?= str_replace(['{','}','-'], ['','',','], $this->uri->segment(2) ) ?>" name="keywords">
  <?php else: ?>
    <meta content="<?= str_replace(['{','}',' '], ['','',','], $web['keyword'] ) ?>" name="keywords">
  <?php endif ?>
<?php 
    if ($web['g_tag'] && $web['script_g_tag']) {
        echo $web['g_tag'];
        echo $web['script_g_tag'];
    }

 ?>


  <!-- Favicons -->
  <link href="<?= base_url('assets/'.$web['icon']) ?>" rel="icon">
  <link href="<?= base_url('assets/'.$web['icon']) ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/landing') ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/landing') ?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?= base_url('assets/landing') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/cms/') ?>plugins/fontawesome-free/css/all.min.css">
  
  <!-- <link href="<?= base_url('assets/landing') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
  <link href="<?= base_url('assets/landing') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/landing') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/landing') ?>/css/style.css" rel="stylesheet">
  <script>var base_url = '<?= base_url() ?>'</script>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= $web['email'] ?>" title="Email"><?= $web['email'] ?></a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span><a href="tel:<?= $web['phone'] ?>" title="Phone"><?= $web['phone'] ?></a></span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <?php if ($web['link_ig']): ?>
          <a target="_BLANK" href="<?= $web['link_ig'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
        <?php endif ?>
        <?php if ($web['link_fb']): ?>
          <a target="_BLANK" href="<?= $web['link_fb'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <?php endif ?>
        <?php if ($web['link_twitter']): ?>
          <a target="_BLANK" href="<?= $web['link_twitter'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
        <?php endif ?>
        <?php if ($web['link_tiktok']): ?>
          <a target="_BLANK" href="<?= $web['link_tiktok'] ?>" class="tiktok"><i class="bi bi-tiktok"></i></a>
        <?php endif ?>
        <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?= base_url() ?>"><?= $web['website_name'] ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?= base_url('assets/landing') ?>/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link <?= $title == 'Home' ? 'active' : ''  ?>" href="<?= base_url() ?>">Home</a></li>
          <li><a class="nav-link <?= $title == 'Cara Order' ? 'active' : ''  ?>" href="<?= base_url('cara-order') ?>">Cara Order</a></li>
          <li><a class="nav-link <?= $title == 'Testimoni' ? 'active' : ''  ?>" href="<?= base_url('testimoni') ?>">Testimoni</a></li>
          <li><a class="nav-link <?= $title == 'List Artikel' ? 'active' : ''  ?> " href="<?= base_url("artikel") ?>">Artikel</a></li>
          <li><button  class="btn btn-primary btn-list" onclick="loadListTugas()">Layanan Kami</button></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <?= $breadcrumb ?>
    <!-- End Breadcrumbs -->

    <?= $contents ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 col-12 footer-contact">
            <h3><img src="<?= base_url('assets/'.$web['logo']) ?>" alt="" width="50px"><span><?= $web['website_name'] ?></span></h3>
            <p><?= str_replace(['{','}'], ['<b class="text-primary">','</b>'], $web['about']) ?></p>
          </div>

          <div class="col-lg-4 col-md-12 col-12 footer-links">
            <h4>Menu</h4>
            <ul class="col-lg-6 col-6">
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Cara Order</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Testimoni</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Artikel</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Layanan Kami</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 col-12 footer-links">
            <h4>Hubungi Kami</h4>
            
            <ul>
              <?php if ($web['email']): ?>
              <li><i class="bi bi-mailbox"></i> <a href="mailto:<?= $web['email'] ?>"><?= $web['email'] ?></a></li>
              <?php endif ?>
              <?php if ($web['phone']): ?>
                <li><i class="bi bi-whatsapp"></i> <a href="https://api.whatsapp.com/send/?phone=<?= $web['phone'] ?>&text&type=phone_number&app_absent=0"><?= $web['phone'] ?></a></li>
                <!-- <li><i class="bi bi-phone"></i> <a href="tel:<?= $web['phone'] ?>"><?= $web['phone'] ?></a></li> -->
              <?php endif ?>
              <?php if ($web['link_ig'] && $web['nama_ig']): ?>
                <li><i class="bi bi-instagram"></i> <a target="_BLANK" href="<?= $web['link_ig'] ?>"><?= $web['nama_ig'] ?></a></li>
              <?php endif ?>
              <!-- <?php if ($web['link_fb'] && $web['nama_fb']): ?>
                <li><i class="bi bi-facebook"></i> <a target="_BLANK" href="<?= $web['link_fb'] ?>"><?= $web['nama_fb'] ?></a></li>
              <?php endif ?> -->
              <!-- <?php if ($web['link_twitter'] && $web['nama_twitter']): ?>
                <li><i class="bi bi-twitter"></i> <a target="_BLANK" href="<?= $web['link_twitter'] ?>"><?= $web['nama_twitter'] ?></a></li>
              <?php endif ?> -->
              <?php if ($web['link_tiktok'] && $web['nama_tiktok']): ?>
                <li><i class="bi bi-tiktok"></i> <a target="_BLANK" href="<?= $web['link_tiktok'] ?>"><?= $web['nama_tiktok'] ?></a></li>
              <?php endif ?>
              <!-- <li><i class="fa fa-angle-right"></i> <a href="#">Marketing</a></li> -->
              <!-- <li><i class="fa fa-angle-right"></i> <a href="#">Graphic Design</a></li> -->
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $web['website_name'] ?></span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/landing') ?>/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= base_url('assets/landing') ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/landing') ?>/js/main.js"></script>
  <script>
    function loadListTugas()
    {
      window.location.href=`${base_url}list-tugas`;
    }
  </script>
</body>

</html>
