<?php
//$host = "us-cdbr-east-03.cleardb.com";
//$user = "bbf1e46cd1f90a";
//$pass = "9d4a4ff6";
//$db = "heroku_407b2626d06f99e";

$host = "localhost";
$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");mysqli_query($connect,"SET CHARACTER SET 'utf8'");
session_start();

ob_start();

?>