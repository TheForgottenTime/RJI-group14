<?php include "../inc/dbinfo.inc"; ?>
<?php

// forming search query from form data
$query = "SELECT Filepath, Rating, Keep FROM Photograph ORDER BY Rating DESC";
$result = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
mysqli_select_db($result,DB_DATABASE) or die("Could not select the databse." .mysqli_error());
$data_query = mysqli_query($result,$query);
$string = '[';
//displaying results of search 
while($rows = mysqli_fetch_array($data_query))
{
    $tab = str_repeat('&nbsp;', 4);
    $img_rating = $rows['Rating'];
    $img_src = $rows['Filepath'];
    $img_keep = $rows['Keep'];
    $string .= "<br>$tab{";
    $string .= "<br>$tab $tab \"Filepath\": \"$img_src\",";
    $string .= "<br>$tab $tab \"Rating\": \"$img_rating\",";
    $string .= "<br>$tab $tab \"Keep\": \"$img_keep\"";
    $string .= "<br>$tab},";
}

$string = substr_replace($string ,"", -1);

$string .="<br>]";
echo $string;
?>