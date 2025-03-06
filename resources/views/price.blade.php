<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>BarokahNet</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('vendor/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('vendor/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendor/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('vendor/assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('vendor/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('vendor/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('vendor/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('vendor/vendors/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/vendors/hamburgers/hamburgers.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/vendors/loaders.css/loaders.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/assets/css/theme.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendor/assets/css/user.min.css')}}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="bg-success py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
          <div class="row align-items-center gx-4">
            <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>Bates Timur, Desa Ellak Daya, Kec. Lenteng , Kab. Sumenep, Jawa Timur 69461 </div>
            <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center"><span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span>Kamis, 16 Januari 2025</div>
            <div class="col-auto"><span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span><a class="ms-2 fs--1 d-inline text-white fw-bold" href="tel:2123865575">085334959299</a></div>
          </div>
        </div>
      </div>
      <div class="sticky-top navbar-elixir">
        <div class="container">
          <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="{{'/'}}"><img src="{{asset('vendor/assets/img/logo-dark.png')}}" height="50em" alt="logo" /></a><button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#successNavbarCollapse" aria-controls="successNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
            <div class="collapse navbar-collapse" id="successNavbarCollapse">
              <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                <li class="nav-item dropdown"><a class="nav-link" href="{{'/'}}" role="button">Beranda</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tentang Kami</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Tentang BarokahNet</a></li>
                    <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                    <li><a class="dropdown-item" href="#">Topologi BarokahNet</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Barokah Family</a></li>
                    <li><a class="dropdown-item" href="#">Barokah Enterpreneur</a></li>
                    <li><a class="dropdown-item" href="#">Barokah Dedicated</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Newsroom</a></li>
                    <li><a class="dropdown-item" href="#">Single News</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tools</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Buttons</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link" href="#" role="button">Contact</a></li>
              </ul>
              <a class="btn btn-outline-success rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="#" target="_blank">Hubungi Kami</a>
            </div>
          </nav>
        </div>
      </div>
      <!-- ===============================================-->
      <!--    Main Content-->
      <!-- ===============================================-->
      <main class="main" id="top">
        <div class="preloader" id="preloader">
          <div class="loader">
            <div class="line-scale">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>

        <!-- <section> begin ============================-->
          <section class="bg-200 text-center">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-10 col-md-6">
                  <h3 class="fs-2 fs-lg-3">Harga Paket BarokahNet</h3>
                  <p class="px-lg-4 mt-3">Tentukan Bandwidth Sesuai Kebutuhanmu.</p>
                  <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
              </div>
              <div class="container mt-5">
                <div class="row g-4">
                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga -->
                    <div class="card-custom position-relative">
                      <!-- Label Diskon -->
                      <span class="badge bg-danger position-absolute top-0 start-0 rounded-pill px-3 py-2 mt-3 ms-3">Diskon 20%</span>
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Basic</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 4 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-times"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp160.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga dengan Label Best Seller -->
                    <div class="card-custom position-relative">
                      <!-- Label Best Seller -->
                      <span class="badge bg-success position-absolute top-0 start-0 rounded-pill px-3 py-2 mt-3 ms-3">Best Seller</span>
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Premium</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 6 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-times"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp300.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga -->
                    <div class="card-custom position-relative">
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Pro</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 8 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-check"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp500.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga -->
                    <div class="card-custom position-relative">
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Pro</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 8 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-check"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp500.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga -->
                    <div class="card-custom position-relative">
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Pro</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 8 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-check"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp500.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4 px-3">
                    <!-- Kotak Harga -->
                    <div class="card-custom position-relative">
                      <div class="ring-icon mx-auto">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                      <h5 class="mt-4">Paket Pro</h5>
                      <div align="left">
                        <table class="table table-borderless text-left">
                          <thead>
                            <tr>
                              <th>Fitur</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Upload & Download Simetris</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Ideal untuk 8 perangkat</td>
                              <td><span class="text-success fas fa-check"></span></td>
                            </tr>
                            <tr>
                              <td>Bonus Kuota Malam</td>
                              <td><span class="text-danger fas fa-check"></span></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      <h4 class="text-success">Rp500.000</h4>
                      <div><a class="btn btn-success rounded-pill btn-sm me-3 mt-2" href="#!">Beli Sekarang<span class="fas fa-chevron-right ms-2"></span></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- end of .container-->
            <br>
            <br>
            <div class="mt-md-0 mb-0"><a class="btn btn-warning btn-md text-white rounded-pill" href="#">Cek Paket Lainnya</a></div>
          </section><!-- <section> close ============================-->
          <!-- ============================================-->



      </main><!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-700">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="bg-success text-white p-5 p-lg-6 rounded-3">
                <h4 class="text-white fs-1 fs-lg-2 mb-1">Segera Dapatkan Layanan Internet CEPAT dari BarokahNet</h4>
                <p class="text-white">Sekarang saatnya menikmati kecepatan baru internet fiber cepat dan unlimited dari BarokahNet. Langganan Sekarang!</p>
                <form class="mt-4">
                  <div class="row align-items-center">
                    <div class="col-md-12 mt-3 mt-md-0">
                      <div class="d-grid"><button class="btn btn-light btn-sm rounded-pill" type="submit"><span class="text-success fw-semi-bold">Hubunig Kami</span></button></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
              <div class="row">
                <div class="col-6 col-lg-4 text-white ms-lg-auto">
                  <ul class="list-unstyled">
                    <li class="mb-3"><a class="text-white" href="contact.html">Contact Us</a></li>
                    <li class="mb-3"><a class="text-white" href="#!">FAQ</a></li>
                    <li class="mb-3"><a class="text-white" href="#!">Privacy Policy</a></li>
                    <li class="mb-3"><a class="text-white" href="#!">Terms of Use</a></li>
                    <li class="mb-3"><a class="text-white" href="#!">Global Office</a></li>
                  </ul>
                </div>
                <div class="col-6 col-sm-5 ms-sm-auto">
                  <ul class="list-unstyled">
                    <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" href="#!"> <span class="brand-icon me-3"><span class="fab fa-linkedin-in"></span></span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Linkedin</h5>
                      </a></li>
                    <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" href="#!"> <span class="brand-icon me-3"><span class="fab fa-twitter"></span></span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Twitter</h5>
                      </a></li>
                    <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" href="#!"> <span class="brand-icon me-3"><span class="fab fa-facebook-f"></span></span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Facebook</h5>
                      </a></li>
                    <li class="mb-3"><a class="text-decoration-none d-flex align-items-center" href="#!"> <span class="brand-icon me-3"><span class="fab fa-google-plus-g"></span></span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Google+</h5>
                      </a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->

      <footer class="footer bg-success text-center py-4">
        <div class="container">
          <div class="row align-items-center opacity-85 text-white">
            <div class="col-sm-3 text-sm-start"><a href="#"><img src="{{asset('vendor/assets/img/logo-light.png')}}" height="50em" alt="logo" /></a></div>
            <div class="col-sm-6 mt-3 mt-sm-0">
              <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright 2025 PT. Link Data Sumber Barokah.</p>
            </div>
            <div class="col text-sm-end mt-3 mt-sm-0"><span class="fw-semi-bold">Designed by </span><a class="text-white" href="#" target="_blank">BarokahNet</a></div>
          </div>
        </div>
      </footer>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('vendor/vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/is/is.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/bigpicture/BigPicture.js')}}"> </script>
    <script src="{{asset('vendor/vendors/countup/countUp.umd.js')}}"> </script>
    <script src="{{asset('vendor/vendors/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/lodash/lodash.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('vendor/vendors/gsap/gsap.js')}}"></script>
    <script src="{{asset('vendor/vendors/gsap/customEase.js')}}"></script>
    <script src="{{asset('vendor/assets/js/theme.js')}}"></script>
  </body>


</html>
