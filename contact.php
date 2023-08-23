<?php
session_start();
include 'connect.php';
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
if (isset($_POST['submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    $query = "INSERT INTO `contact`(`fName`, `lName`, `contactEmail`, `contactNumber`, `contactMessage`) VALUES ('$fName','$lName','$email','$number','$message')";
    $result = mysqli_query($conn, $query);
    echo $result;
    if ($result) {
        // Email subject
        $subject = "New Contact Form Submission";
    
        // Email message
        $message = "A new contact form submission has been received:\n\n";
        $message .= "First Name: $fName\n";
        $message .= "Last Name: $lName\n";
        $message .= "Email: $email\n";
        $message .= "Contact Number: $number\n";
        $message .= "Message:\n$message\n";
    
        // Additional headers
        $headers = "From: $email\r\n";
        $staffEmail = 'basitfaizan786@gmail.com';
        // Send the email notification
        if (mail($staffEmail, $subject, $message, $headers)) {
            echo "hogaya"; // Confirmation message
        }else{
            echo mysqli_error($conn);
        }
    }
    
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
    <style>
        .clearfix:before,
        .clearfix:after {
            display: table;
            content: '';
        }

        .clearfix:after {
            clear: both;
        }

        input:focus,
        textarea:focus,
        keygen:focus,
        select:focus {
            outline: none;
        }

        ::-moz-placeholder {
            color: #666;
            font-weight: 300;
            opacity: 1;
        }

        ::-webkit-input-placeholder {
            color: #666;
            font-weight: 300;
        }


        /* Contact Form Styling */
        .containers {
            padding: 0 50px 70px;
        }

        .textcenter {
            text-align: center;
        }

        .section1 {
            text-align: center;
            display: table;
            width: 100%;
        }

        .section1 .shtext {
            display: block;
            margin-top: 20px;
        }

        .section1 .seperator {
            border-bottom: 1px solid #a2a2a2;
            width: 35px;
            display: inline-block;
            margin: 20px;
        }

        .section1 h1 {
            font-size: 40px;
            color: #A44DD8;
            font-weight: normal;
        }

        .section2 {
            width: 1200px;
            margin: 25px auto;
        }

        .section2 .col2 {
            width: 48.71%;
        }

        .section2 .col2.first {
            float: left;
            margin-top: 1rem;
        }

        .section2 .col2.first .map {
            width: 100%;
            height: 45rem;
        }

        .section2 .col2.last {
            float: right;
        }

        .section2 .col2.column2 {
            /* padding: 0 30px; */
        }

        .section2 span.collig {
            color: #a2a2a2;
            margin-right: 10px;
            display: inline-block;
        }

        .section2 .sec2addr {
            display: block;
            line-height: 26px;
        }

        .section2 .sec2contactform input[type="text"],
        .section2 .sec2contactform input[type="email"],
        .section2 .sec2contactform textarea {
            padding: 18px;
            border: 0;
            background: #EDEDED;
            margin: 7px 0;
        }

        .section2 .sec2contactform textarea {
            width: 100%;
            display: block;
            color: #666;
            resize: none;
        }

        .section2 .sec2contactform input[type="submit"] {
            padding: 15px 40px;
            color: #fff;
            border: 0;
            background: #A44DD8;
            font-size: 16px;
            text-transform: uppercase;
            margin: 7px 0;
            cursor: pointer;
        }

        .section2 .sec2contactform h3 {
            font-weight: normal;
            margin: 20px 0;
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 19px;
            color: #A44DD8;
        }

        /* @media querries */

        @media only screen and (max-width: 1266px) {
            .section2 {
                width: 100%;
            }
        }

        @media only screen and (max-width: 960px) {
            .container {
                padding: 0 30px 70px;
            }

            .section2 .col2 {
                width: 100%;
                display: block;
            }

            .section2 .col2.first {
                margin-bottom: 10px;
            }

            .section2 .col2.column2 {
                padding: 0;
            }

            body .sec2map {
                height: 250px !important;
            }
        }

        @media only screen and (max-width: 768px) {
            .section2 .sec2addr {
                font-size: 14px;
            }

            .section2 .sec2contactform h3 {
                font-size: 16px;
            }

            .section2 .sec2contactform input[type="text"],
            .section2 .sec2contactform input[type="email"],
            .section2 .sec2contactform textarea {
                padding: 10px;
                margin: 3px 0;
            }

            .section2 .sec2contactform input[type="submit"] {
                padding: 10px 30px;
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 420px) {
            .section1 h1 {
                font-size: 28px;
            }
        }
    </style>
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

    <div class="containers">
        <div class="innerwrap">

            <section class="section1 clearfix">
                <div class="textcenter">
                    <span class="shtext">Contact Us</span>
                    <span class="seperator"></span>
                    <h1>Drop Us a Mail</h1>
                </div>
            </section>

            <section class="section2 clearfix">
                <div class="col2 column1 first">
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.7380104966023!2d84.0145208!3d26.3349817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3993b54b7b6ebcc3%3A0x26dd57d4598ec7e9!2sParwez%20Alam!5e0!3m2!1sen!2sin!4v1692372483216!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col2 column2 last">
                    <div class="sec2contactform">
                        <form method="post">
                            <div class="clearfix">
                                <input class="col2 first" type="text" placeholder="FirstName" name='fName'>
                                <input class="col2 last" type="text" placeholder="LastName" name='lName'>
                            </div>
                            <div class="clearfix">
                                <input class="col2 first" type="Email" placeholder="Email" name='email'>
                                <input class="col2 last" type="text" placeholder="Contact Number" name='number'>
                            </div>
                            <div class="clearfix">
                                <textarea name="message" id="" cols="30" rows="7"
                                    placeholder='Your message here...'></textarea>
                            </div>
                            <div class="clearfix"><input type="submit" value="Send" name='submit' name='fName'></div>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>







    <footer class="footer">
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="subscribe">
                            <h3>Contact Us</h3>
                            <p style="font-size:16px;font-weight:bold;color:white">STAR COMPUTER PRASHIKSHAN KENDRA</p>
                            <p style="font-size: 14px; color: white">
                                <i class="fa fa-location-arrow"></i> <span> Address: </span>MALIBARI POST-BARKA GAON
                                BHATPAR RANI DEORIA
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