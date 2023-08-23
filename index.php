<?php
session_start();
if (isset($_SESSION['name'])) {
  $loggedIn = true;
} else {
  $loggedIn = false;
}
if (isset($_GET['logout'])) {
  session_unset(); // Clear all session variables
  session_destroy(); // Destroy the session
  header('Location: index.php'); // Redirect to index.php
  exit();
}
?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1" />
  <meta name="description" />
  <meta name="author" />
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <title>
    STAR COMPUTER PRASHIKSHAN KENDRA
  </title>
  <!-- Reset CSS -->
  <link href="reset.css" rel="stylesheet" type="text/css" />
  <!-- Custom Fonts -->
  <link href="fonts.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap -->
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Select2 -->
  <link href="select2.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link href="font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Magnific Popup -->
  <link href="magnific-popup.css" rel="stylesheet" type="text/css" />
  <!-- Iconmoon -->
  <link href="iconmoon.css" rel="stylesheet" type="text/css" />
  <!-- Owl Carousel -->
  <link href="owl.carousel.min.css" rel="stylesheet" type="text/css" />
  <!-- Animate -->
  <link href="animate.css" rel="stylesheet" type="text/css" />
  <!-- Custom Style -->
  <link href="custom.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div id="loading">
    <div class="element">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
  </div>
  <!-- End Preloader -->
  <!-- Start Header Middle -->
  <div class="container header-middle">
    <div class="row">
      <div class="col-xs-5 col-sm-5">

        <h4 class="animated fadeInRight">
          <img src="images/star-computer-prashikshan-kendra-logo2.png" style="width:20rem" alt="">
          <!-- <a href="index.php">STAR COMPUTER PRASHIKSHAN KENDRA</a> -->
      </h4>

      </div>
      <div class="col-xs-7 col-sm-7">
        <div class="contact clearfix">
          <ul class="hidden-xs">
            <li><span>Email</span> <a>meraj.star786@gmail.com</a> </li>
            <li><span>Call</span>9935812774 , 8795655080</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Header Middle -->
  <!-- Start Navigation -->
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
          class="navbar-toggle collapsed" type="button"><span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="navbar-collapse collapse" id="navbar">

        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>

          <li><a href="#about">About</a></li>
          </li>

          <li class="dropdown"><a data-toggle="dropdown" href="#">Our Courses <i class="fa fa-angle-down"
                aria-hidden="true"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#">BCC </a></li>
              <li><a href="#">CCC</a></li>
              <li><a href="#">DCA</a></li>
              <li><a href="#">ADCA</a></li>
              <li><a href="#">DFA</a></li>
              <li><a href="#">DTP</a></li>
              <li><a href="#">DED</a></li>
              <li><a href="#">PGDCA</a></li>
              <li><a href="#">AUTO CAD</a></li>
              <li><a href="#">TALLEY.ERP With GST</a></li>
              <li><a href="#">INTERNET</a></li>
              <li><a href="#">NETWORKING</a></li>
              <li><a href="#">English & Hindi Type Writing</a></li>
            </ul>
          </li>


          <li><a href="contact.php">Contact Us</a></li>
          <?php
          if ($loggedIn) {
            if (!$_SESSION["is_staff"]) {
              echo '<li><a href="?logout">Log out</a></li>';
              echo '<li><a href="certificate.php">Certificate</a></li>';
            } else {
              echo '<li><a href="?logout">Log out</a></li>';
              echo '<li><a href="students.php">Students</a></li>';
              echo '<li><a href="contactStudent.php">Contacted Students</a></li>';
            }
          } else {
            echo '<li class="dropdown"><a data-toggle="dropdown" href="#">Login<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="studentLogin.php">Student Login </a></li>
                                <li><a href="stafflogin.php">Staff Login</a></li>
                            </ul>
                        </li>';
          }
          ?>


        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->
  </header>



  <form name="form1" method="post" action="./" id="form1">
    <div>
      <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
        value="ZA1B8VtoBQkqnfmVC4Nrn9ewXIDZj3zi4MrQeq9Vde5p6GfJdRmRPoMVghpfN9vneoFGmq/sU1aZ143eguX6CFaofWiIxkUvnvRIG/1UtYyAab8L2H9ZiMvnbuCVQ5v5ht3OvEm7VH11RTfKKfMaplgcTZw+HBjDpFR5x+jRmIOqGhRGKKvVFXXD1X2utGpggpst6gfEhLoJ8FyadLjceofh/HWExdr+OCK01gQRiL5+yxngwqU8979M2eYQYleeB0twsUToV0qTcgnDu/hdZYAsKdxhEKSeI0nP0kNLDl1iqLB5i5p0pYDftrmmzoKkPXoSHs+lajtMCbBl320vxrdX0dP+x8uO3RbNQ4pEUhToCtUWVaLMexl+qNXBCZ+EAH6k/SzP6qBSpRJXnvk5YQ==" />
    </div>

    <div>

      <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334" />
      <input type="hidden" name="__VIEWSTATEENCRYPTED" id="__VIEWSTATEENCRYPTED" value="" />
    </div>
    <div>

      <div class="banner-outer">
        <div class="banner-slider">
          <div class="slide1">
            <div class="container">
              <div class="content animated fadeInRight">
                <div class="fl-right">
                  <h1 class="animated fadeInRight red"><span
                      class="animated fadeInRight devnagri red">स्टार कंप्यूटर प्रशिक्षण केंद्र</span> MALIBARI POST-BARKA
                    GAON BHATPAR RANI DEORIA UTTAR PRADESH PIN CODE- 274702</h1>
                  <p class="animated fadeInRight red" >Leading Private Un-Aided COMPUTER CLASSES
                  </p>
                  <a href="#" class="btn animated fadeInRight">Know More <span class="icon-more-icon"></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="slide2">
            <div class="container">
              <div class="content">
                <h1 class="animated fadeInUp red">ISO 9001:2008 CERTIFIED ORGANIZATION</h1>
                <p class="animated fadeInUp red">NEW ADMISSION OPEN FOR SECURED GOVT. OF INDIA COURSES</p>
                <a href="#" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a> <a href="#"
                  class="btn white animated fadeInUp hidden-xs">Take a Tour <span class="icon-more-icon"></span></a>
              </div>
            </div>
          </div>
          <div class="slide3">
            <div class="container">
              <div class="content animated fadeInLeft red">
                <h1 class="animated fadeInLeft red">Our Courses</h1>
                <p class="animated fadeInLeft red">BCC,CCC,DCA,ADCA,DFA,DTP,DED,PGDCA....ETC</p>
                <a href="#" class="btn animated fadeInLeft">Know More <span class="icon-more-icon"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Banner Carousel -->

      <!-- Start About Section -->
      <section class="about" id='about'>
        <div class="container">
          <ul class="row our-links">
            <li class="col-sm-4 apply-online clearfix equal-hight">
              <div class="icon"><img src="images/apply-online-ico.png" class="img-responsive" alt=""></div>
              <div class="detail">
                <h3>Apply Online</h3>
                <p>Fill Online Form To Apply For various Courses</p>
                <a href="Form/FormDefault.aspx" target="_blank" class="more"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                  </svg></a>
              </div>
            </li>
            <li class="col-sm-4 prospects clearfix equal-hight">
              <div class="icon"><img src="images/prospects-ico.png" class="img-responsive" alt=""></div>
              <div class="detail">
                <h3><span>Download</span>Prospects</h3>
                <p>For more details regarding our courses & fee structure</p>
                <a href="#" class="more"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                  </svg></a>
              </div>
            </li>
            <li class="col-sm-4 certification clearfix equal-hight">
              <div class="icon"><img src="images/download-prospects-ico2.png" class="img-responsive" alt=""></div>
              <div class="detail">
                <h3>Enquire Now!</h3>
                <p>We are always available to help with your queries</p>
                <a href="#" class="more"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                  </svg></a>
              </div>
            </li>
          </ul>
        </div>

        <div class="container director">
          <div class="row">
            <div class="col-sm-7 col-sm-push-5 left-block">
              <h2>STAR COMPUTER PRASHIKSHAN KENDRA</h2>
              <p>
                स्वागत है आपका "स्टार कंप्यूटर प्रशिक्षण केंद्र" में, जहाँ विद्यार्थियों के उज्ज्वल भविष्य के लिए
                कंप्यूटर पाठ्यक्रमों की एक उच्च गुणवत्ता वाली प्रशिक्षण प्रदान की जाती है। हम समग्र दुनिया में तेजी से
                बदल रहे तकनीकी युग में आपको मार्गदर्शित करने का संकल्प रखते हैं ताकि आप आगामी समय में सफलता प्राप्त कर
                सकें।
                <br>
                हमारे प्रशिक्षक उच्च विशेषज्ञता और व्यावसायिक ज्ञान के धारक हैं जो छात्रों को नवाचारी तकनीकों के साथ-साथ
                मौजूदा और आने वाले विपणन की तकनीकों में प्रशिक्षित करते हैं। हमारे कोर्स विविधता से भरपूर हैं और
                विद्यार्थियों को उनकी रूचियों और लक्ष्यों के आधार पर चुनने की स्वतंत्रता प्रदान करते हैं।
              <ul>
                <li>उच्च गुणवत्ता वाले पाठ्यक्रम: हम नवीनतम सॉफ़्टवेयर और तकनीकों के साथ-साथ मौजूदा और भविष्य की
                  आवश्यकताओं के अनुसार पाठ्यक्रम प्रदान करते हैं।</li>
                <li>अनुभवी प्रशिक्षक: हमारे प्रशिक्षक उच्च विशेषज्ञता और आवश्यक कौशलों के साथ आपको प्रेरित करने के लिए
                  योग्य हैं।</li>
                <li>प्रैक्टिकल अनुभव: हम प्रैक्टिकल अद्यतनों और प्रोजेक्ट्स के माध्यम से छात्रों को असली दुनिया के साथ
                  काम करने का अवसर प्रदान करते हैं।</li>
                <li>अनुशासन और प्रोत्साहन: हम अनुशासन, समर्पण और सही मार्गदर्शन के माध्यम से छात्रों को उनके लक्ष्यों की
                  प्राप्ति में मदद करते हैं</li>
              </ul>
              </p>
            </div>
            <div class="col-sm-5 col-sm-pull-7">
              <div class="video-block1">
                <div id="thumbnail_container"> <img src="images/director.jpeg" id="thumbnail" class="img-responsive"
                    alt=""> </div>



              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-7 col-sm-push-5 left-block"> <span class="sm-head">about us</span>
              <h2>STAR COMPUTER PRASHIKSHAN KENDRA</h2>
              <p>Admission open for job secured govt. of Indian computer courses .An ISO 9001:2008 Certified
                Organization Reg.No. 452/4/2548/122-137 Trust Act 1882 Govt. of India,NCT. New Delhi</p>
              <div class="know-more-wrapper"> <a href="#" class="know-more">Know More <span
                    class="icon-more-icon"></span></a> </div>
            </div>
            <div class="col-sm-5 col-sm-pull-7">
              <div class="video-block">
                <div id="thumbnail_container"> <img src="images/merazStars7.jpeg" id="thumbnail" class="img-responsive"
                    alt=""> </div>



              </div>
            </div>
          </div>
          <div style="margin-top:2rem;">
          <iframe class="container" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.7380104966023!2d84.0145208!3d26.3349817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3993b54b7b6ebcc3%3A0x26dd57d4598ec7e9!2sParwez%20Alam!5e0!3m2!1sen!2sin!4v1692372483216!5m2!1sen!2sin" style="border:0;" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </section>
      <!-- End About Section -->

      <!-- Start Cources Section -->
      <section class="our-cources padding-lg">
        <div class="containers">
          <h2> <span>Unique Features of our programs</span>Our Courses & Programmes</h2>
          <ul class="course-list owl-carousel">
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3><span>BCC</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3><span>CCC</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3><span>DCA</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>ADCA</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>DFA</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>DTP</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>DED</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>PGDCA</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>AUTO CAD</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>TALLY.ERP 9 With GST</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>INTERNET</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>NETWORKING</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
            <li>
              <div class="inner">
                <figure><img src="images/course-img2.jpg" alt=""></figure>
                <h3> <span>English & Hindi Type Writing</span></h3>
                <p>Course of Our Classes...</p>

              </div>
            </li>
          </ul>
        </div>
      </section>
      <section class="campus-tour padding-lg">
        <div class="container">
          <h2><span>Our campus have a lot to offer for our students</span>TAKE A CAMPUS TOUR</h2>
        </div>
        <ul class="gallery clearfix">
          <li>
            <div class="overlay">

              <a class="galleryItem" href="images/merazStars1.jpeg"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
</svg></span></a>
            </div>
            <figure><img src="images/merazStars1.jpeg" class="img-responsive1" alt=""></figure>
          </li>
          <li>
            <div class="overlay">

              <a class="galleryItem" href="images/merazStars2.jpeg"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
</svg></span></a>
            </div>
            <figure><img src="images/merazStars2.jpeg" class="img-responsive1" alt=""></figure>
          </li>
          <li>
            <div class="overlay">

              <a class="galleryItem" href="images/merazStars3.jpeg"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
</svg></span></a>
            </div>
            <figure><img src="images/merazStars3.jpeg" class="img-responsive1" alt=""></figure>
          </li>

          <li>
            <div class="overlay">

              <a class="galleryItem" href="images/merazStars4.jpeg"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
</svg></span></a>
            </div>
            <figure><img src="images/merazStars4.jpeg" class="img-responsive1" alt=""></figure>
          </li>
          <li>
            <div class="overlay">

              <a class="galleryItem" href="images/merazStars5.jpeg"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
</svg></span></a>
            </div>
            <figure><img src="images/merazStars5.jpeg" class="img-responsive1" alt=""></figure>
          </li>



        </ul>
      </section>

      <section><br /></section>

    </div>
  </form>

  <footer class="footer">
    <div class="bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="subscribe">
              <h3>Contact Us</h3>
              <p style="font-size:16px;font-weight:bold;color:white">STAR COMPUTER PRASHIKSHAN KENDRA</p>
              <p style="font-size: 14px; color: white">
                <i class="fa fa-location-arrow"></i> <span> Address: </span>MALIBARI POST-BARKA GAON BHATPAR RANI DEORIA
                UTTAR PRADESH
              </p>
              <p style="font-size: 14px; color: white"><i class="fa fa-phone"> </i><span> Call :
                </span>9935812774 , 8795655080</p>
              <p style="font-size: 14px; color: white"><i class="fa fa-envelope"></i><span> Email:
                </span>meraj.star786@gmail.com</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="instagram">
              <h3>NEWS & UPDATES</h3>
              <marquee direction="up" height="120px" scrollamount="2" onMouseOver="this.stop()"
                onMouseOut="this.start()">
                <!-- <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a target="_blank" style="color:white" href="Admin/Noticeboard/deled 2022.pdf">deled 2022 application
                  list</a>
                </li> -->

              </marquee>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer Bottom -->

  </footer>
  <!-- End Footer -->

  <!-- Scroll to top -->
  <a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
  <script src="path/to/jquery.min.js"></script>
  <script src="path/to/owl.carousel.min.js"></script>
  <script src="path/to/your-custom.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- Bootsrap JS -->
  <script type="text/javascript" src="bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script type="text/javascript" src="select2.min.js"></script>
  <!-- Match Height JS -->
  <script type="text/javascript" src="matchHeight-min.js"></script>
  <!-- Bxslider JS -->
  <script type="text/javascript" src="bxslider.min.js"></script>
  <!-- Waypoints JS -->
  <script type="text/javascript" src="waypoints.min.js"></script>
  <!-- Counter Up JS -->
  <script type="text/javascript" src="counterup.min.js"></script>
  <!-- Magnific Popup JS -->
  <script type="text/javascript" src="magnific-popup.min.js"></script>
  <!-- Owl Carousal JS -->
  <script type="text/javascript" src="owl.carousel.min.js"></script>
  <!-- Modernizr JS -->
  <script type="text/javascript" src="modernizr.custom.js"></script>
  <!-- Custom JS -->
  <script type="text/javascript" src="custom.js"></script>
</body>

</html>