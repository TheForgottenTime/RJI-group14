<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();

    $database = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        header("Location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
        die();
    }   

    $filepath = mysqli_real_escape_string($database, $_POST['filepath']);

    //submit filepath to ML algorithm
    //$Ranking = ML()
    //$UserUploadedBy = $_COOKIE['username']
    //$RedBalance = ML()
    //$BlueBalance = ML()
    //...
    //form SQL Query from Info
    //$sql = "INSERT INTO Photograph VALUES ($filepath, $UserUploadedBy, $RedBalance, $BlueBalance, ...);
    //mysqli_query($database, $sql);

    header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
?>