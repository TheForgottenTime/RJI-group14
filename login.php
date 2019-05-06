<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();

    $database = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        header("Location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
        die();
    }   
    
    //protecting from SQL injection
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $password = mysqli_real_escape_string($database, $_POST['password']); 
    $sql = "SELECT * FROM User WHERE User='$username' AND Pass='$password'";

    $result = mysqli_query($database, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // if result is returned set a cookie and redirect to index
    if($count) {
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
    }
    // if not reload page
    else {
        header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
    }
?>