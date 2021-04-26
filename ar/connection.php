<?php
$host = "localhost";
//$user = "id14515899_kids_sys";
//$pass = "V_!}>6wAds|}wBnT";
//$db = "id14515899_kidsarea";

$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
mysqli_query($connect,"SET CHARACTER SET 'utf8'");

ob_start();
session_start();
?>