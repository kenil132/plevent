<?php
// error_reporting(0);

// $msg = "";

// If upload button is clicked ...
// if (isset($_POST['upload'])) {

//     $filename = $_FILES["uploadfile"]["name"];
//     $event = $_POST['event'];
//     $tempname = $_FILES["uploadfile"]["tmp_name"];
//     $folder = "./image/" . $filename;

//     $db = mysqli_connect("localhost", "root", "", "event");

//     // Get all the submitted data from the form
//     $sql = "INSERT INTO gallery (event,filename) VALUES ('$event','$filename')";

//     // Execute query
//     mysqli_query($db, $sql);

//     // Now let's move the uploaded image into the folder: image
//     if (move_uploaded_file($tempname, $folder)) {
//         echo "<h3>  Image uploaded successfully!</h3>";
//     } else {
//         echo "<h3>  Failed to upload image!</h3>";
//     }
// }
?>
 <?php
error_reporting(0);

$msg = "";
    session_start();
    // require('db_config.php');

    if (isset($_POST['upload'])) {

        $filename = $_FILES["uploadfile"]["name"];
        $event = $_POST['event'];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $filename;
        $db = mysqli_connect("localhost", "root", "", "event");
        // used to upload image in folder


        if (move_uploaded_file($tempname, $folder)) {

            $sql = "INSERT INTO gallery (event,filename) VALUES ('$event','$filename')";

            // Execute query
            $result = mysqli_query($db, $sql);

            if ($result) {
                $_SESSION['success'] = 'Image Uploaded successfully.';
                header("Location:gallery.php"); // used for redirection

            } else {
                $_SESSION['error'] = 'image uploading failed';
                header("Location:gallery.php");
            }
        } else {
            $_SESSION['error'] = 'image uploading failed';
            header("Location:gallery.php");
        }
    } else {
        $_SESSION['error'] = 'Please Select Image or Write title';
        header("Location:gallery.php");
    }
