<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_SESSION['name'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            min-height: 100vh;
        }

        .certificate-container {
            position: relative;
            background-color: #007bff;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            height: 90vh;
        }
        .pdfPreview img{
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%,-10%);
            display: flex;
            flex-direction: column;
        }
        .downloadBtn{
            position: absolute;
            bottom: 5%;
            left: 50%;
            transform: translateX(-50%);
        } 
        .pdfPreview img{
            width: 20rem;
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <?php
        $email = $_SESSION['email'];
        $allStudent = "SELECT studentName,studentCertificate FROM `studentLogin` WHERE `studentEmail` = '$email'";
        $result = mysqli_query($conn, $allStudent);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h2>Welcome ' . $row['studentName'] . '</h2>';
                echo '<h2>Here you will get your Certificate if Teachers allot</h2>';
                echo '<div class="certificate-container embed-responsive embed-responsive-4by3 mt-4">';
                if ($row['studentCertificate']){
                    echo '<div class="pdfPreview">
                            <img src="certificate/' . $row["studentCertificate"] . '" class="certificateImage" />
                        </div>';
                        echo '<a href="certificate/' . $row["studentCertificate"] . '" download="certificate_image.jpg" class="downloadBtn btn btn-success">Download</a>';

                }
                else{
                    echo '<h2>You have No Certificates currently</h2>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>