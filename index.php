<?php
include_once 'sistem/koneksi.php';
$info_toko = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM info_toko"));
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= $info_toko['nama_toko'] ?></title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="assets/css/agency.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
  <link rel="stylesheet" href="../assets/css/fonts.min.css">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="../assets/js/plugin/select2/css/select2.min.css">
  
  <!-- Custom -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<style>
  @media (max-width: 576px) {
    #nav-logo {
      float: left;
      width: 50%;
    }

    #nav-logo img {
      width: 100%!important;
    }
  }
</style>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a id="nav-logo" class="navbar-brand js-scroll-trigger float-left" href="#page-top">
        <!-- <?= $info_toko['nama_toko'] ?> -->
        <img src="assets/img/mukhlida-laundry.png" alt="<?= $info_toko['nama_toko'] ?>" class="w-50">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary font-weight-bold p-1 text-white" href="member/">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Mukhlida Laundry</div>
        <div class="intro-heading text-uppercase">Solusi Terbaik Untuk Laundry</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Layanan Kami</a>
      </div>
    </div>
  </header>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Tentang Kami</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <?= $info_toko['tentang'] ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section class="page-section bg-light" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Pesan Layanan Cuci Online</h2>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <div class="card-pricing2 card-success">
                <div class="pricing-header">
                  <h3 class="fw-bold">Mager ?</h3>
                  <span class="sub-title">Gunakan Layanan Antar</span>
                </div>
                <div class="price-value">
                  <div class="value">
                    <span class="currency">Rp 10.000</span>
                    <span class="month">/Antar</span>
                  </div>
                </div>
                <ul class="pricing-content">
                  <li>Driver Dijamin Ramah</li>
                  <li>Jarak Maximal 10Km</li>
                  <li>Minimal Cuci 20Kg</li>
                  <li class="disable">Antar Ke Pelaminan</li>
                  
                </ul>
                
              </div>
        </div>
        <div class="col-md-4">
          <div class="card-pricing2 card-primary">
                <div class="pricing-header">
                  <h3 class="fw-bold">Cuci Kiloan / Satuan</h3>
                  <span class="sub-title">Bisa Banget</span>
                </div>
                <div class="price-value">
                  <div class="value">
                    <span class="currency">Rp 10.000</span>
                    <span class="month">/Kg</span>
                  </div>
                </div>
                <ul class="pricing-content">
                  <li>Boneka Rp 6.000</li>
                  <li>Bedcover Kecil Rp 15.000</li>
                  <li>Bedcover Besar Rp 35.000</li>
                  <li>Sprei Rp 20.000</li>
                  <li class="disable">Cuci Uang</li>
                </ul>
                
                </div>
          </div>
        <div class="col-md-4">
          <div class="card-pricing2 card-secondary">
                <div class="pricing-header">
                  <h3 class="fw-bold">Diskon 10%</h3>
                  <span class="sub-title">Dengan Jadi Member</span>
                </div>
                <div class="price-value">
                  <div class="value">
                    <span class="currency">Free</span>
                    
                  </div>
                </div>
                <ul class="pricing-content">
                  <li>Hubungi Outlet Terdekat</li>
                  <li>Diskon Aktif Setelah Cuci Pertama</li>
                  <li>Cuci Satuan Dapet Diskon</li>
                  <li>Cuci 1Kg Dapet Diskon</li>
                  
                </ul>
                
              </div>
            </div>
          </div>
          
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Kontak</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Kirim Pesan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; <?= $info_toko['nama_toko'] ?> 2019</span>
        </div>
        <div class="col-md-4">
          
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="<?= $info_toko['twitter'] ?>">
                <i class="fab fa-twitter mt-3"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="<?= $info_toko['facebook'] ?>">
                <i class="fab fa-facebook-f mt-3"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="<?= $info_toko['instagram'] ?>">
                <i class="fab fa-instagram mt-3"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- <script src="assets/js/jqBootstrapValidation.js"></script>
  <script src="assets/js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="assets/js/agency.min.js"></script>
  <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  
  <!-- Datatables -->
  <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Chart Js -->
  <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

  
  <!-- SweetAlert -->
  <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Select2 -->
  <script src="../assets/js/plugin/select2/js/select2.full.min.js"></script>

  <!-- Atlantis JS -->
  <script src="../assets/js/atlantis.min.js"></script>

  <!-- TinyMCE -->
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Custom JS -->
  <script src="../assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
      let navLogo = $('#nav-logo img');
      if ($('#mainNav').hasClass('navbar-shrink')) {
        navLogo.attr('src', 'assets/img/mukhlida-laundry-black.png');
      } else {
        navLogo.attr('src', 'assets/img/mukhlida-laundry.png');
      }

      $(window).scroll(function() {
        let navLogo = $('#nav-logo img');
        if ($('#mainNav').hasClass('navbar-shrink')) {
          navLogo.attr('src', 'assets/img/mukhlida-laundry-login.png');
        } else {
          navLogo.attr('src', 'assets/img/mukhlida-laundry.png');
        }
      });
    });
  </script>
</body>

</html>
