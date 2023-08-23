<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['is_staff']) || $_SESSION['is_staff'] !== true) {
    header('Location: stafflogin.php'); // Redirect unauthorized users to login page
    exit();
}

if (isset($_POST['updateData'])) {
    $studentRollId = $_POST['studentRollId'];
    $Roll = $_POST['Roll'];
    $updateSql = "UPDATE `studentLogin` SET `studentRoll`='$Roll' WHERE `id`='$studentRollId'";
    if ($conn->query($updateSql)){
        echo '<script>alert("Student Roll Updated Successfully")</script>';
    }

}
if (isset($_POST['updateCourseData'])) {
    $studentCourseId = $_POST['studentCourseId'];
    $Course = $_POST['Course'];
    $updateSql = "UPDATE `studentLogin` SET `studentCourse`='$Course' WHERE `id`='$studentCourseId'";
    if ($conn->query($updateSql)){
        echo '<script>alert("Student Course Updated Successfully")</script>';
    }

}
if (isset($_POST['generate'])) {
    $studentId = $_POST['studentId'];
    $sql = "SELECT studentName, studentRoll, studentCourse FROM `studentLogin` WHERE `id` = '$studentId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $text = $row['studentName'];
        $roll = $row['studentRoll'];
        $course = $row['studentCourse'];
        $date = date("Y/m/d");
        $director = 'MERAJ ALAM ANSARI';


        // Create image from source
        $image = imagecreatefromjpeg('certificate.jpg');
        if ($image === false) {
            die('Failed to create image from source.');
        }

        // Define text color
        $color = imagecolorallocate($image, 19, 21, 22);

        // Define font file
        $font = 'Roboto-Bold.ttf'; // Check the path or provide the correct path

        // Font size
        $font_size = 80;
        // Calculate text width
        $text_width = imagettfbbox($font_size, 0, $font, $text)[4];
        $date_width = imagettfbbox($font_size, 0, $font, $date)[4];
        $director_width = imagettfbbox($font_size, 0, $font, $director)[4];
        $roll_width = imagettfbbox($font_size, 0, $font, $roll)[4];
        $course_width = imagettfbbox($font_size, 0, $font, $course)[4];

        // Calculate X-coordinate to center the text
        $text_x = (int) ((imagesx($image) - $text_width) / 2);
        $date_x = (int) ((imagesx($image) - $date_width) / 2);
        $director_x = (int) ((imagesx($image) - $director_width) / 2);
        $roll_x = (int) ((imagesx($image) - $roll_width) / 2);
        $course_x = (int) ((imagesx($image) - $course_width) / 2);


        // Calculate Y-coordinate
        $y = 1000; // You can adjust the Y-coordinate as needed
        // Add text to the image
        imagettftext($image, $font_size, 0, $text_x, $y, $color, 'DancingScript-Bold.ttf', $text);
        imagettftext($image, $font_size - 20, 0, $roll_x, $y + 150, $color, $font, $roll);
        imagettftext($image, $font_size - 20, 0, $course_x, $y + 270, $color, $font, $course);
        imagettftext($image, $font_size - 60, 0, $date_x + 200, $y + 750, $color, $font, $date);
        imagettftext($image, $font_size - 60, 0, $director_x + 100, $y + 530, $color, $font, $director);

        $certificateFilename = "{$studentId}{$text}_certificate.jpeg";

        // Save the image as a JPEG with specified quality
        imagejpeg($image, "certificate/{$certificateFilename}");

        // Destroy the image resource
        imagedestroy($image);

        // Update the `studentCertificate` field in the database
        $updateSql = "UPDATE `studentLogin` SET `studentCertificate`='$certificateFilename' WHERE `id`='$studentId'";
        $result = mysqli_query($conn,$updateSql);
        if ($result){
            echo "<script>alert(\"Certificate Generated Successfully\");</script>";
        }
    }
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
    <style>
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        font,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            font-size: 100%;
            vertical-align: baseline;
            background: transparent;
        }

        * {
            box-sizing: border-box
        }

        /* ---- code ---- */
        .containers {
            background: linear-gradient(95deg, #21c382 0%, #22C08C 40%, #24b6c2 100%);
            width: 100%;
            min-height: 100vh;
            font-family: 'Raleway', sans-serif;
            min-width: 500px;
        }

        .certificateImage {
            max-width: 200px;
            /* Set the maximum width */
            max-height: 200px;
            /* Set the maximum height */
            object-fit: contain;
            /* Maintain aspect ratio while fitting within the specified dimensions */
        }

        .containers h2 {
            font-family: 'Oswald', sans-serif;
            margin: 0 auto;
            color: #fff;
            font-size: 3em;
            text-align: center;
            padding: 60px 0;
        }

        .Tablecontainers {
            width: 80%;
            margin: 0 auto;
            min-width: 500px;
            overflow-x: auto;
        }

        .TableHolder {
            margin: 0 auto;
            width: 100%;
            text-align: left;
            color: #fff;
            cursor: default;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .TableHolder tr:first-child th {
            border-bottom: 1px solid #65CEC8;
            padding: 15px 15px;
            background-color: #ffffff44;
            font-size: 1.1em;
        }

        .TableHolder tr td,
        .TableHolder tr:not(:first-child) th {
            padding: 12px 20px;
            position: relative;
            font-weight: normal;
        }

        .TableHolder tr:not(:first-child) th {
            transition: all 1s ease-out;
        }

        .TableHolder tr td::after,
        .TableHolder tr:not(first-child) th::after {
            width: 0;
            height: 2px;
            background-color: #ffffff22;
            content: " ";
            position: absolute;
            bottom: 0;
            left: 0;
            transition: width 0.1s ease-out 0.2s, height 0.2s ease 0.4s;
        }

        .TDActiv::after {
            width: calc(100% - 20px) !important;
            height: 100% !important;
        }

        #pdfEmbed {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="containers">
        <h2>Students Details</h2>
        <div class="Tablecontainers">
            <table class="TableHolder">
                <tr>
                    <th>Name</th>
                    <th>Email address</th>
                    <th>Roll number</th>
                    <th>Course</th>
                    <th>Certificate</th>
                </tr>
                <?php
                $allStudent = "SELECT * FROM `studentLogin`";
                $result = mysqli_query($conn, $allStudent);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<th>' . $row["studentName"] . '</th>';
                        echo '<td>' . $row["studentEmail"] . '</td>';
                        if ($row['studentRoll']) {
                            echo '<td>' . $row["studentRoll"] . '</td>';
                        } else {
                            echo '
                            <td>
                            <form method = "post">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Roll number</label>
                               <input type="text" class="form-control" name="Roll">
                               <input type="text" class="form-control" value = '.$row["id"].' hidden name = "studentRollId">
                             </div>
                             <button type="submit" name="updateData" class="open-modal btn btn-primary">Update</button>
                            </form>
                            </td>
                            ';
                        }

                        if ($row['studentCourse']) {
                            echo '<td>' . $row["studentCourse"] . '</td>';
                        }else {
                            echo '
                            <td>
                            <form method = "post">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Course</label>
                               <input type="text" class="form-control" name="Course">
                               <input type="text" class="form-control" value = '.$row["id"].' hidden name = "studentCourseId">
                             </div>
                             <button type="submit" name="updateCourseData" class="open-modal btn btn-primary">Update</button>
                            </form>
                            </td>
                            ';
                        }
                        // Check certificate status and display accordingly
                
                        echo '<td>';
                        if ($row['studentCertificate']) {
                            echo '<div class="pdfPreview">
                            <img src="certificate/' . $row["studentCertificate"] . '" class="certificateImage" />
                        </div>';
                        }
                        echo '
                        <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">
                            <input value=' . $row['id'] . ' hidden name="studentId" value="Login"
                        class="btn btn-primary btn-lg">
                            <button type="submit" name="generate" class="open-modal btn btn-primary">Generate Certificate</button>
                        </form>
                        </td>
                    </tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>