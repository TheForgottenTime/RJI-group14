<?php include "../inc/dbinfo.inc"; ?>
<?php 
$query = "SELECT * FROM Photograph";
//connecting to db

$result = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
mysqli_select_db($result,DB_DATABASE) or die("Could not select the databse." .mysqli_error());
$image_query = mysqli_query($result,$query);
//displaying results of search 
while($rows = mysqli_fetch_array($image_query))
{
  $filepath=$row['Filepath']; 
  $rating=$row['Rating']; 
  $keep=$row['Keep'];

  $posts[] = array('Filepath'=> $filepath, 'Rating'=> $rating, 'Keep'=> $keep);
} 

$response['posts'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

?> 