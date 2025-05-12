<?php
session_start();

require_once '../../common/config.php';
$select_home = "select * from banner";
$result = mysqli_query($con_query, $select_home);
$row = mysqli_num_rows($result);
while ($data = mysqli_fetch_assoc($result)) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>FoodFlow</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../user_dashboard/assets/css/main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
      #about_picture {
        width: 750px;
        height: 540px;
      }

      .profile_img {
        width: 200px;
        height: 200px;
        border-radius: 10px;
      }

      .secondary_image {
        width: 500px;
        height: 365px;
      }

      /* #hero {
        background: url('../../admin/assets/img/banner-bg.jpg') no-repeat center center;
        background-size: cover;
        height: 995px;
        width: 100%;
        position: relative;
        z-index: 1;
      } */

      /* #hero::before {
        content: "";
        background: rgba(0, 0, 0, 0.4); */
      /* optional dark overlay */
      /* position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1; */
      /* } */

      .hero-img img {
        width: 100%;
        max-width: 500px;
        height: 350px;
        /* object-fit: cover; */
        /* border-radius: 20px; */
        /* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25); */
        transition: transform 0.5s ease, box-shadow 0.5s ease;
      }

      .hero-img img:hover {
        transform: scale(1.03);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
      }
    </style>

  </head>

  <body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">FoodFlow</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#chefs">Chefs</a></li>
            <li><a href="#gallery">Gallery</a></li>

            </li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a> -->
        <a href="#" class="btn btn-danger d-flex align-items-center gap-2" id="logoutbtn" title="Logout">
          <i class="bi bi-box-arrow-right"></i>

        </a>

      </div>
    </header>

    <main class="main">

      <!-- Hero Section -->
      <section id="hero" class="hero section light-background">
        <!-- <img src="../../admin/assets/img/banner-bg.jpg" alt="" data-aos="fade-in"> -->

        <div class="container">
          <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up"><?php echo $data['title']; ?></h1>
              <p data-aos="fade-up" data-aos-delay="100"><?php echo $data['description']; ?></p>
              <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
                <a href="https://youtu.be/YXYjwALuA7c?si=xxsaDJ5wfY0K8n_N" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>

              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
              <img src=" ../../admin/assets/img/banner/<?php echo $data['image']; ?>" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>

      </section><!-- /Hero Section -->
    <?php } ?>
    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More</span> <span class="description-title">About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <?php
          $select_about_us = "select * from about_us ";
          $result = mysqli_query($con_query, $select_about_us);

          $row = mysqli_fetch_assoc($result);

          ?>
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="../../admin/assets/img/about/<?php echo ($row != NULL) ? $row['primary_image'] : "resturant.jpg"  ?>" height="500px" class="img-fluid mb-4" alt="" id="about_picture">

            <div class="book-a-table">
              <h3>Book a Table</h3>
              <p>
                <?php echo ($row != NULL) ? $row['booking_no'] : "+1 5589 55488 55"  ?>
              </p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                <?php echo ($row != NULL) ? $row['title'] : "Why do we use it?"  ?>"
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span> <?php echo ($row != NULL) ? $row['description'] : "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters"  ?>
                  </span></li>

              </ul>


              <div class="position-relative mt-4">
                <!-- <img src="assets/img/about-2.jpg" class="img-fluid" alt=""> -->
                <img src="../../admin/assets/img/about/<?php echo ($row != NULL) ? $row['secondary_image'] : "about-2.jpg"  ?>" class="img-fluid mb-4 secondary_image" alt="">

                <a href="https://youtu.be/3tEsnya_uZs?si=zXekxy3XnzBzUv_a" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section light-background">

      <div class="container">

        <div class="row gy-4">



          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Corporis voluptates officia eiusmod</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Ullamco laboris ladore lore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Menu</h2>
        <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Starters</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Breakfast</h4>
            </a><!-- End tab nav item -->

          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Lunch</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Dinner</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">
              <?php
              $category_lunch = "SELECT menu.* FROM menu INNER JOIN category ON menu.category_id = category.id WHERE category.category_name = 'starter'";
              $res = mysqli_query($con_query, $category_lunch);
              while ($data = mysqli_fetch_assoc($res)) {

              ?> <div class="col-lg-4 menu-item">
                  <a href="../../admin/assets/img/menu/<?php echo $data['image']; ?>" class="glightbox"> <img src="../../admin/assets/img/menu/<?php echo $data['image']; ?>" style="width: 90%; height: 400px; object-fit: cover;" class="img-fluid animated profile_img" alt=""></a>

                  <h4 class="mt-3"><?php echo $data['title']; ?></h4>
                  <p class="ingredients">
                    <?php echo $data['description']; ?>
                  </p>
                  <p class="price">
                    <?php echo $data['price']; ?>
                  </p>
                </div><!-- Menu Item -->

              <?php
              }
              ?>




            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Breakfast</h3>
            </div>

            <div class="row gy-5">
              <?php
              $category_lunch =  "SELECT menu.* FROM menu INNER JOIN category ON menu.category_id = category.id WHERE category.category_name = 'Breakfast'";
              $res = mysqli_query($con_query, $category_lunch);
              while ($data = mysqli_fetch_assoc($res)) {

              ?>

                <div class="col-lg-4 menu-item">
                  <a href="../../admin/assets/img/menu/<?php echo $data['image']; ?>" class="glightbox"> <img src="../../admin/assets/img/menu/<?php echo $data['image']; ?>" style="width: 90%; height: 400px; object-fit: cover;" class="img-fluid animated profile_img" alt=""></a>
                  <h4 class="mt-3"><?php echo $data['title']; ?></h4>

                  <p class="ingredients">
                    <?php echo $data['description']; ?>
                  </p>
                  <p class="price">
                    <?php echo $data['price']; ?>

                  </p>
                </div><!-- Menu Item -->

              <?php
              }
              ?>







            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Lunch</h3>
            </div>

            <div class="row gy-5">
              <?php
              $category_lunch = "SELECT menu.* FROM menu INNER JOIN category ON menu.category_id = category.id WHERE category.category_name = 'Lunch'";
              $res = mysqli_query($con_query, $category_lunch);
              while ($data = mysqli_fetch_assoc($res)) {

              ?>
                <div class="col-lg-4 menu-item">
                  <a href=" ../../admin/assets/img/menu/<?php echo $data['image']; ?>" class="glightbox"><img src=" ../../admin/assets/img/menu/<?php echo $data['image']; ?>" style="width: 90%; height: 400px; object-fit: cover;" class="img-fluid animated profile_img" alt=""></a>
                  <h4 class="mt-3"><?php echo $data['title']; ?></h4>
                  <p class="ingredients">
                    <?php echo $data['description']; ?>
                  </p>
                  <p class="price">
                    <?php echo $data['price']; ?>
                  </p>
                </div><!-- Menu Item -->

              <?php
              }
              ?>







            </div>
          </div><!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div>

            <div class="row gy-5">
              <?php
              $category_lunch = "SELECT menu.* FROM menu INNER JOIN category ON menu.category_id = category.id WHERE category.category_name = 'Dinner'";
              $res = mysqli_query($con_query, $category_lunch);
              while ($data = mysqli_fetch_assoc($res)) {

              ?>
                <div class="col-lg-4 menu-item">
                  <a href="../../admin/assets/img/menu/<?php echo $data['image']; ?>" class="glightbox profile_img"> <img src="../../admin/assets/img/menu/<?php echo $data['image']; ?>" style="width: 90%; height: 400px; object-fit: cover;" class="img-fluid animated profile_img" alt=""></a>
                  <h4 class="mt-3"><?php echo $data['title']; ?></h4>

                  <p class="ingredients">
                    <?php echo $data['description']; ?>
                  </p>
                  <p class="price">
                    <?php echo $data['price']; ?>

                  </p>
                </div><!-- Menu Item -->

              <?php
              }
              ?>

            </div><!-- Menu Item -->










          </div>
        </div><!-- End Dinner Menu Content -->

      </div>

      </div>

    </section><!-- /Menu Section -->


    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>What Are They <span class="description-title">Saying About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>

          <div class="swiper-wrapper">
            <?php
            $select_home = "SELECT * FROM testimonial";
            $result = mysqli_query($con_query, $select_home);
            while ($data = mysqli_fetch_assoc($result)) {
            ?>
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">

                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          <span><?php echo $data['description']; ?></span>
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <h3><?php echo $data['username']; ?></h3>
                        <h4><?php echo $data['designation']; ?></h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-2 text-center">
                      <img src="../../admin/assets/img/testimonials/<?php echo $data['image']; ?>" class="img-fluid mb-4" alt="">
                    </div>

                  </div>
                </div>
              </div><!-- End testimonial item -->
            <?php } ?>
          </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>
    <!-- /Testimonials Section -->

    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <?php
            $select_img = "select *  from event";
            $result_img = mysqli_query($con_query, $select_img);

            while ($data = mysqli_fetch_assoc($result_img)) {

            ?>

              <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(../../admin/assets/img/event/<?php echo $data['image']; ?>)">
                <h3><?php echo $data['title']; ?></h3>
                <div class="price align-self-start">
                  <?php echo $data['price']; ?>
                </div>
                <p class="description">
                  <?php echo $data['description']; ?>
                </p>
              </div><!-- End Event item -->






            <?php }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Events Section -->

    <!-- Chefs Section -->
    <section id="chefs" class="chefs section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Chefs</h2>
        <p><span>Our</span> <span class="description-title">Professional Chefs</span></p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <?php
          $select_home = "SELECT * FROM chef";
          $result = mysqli_query($con_query, $select_home);
          while ($data = mysqli_fetch_assoc($result)) {
          ?>

            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="team-member">
                <div class="member-img">
                  <img src="../../admin/assets/img/chefs/<?php echo $data['image']; ?>" class="img-fluid animated" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo $data['title']; ?></h4>
                  <span><?php echo $data['designation']; ?></span>
                  <p><?php echo $data['description']; ?></p>
                </div>
              </div>
            </div><!-- End Chef Team Member -->

          <?php } ?>

        </div>
      </div>

    </section><!-- /Chefs Section -->


    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Book A Table</h2>
        <p><span>Book Your</span> <span class="description-title">Stay With Us<br></span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
                </div>
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              </div>

              <div class="text-center mt-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                <button type="submit">Book a Table</button>
              </div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>

    </section><!-- /Book A Table Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <?php
            $select_img = "select *  from gallery";
            $result_img = mysqli_query($con_query, $select_img);

            while ($data = mysqli_fetch_assoc($result_img)) {

            ?>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="../../admin/assets/img/gallery/<?php echo $data['gallery_image']; ?>" class="img-fluid" alt=""></a></div>
              <!-- <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div> -->
            <?php
            } ?>
          </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
          <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>
        </div><!-- End Google Maps -->
        <?php
        $select_contact = "select * from contact_us";
        $result_contact = mysqli_query($con_query, $select_contact);
        $row = mysqli_fetch_assoc($result_contact);
        ?>

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>

                <p> <?php echo ($row['address'] != Null) ? $row['address'] : "A108 Adam Street, New York, NY 535022" ?> </p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p> <?php echo ($row['contact_number'] != Null) ? $row['contact_number'] : "+1 5589 55488 55" ?> </p>

              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p> <?php echo ($row['email'] != Null) ? $row['email'] : "pozow@mailinator.com" ?> </p>

              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Opening Hours<br></h3>

                <p><strong>Mon-Sat:</strong> <?php echo ($row['from_time'] != Null) ? $row['from_time'] : "9AM" ?> - <?php echo ($row['to_time'] != Null) ? $row['to_time'] : "7AM" ?>
                </p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form><!-- End Contact Form -->

      </div>

    </section><!-- /Contact Section -->

    </main>



  </body>
  <script>
    $("#logoutbtn").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, log out',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to logout.php
          window.location.href = '../../user/logout.php';
        }
      });
    });
  </script>

  <?php
  require_once 'includes/footer.php'; ?>

  </html>