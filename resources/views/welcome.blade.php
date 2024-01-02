<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SIKANTIN</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{'template/css/theme.css'}}" rel="stylesheet">

    {{-- <style>
      body{
        background-image: url('template/assets/img/hero/geometric.jpg') ;
      background-repeat: no-repeat;
    background-size: cover     }
    </style>

  </head>
 <body> --}}

 

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="layout/index"><img src="{{ 'template/assets/img/logo.svg' }}" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              {{-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Product</a></li> --}}
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation"></a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero"></a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Product</a></li>
            </ul>
            <div class="d-flex ms-lg-5"><a class="btn btn-warning ms-3" href="/login">Sign In</a></div>
          </div>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Selamat Datang Di Sistem Informasi KANTIN</h1>
              <p class="mb-6 lead text-secondary">SIKOPER adalah sistem informasi koperasi/kantin sekolah, yang menjual berbagai peralatan sekolah dan makanan/minuman.<br class="d-none d-xl-block" />AYO Jelajahi Websitenya<br class="d-none d-xl-block" />your next user experience.</p>
              <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#!" role="button">Get started</a><a class="btn btn-link text-warning fw-medium" href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span class="fas fa-play me-2"></span>Watch the video Tutorial</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="{{ 'template/assets/img/kantin.jpg' }}" alt="" height="" width="" /></div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(template/assets/img/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <h1 class="fs-9 fw-bold mb-4 text-center">Product Yang Tersedia Di Kantin Ini <br class="d-none d-xl-block" /></h1>
          <div class="row">
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="template/assets/img/nabati-removebg-preview.png" width="200" alt="Feature" />
              <h4 class="mb-3">Nabati Keju</h4>
              <p class="mb-0 fw-medium text-secondary">Nabati adalah snack wafer yang diproduksi oleh richesee</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="template/assets/img/susu.png" width="200" alt="Feature" />
              <h4 class="mb-3">Susu Kotak</h4>
              <p class="mb-0 fw-medium text-secondary">Susu kemasan Ultra Milk ini terbuat dari susu sapi segarr lohhh...</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="template/assets/img/cocacola.png" width="200" alt="Feature" />
              <h4 class="mb-3">Preference tests</h4>
              <p class="mb-0 fw-medium tex  t-secondary">The Myspace page defines the individual.</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="template/assets/img/citato.png" width="200" alt="Feature" />
              <h4 class="mb-3">Five second tests</h4>
              <p class="mb-0 fw-medium text-secondary">Personal choices and the overall personality of the person.</p>
            </div>
          </div>
          <div class="text-center"><a class="btn btn-warning" href="/dashboard" role="button">Cek Selengkapnya...</a></div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


        

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>