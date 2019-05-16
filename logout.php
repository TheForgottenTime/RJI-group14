<?php
    if (isset($_COOKIE['username'])) {
        unset($_COOKIE['username']);  
        setcookie('username', '', time() - 3600, '/');
    }
    header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
?>