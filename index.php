<?php
  session_start();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLTB Mawanelle</title>

    <!---------------- 
    stylesheet
     -------------->

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!----------------
     stylesheet
      -------------->

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.jpg" alt="">
                <!-- <h1 class="sitename">SLTB Mawanella</h1> -->
                <!-- <span>.</span> -->
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li class="dropdown"><a href="#"><span>Board</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>

                            <li class="dropdown"><a href="#"><span>Admin panel</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="./admin/admin_login.php">Admin login</a></li>
                                    <li><a href="./admin/login.php">Owner login</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Users</a></li>
                            <li><a href="#">Guide line</a></li>
                            <li><a href="#">other services</a></li>
                            <li><a href="#">help</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <div>

                <!-- user login php button -->
                <?php
                if(isset($_SESSION["username"])) {
                    echo '<a class="btn-getstarted" href="#">'. $_SESSION["username"] . '</a>';                    
                    echo '<a class="btn-getstarted" href="./include/logout.inc.php">Log out</a>';
                } else{
                    echo '<a class="btn-getstarted" href="./User Login.php">User login</a>';
                }
                ?>

            </div>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="assets/img/hero-bg3.jpg" alt="" data-aos="fade-in">

            <div class="container">

                <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-xl-6 col-lg-8">
                        <h2>Bus Managment System easy<span>.</span></h2>
                        <p class="txtcolor">Sri Lanka Transport Board - Mawanelle Depot.</p>
                    </div>
                </div>

                <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <a href="./search.html">
                                <i class="bi bi-binoculars"></i>
                                <h3>bus time
                            </a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <a href="">
                                <i class="bi bi-bullseye"></i>
                                <h3>Bus tracking
                            </a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <a href="">
                                <i class="bi bi-bus-front"></i>
                                <h3>Bus booking
                            </a></h3>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About us</h2>
                <p>what we do</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6 order-1 order-lg-2 my-auto">
                        <img src="assets/img/redbus.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 order-1 order-lg-1 content">
                        <h3>Welcome to Depot Mawanalle</h3>
                        <p class="fst-italic">
                            where our mission is to transform the way public transportation is managed and
                            experienced.
                            Founded in 2024, <br>we specialize in innovative bus management solutions that enhance
                            efficiency, reliability, and passenger satisfaction.

                        </p>

                    </div>
                </div>

            </div>

        </section><!-- /About Section -->


        <!-- Features Section -->
        <section id="features" class="features section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Features</h2>
                <p>Look At Our Features</p>
            </div>

            <div class="container">

                <div class="row gy-4">
                    <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img
                            src="assets/img/bus1.jpg" alt=""></div>
                    <div class="col-lg-6">

                        <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up"
                            data-aos-delay="200">
                            <i class="bi bi-archive flex-shrink-0"></a></i>
                            <div>
                                <h4>Real-Time Tracking</h4>
                                <p>track of buses in real-time with our GPS-enabled tracking systemh4.</p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-basket flex-shrink-0"></i>
                            <div>
                                <h4>Route Optimization</h4>
                                <p>Enhance operational efficiency with our intelligent route planning algorithms.
                                </p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-broadcast flex-shrink-0"></i>
                            <div>
                                <h4>Passenger Information Systems</h4>
                                <p>Provide accurate arrival times and route information to passengers</p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-camera-reels flex-shrink-0"></i>
                            <div>
                                <h4>Fleet Management</h4>
                                <p>Monitor and manage fleet performance, maintenance, and scheduling</p>
                            </div>
                        </div><!-- End Features Item-->

                    </div>
                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>Check our Services</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Real-Time Tracking</h3>
                            </a>
                            <p>It provides accurate location data, enabling efficient route planning, real-time
                                tracking
                                for passengers, and improved operational oversight for transit authorities.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>24 × 7 services</h3>
                            </a>
                            <p>Our bus management system offers 24-hour service, ensuring continuous support and
                                monitoring for your fleet.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-bus-front"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Bus booking services</h3>
                            </a>
                            <p>Our booking system streamlines the reservation process with an intuitive interface
                                for
                                users to easily select, book, and manage their travel plans.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <img src="assets/img/bus2.jpg" alt="">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Hot-line Mawanalle Depot</h3>
                            <a class="cta-btn" href="">0352246121</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Call To Action Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.jpg" alt="">

                        </a>
                        <div class="footer-contact pt-3">
                            <p>A1, Mawanella</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>0352246121</span></p>
                            <p><strong>Website:</strong> <span>https://www.sltb.lk</span></p>
                        </div>
                        <div class="social-links d-flex mt-4">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Real-Time Tracking</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> Passenger Information </a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> 24 × 7 services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#"> bus booking services</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-12 footer-newsletter">
                        <h4>your Feedback</h4>
                        <p>Type your feedback about our products and services!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                    value="Submit"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>