<?php

// HTTP Post
$ch = curl_init("http://6febfed6.ngrok.io");

// Setting values
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "filepath=http://rji.augurlabs.io/20170902_MuMsu/1q/20170921_mumsu_jd_1013.JPG");

// return number
$server_output = curl_exec($ch);
echo $server_output;

curl_close($ch);

?>