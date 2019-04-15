<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();

    if (!$_COOKIE['username']){
        header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400);

$blue: #0097bf;
$white: #fff;
$black: #000;
$text: #424242;

@mixin cf {
	&:before,
	&:after {
		content: '';
		display: table;
	}

	&:after {
		clear: both;
	}
}

body {
  font-family: 'Roboto', sans-serif;;
}

.header {
	max-width: 720px;
	margin: 2em auto 10em;
}

.header-nav {
	@include cf;
	position: relative;
	padding-right: 3em;
}

.menu {
	display: inline-block;
	float: right;
	list-style-type: none;
	margin: 0;
	padding: 0;
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

.search-button {
	position: absolute;
	right: 20px;
	top: 50%;
	transform: translate(0,-50%);
}

.search-input {

	&:focus {
		outline: none;
	}
}

    </style>
</head>
<body>
	
<header id="header-1" class="header">
  <nav class="header-nav">
    <div class="search-button">
      <a href="#" class="search-toggle" data-selector="#header-1"></a>
    </div>
    <form action="" class="search-box">
      <input type="text" class="text search-input" placeholder="Type here to search..." />
    </form>
  </nav>
</header>
    
<div class="container main">
    <h3>Showing Images from database</h3>
    <div class="img-box">
<?php
    $file_path = 'photo/';
    $result = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
    mysqli_select_db($result,DB_DATABASE) or die("Could not select the databse." .mysqli_error());
    $image_query = mysqli_query($result,"select Filepath,Ranking from Photograph");
    while($rows = mysqli_fetch_array($image_query))
    {
        $ranking = $rows['Ranking'];
        $img_src = $rows['Filepath'];
    ?>

    <div class="img-block">
    <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_src; ?>" width="300" height="200" class="img-responsive" />
    <p><strong><?php echo $img_name; ?></strong></p>
    </div>

    <?php
    }
?>
    </div>
</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

