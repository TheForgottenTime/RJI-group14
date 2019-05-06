<?php include "../inc/dbinfo.inc"; ?>
<?php

    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }   
    
    $filepath = $_GET['filepath'];

    $sql = "SELECT Keep FROM Photograph WHERE Filepath = '$filepath'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if ($row['Keep'] == 1) {
                $sql = "UPDATE Photograph SET Keep = FALSE WHERE Filepath = '$filepath'";
            }
            else {
                $sql = "UPDATE Photograph SET Keep = TRUE WHERE Filepath = '$filepath'";
            }
        }
    } else {
        echo "0 results";
    }

    
    
    mysqli_query($conn, $sql);
?>