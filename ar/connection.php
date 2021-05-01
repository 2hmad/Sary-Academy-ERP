<?php
$host = "localhost";
//$user = "aqtardes_kids";
//$pass = "kidsarea";
//$db = "aqtardes_kidsarea";

$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
mysqli_query($connect,"SET CHARACTER SET 'utf8'");

ob_start();
session_start();
?>