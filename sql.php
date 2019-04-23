<?php include "../inc/dbinfo.inc"; ?>
<?php
$con=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = '';
mysqli_query($con,$sql);
mysqli_close($con);
?>