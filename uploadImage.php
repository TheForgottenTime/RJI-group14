<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();

    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }   

    // getting filepath from post

    $filepath = mysqli_real_escape_string($conn, $_POST['filepath']);

    $html = file_get_contents($filepath);
    

    $dom = new DOMDocument;

    @$dom->loadHTML($html);

    // ripping href from every a tag

    $links = $dom->getElementsByTagName('a');

    $run = false;

    foreach ($links as $link){
        if ($run == false){
            $run = true;
        }
        else {
            $imagepath = $filepath . $link->getAttribute('href');
            echo $imagepath;
            echo '<br>';
            ob_start();
            // passing filepath to rankPhotos.py
            passthru('python rankPhotos.py $imagepath');
            $rating = ob_get_clean(); 
            $rating = rand() % 1000;
            $user= $_COOKIE["username"];
            if ($rating > 650) {
                $keep = 1;
            }
            else {
                $keep = 0;
            }
            $sql = "INSERT INTO Photograph VALUES ('$imagepath', '$user', '$rating', '$keep', 'N/A')";
            mysqli_query($conn, $sql);
        }
    }

    header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com");
?>