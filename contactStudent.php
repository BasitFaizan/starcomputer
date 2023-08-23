<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['is_staff']) || $_SESSION['is_staff'] !== true) {
    header('Location: stafflogin.php'); // Redirect unauthorized users to login page
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include ScrollReveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        section {
            padding: 100px 0;
        }

        body {
            font-family: 'Roboto';
            font-size: 17px;
            font-weight: 400;
            background-color: #eee;
        }

        h1 {
            font-size: 200%;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 400;
        }

        header {
            background: #3F51B5;
            color: #FFFFFF;
            padding: 150px 0;
        }

        header p {
            font-family: 'Allura';
            color: rgba(255, 255, 255, .2);
            margin-bottom: 0;
            font-size: 60px;
            margin-top: -30px;
        }

        .timeline {
            position: relative;
        }

        .timeline::before {
            content: '';
            background: #C5CAE9;
            width: 5px;
            height: 95%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-item {
            width: 100%;
            margin-bottom: 70px;
        }

        .timeline-item:nth-child(even) .timeline-content {
            float: right;
            padding: 40px 30px 10px 30px;
        }

        .timeline-item:nth-child(even) .date {
            right: auto;
            left: 0;
        }

        .timeline-item:nth-child(even) .timeline-content::after {
            content: '';
            position: absolute;
            border-style: solid;
            width: 0;
            height: 0;
            top: 30px;
            left: -15px;
            border-width: 10px 15px 10px 0;
            border-color: transparent #f5f5f5 transparent transparent;
        }

        .timeline-item::after {
            content: '';
            display: block;
            clear: both;
        }

        .timeline-content {
            position: relative;
            width: 45%;
            padding: 10px 30px;
            border-radius: 4px;
            background: #f5f5f5;
            box-shadow: 0 20px 25px -15px rgba(0, 0, 0, .3);
        }

        .timeline-content::after {
            content: '';
            position: absolute;
            border-style: solid;
            width: 0;
            height: 0;
            top: 30px;
            right: -15px;
            border-width: 10px 0 10px 15px;
            border-color: transparent transparent transparent #f5f5f5;
        }

        .timeline-img {
            width: 30px;
            height: 30px;
            background: #3F51B5;
            border-radius: 50%;
            position: absolute;
            left: 50%;
            margin-top: 25px;
            margin-left: -15px;
        }

        a {
            background: #3F51B5;
            color: #FFFFFF;
            padding: 8px 20px;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 20px;
            margin-top: 10px;
            display: inline-block;
            border-radius: 2px;
            box-shadow: 0 1px 3px -1px rgba(0, 0, 0, .6);
        }

        a:hover,
        a:active,
        a:focus {
            background: #303F9F;
            color: #FFFFFF;
            text-decoration: none;
        }

        .timeline-card {
            padding: 0 !important;
        }

        .timeline-card p {
            padding: 0 20px;
        }

        .timeline-card a {
            margin-left: 20px;
        }

        .timeline-item .timeline-img-header {
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, .4)), url('https://picsum.photos/1000/800/?random') center center no-repeat;
            background-size: cover;
        }

        .timeline-img-header {
            height: 200px;
            position: relative;
            margin-bottom: 20px;
        }

        .timeline-img-header h2 {
            color: #FFFFFF;
            position: absolute;
            bottom: 5px;
            left: 20px;
        }

        blockquote {
            margin-top: 30px;
            color: #757575;
            border-left-color: #3F51B5;
            padding: 0 20px;
        }

        .date {
            background: #FF4081;
            display: inline-block;
            color: #FFFFFF;
            padding: 10px;
            position: absolute;
            top: 0;
            right: 0;
        }

        @media screen and (max-width: 768px) {
            .timeline::before {
                left: 50px;
            }

            .timeline-img {
                left: 50px;
            }

            .timeline-content {
                max-width: 100%;
                width: auto;
                margin-left: 70px;
            }

            .timeline-item:nth-child(odd) .timeline-content::after {
                content: '';
                position: absolute;
                border-style: solid;
                width: 0;
                height: 0;
                top: 30px;
                left: -15px;
                border-width: 10px 15px 10px 0;
                border-color: transparent #f5f5f5 transparent transparent;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container text-center">
            <h1>Contacted Students Timeline</h1>
        </div>
    </header>

    <section class="timeline">
        <div class="container">
            <?php
                $message = "SELECT * FROM `contact`";
                if ($result = mysqli_query($conn, $message)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="timeline-item">
                                <div class="timeline-img"></div>           
                                    <div class="timeline-content js--fadeInLeft">
                                        <h2>' . $row['fName'] . '</h2>
                                        <h2>' . $row['lName'] . '</h2>
                                        <h2>' . $row['contactEmail'] . '</h2>
                                        <h2>' . $row['contactNumber'] . '</h2>
                                        <p>' . $row['contactMessage'] . '</p>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "<br><b style='font-size:48px;'>No Contact Messages Found!</b>";
                    }
                }                
            ?>



        </div>
    </section>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script>
        $(function () {

            window.sr = ScrollReveal();

            if ($(window).width() < 768) {

                if ($('.timeline-content').hasClass('js--fadeInLeft')) {
                    $('.timeline-content').removeClass('js--fadeInLeft').addClass('js--fadeInRight');
                }

                sr.reveal('.js--fadeInRight', {
                    origin: 'right',
                    distance: '300px',
                    easing: 'ease-in-out',
                    duration: 800,
                });

            } else {

                sr.reveal('.js--fadeInLeft', {
                    origin: 'left',
                    distance: '300px',
                    easing: 'ease-in-out',
                    duration: 800,
                });

                sr.reveal('.js--fadeInRight', {
                    origin: 'right',
                    distance: '300px',
                    easing: 'ease-in-out',
                    duration: 800,
                });

            }

            sr.reveal('.js--fadeInLeft', {
                origin: 'left',
                distance: '300px',
                easing: 'ease-in-out',
                duration: 800,
            });

            sr.reveal('.js--fadeInRight', {
                origin: 'right',
                distance: '300px',
                easing: 'ease-in-out',
                duration: 800,
            });


        });

    </script>
</body>

</html>