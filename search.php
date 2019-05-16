<?php include "../inc/dbinfo.inc"; ?>
<?php
    session_start();
    // if not logged in redirect
    if (!$_COOKIE['username']){
        header("location: http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Search</title>
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
    #title {
        color: cornflowerblue;
        font-size: 1em;
    }
    label {
        color: #8f92a9;
        font-size: 1em;
        padding: 1em;
        padding-left: 2em;
        
    }
    
    </style>
</head>

    
<body>	
    <div class="navbar">
        <a href="index.php" id='title'>Reynolds Journalism Institute</a>
        <a href="/logout.php">Logout</a>
        <a href="/search.php">Search Images</a>
        <a href="/upload.php">Upload Images</a>
        <a href="/delete.php">Delete Marked Images</a>
    </div>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" action="index.php" method="post">
					<span class="login100-form-title p-b-51">
						Search Images
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Filepath is required">
						<input class="input100" type="text" name="minScore" placeholder="Minimum Score (1-1000)">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Filepath is required">
						<input class="input100" type="text" name="maxScore" placeholder="Maximum Score (1-1000)">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Filepath is required">
						<label><input class="" type="checkbox" name="markDelete" checked>  Show Images Marked For Deletion</label>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Filepath is required">
						<label><input class="" type="checkbox" name="markKeep" checked>  Show Images Marked To Be Kept</label>
						
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Search
						</button>
					</div>

				</form>
			</div>
		</div>
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

</body>
</html>

