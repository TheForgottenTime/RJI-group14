<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();
    
    // if not logged in send back to login page
    if (!$_COOKIE['username']){
        header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>RJI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400);
    #title {
        color: cornflowerblue;
        font-size: 1em;
    }
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        height: 1500px;
    }
    /* The navigation bar */
    .navbar {
        overflow: hidden;
        background-color:#E6E6E6;
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        width: 100%; /* Full width */
        z-index: 100;
    }

    .navbar a {
        float: left;
        display: block;
        color: 	#B4B3BB;
        text-align: center;
        padding: 14px 16px;
        font-family: 'Roboto', sans-serif;
    }

    /* Change background on mouse-over */
    .navbar a:hover {
        background: #ddd;
    }

    /* Main content */
    .main {
        margin-top: 5.5em; /* Add a top margin to avoid content overlay */
    }

    li {
        display: inline-block;
    }

    a {
        color: $blue;
        display: block;
        padding: 10px;
        position: relative;
        transition: color 0.3s;
        text-decoration: none;
    }
    .img-block {
        position: relative;
        color: white;
        max-width: 30em;
        height: auto;
    }
    .img-text {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 5em;
        color: cornflowerblue;
    }
    .img-keep {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
    footer {
        position: fixed;
        height: 3em;
        background-color:  #efefef;
        bottom: 10px;
        left: 0px;
        right: 0px;
        margin-bottom: 0px;
        text-align: center;
    }
    #icon {
        line-height: 3em;
    }
    .img-responsive {
        max-width: 30em;
        height: auto;
        margin-bottom: 1.3em;
        margin-left: 1.3em;
    }
    .img-responsive.keep {
        border: 4px solid cornflowerblue;
    }
    .img-responsive.delete {
        border: 4px solid red;
    }
</style>
    
</head>
<body>
	
<div class="navbar">
    <a href="index.php" id='title'>Reynolds Journalism Institute</a>
    <a href="/search.php">Search Images</a>
    <a href="/upload.php">Upload Images</a>
    <a href="/delete.php">Delete Marked Images</a>
</div>

<div class="main">
    <?php
        //grabbing SQL paramaters from post
        $min = $_POST['minScore'];
        $max = $_POST['maxScore'];
        $mark_delete = $_POST['markDelete'];
        $mark_keep = $_POST['markKeep'];
        
        //normalizing inputs
        if (!$min) {
            $min = 0;
        }
        if (!$max) {
            $max = 1000;
        }
        if ($mark_delete == 'on' && $mark_keep == 'on') {
            $query = '(KEEP = 0 OR KEEP = 1)';
        }
        else if ($mark_delete == 'on' && !$mark_keep) {
            $query = '(KEEP = 0)';
        }
        else {
            $query = '(KEEP = 1)';
        }
        

        // forming search query from form data
        $query = "SELECT Filepath, Rating, Keep FROM Photograph WHERE Rating >= $min AND Rating <= $max AND $query ORDER BY Rating";
        $result = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
        mysqli_select_db($result,DB_DATABASE) or die("Could not select the databse." .mysqli_error());
        $image_query = mysqli_query($result,$query);
        //displaying results of search 
        while($rows = mysqli_fetch_array($image_query))
        {
            $img_rating = $rows['Rating'];
            $img_src = $rows['Filepath'];
            $img_keep = $rows['Keep'];
            echo "<div class='img-block'>";
            
            if ($img_keep == 0) {
                echo "<img src='$img_src' title='$img_keep' alt='$img_rating' class='img-responsive delete'>";
            }
            else {
                echo "<img src='$img_src' title='$img_keep' alt='$img_rating' class='img-responsive keep'>";
            }
            echo "<div class='img-text'>$img_rating</div>";
            echo "</div>";
        }
    
    ?>
</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        $(".img-responsive.keep").click(function(event) {
            update(event.target.src);
            $(this).toggleClass('keep delete');
        });
        $(".img-responsive.delete").click(function(event) {
            update(event.target.src);
            $(this).toggleClass('keep delete');
        });
        function update(n){ 
            $.ajax({
            type: "GET",
            url: "http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/update.php",
            data:{filepath:n},
            dataType:'json',
            cache: false,
            success: function(response)
                {
                alert("Record successfully updated");
                }
            });
        }
    </script>

</body>
</html>

