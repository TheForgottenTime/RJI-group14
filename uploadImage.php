<?php include "../inc/dbinfo.inc"; ?>
<?php
    // if no header set return to login page
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
        .tableWrapper {
            width: 100em;
            height: 20em;
            overflow: auto;
        }
        #button {
            width: 100%;
        }
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

        .navbar a:hover {
            background: #ddd;
        }
        #title {
            color: cornflowerblue;
            font-size: 1em;
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
                <div class='tableWrapper'>
                    <table>
                        <tbody>
                            <?php
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
                                        // forming image path for API
                                        $imagepath = str_replace("http://rji.augurlabs.io/", "", $imagepath);

                                        // HTTP Post
                                        $ch = curl_init("http://6febfed6.ngrok.io");

                                        // Setting values
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_POST, 1);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, "filepath=$imagepath");

                                        // return number from API
                                        $rating = curl_exec($ch);

                                        curl_close($ch);


                                        // formatting filepath for display                                
                                        $imagepath = basename($imagepath);
                                        $imagepath = $imagepath . '    ';

                                        echo "<tr>
                                                <td>".$imagepath."</td>
                                                <td>".$rating."</td>
                                        </tr>";

                                        $user= $_COOKIE["username"];
                                        if ($rating > 650) {
                                            $keep = 1;
                                        }
                                        else {
                                            $keep = 0;
                                        }
                                        $sql = "INSERT INTO Photograph VALUES ('$filepath', '$user', '$rating', '$keep', 'N/A')";
                                        mysqli_query($conn, $sql);
                                    }
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
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