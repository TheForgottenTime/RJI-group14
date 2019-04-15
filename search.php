<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();

    $database = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    //checkingfor connection error
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        header("Location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
        die();
    }   

    //setting data from search form as a cookie
    $search = mysqli_real_escape_string($database, $_POST['search']);
    setcookie("search", $search, time() + (86400 * 30), "/");

    //going back to header
    header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
?>