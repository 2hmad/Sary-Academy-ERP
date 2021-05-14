<?php
$host = "remotemysql.com";
$user = "xlNys7Lwd7";
$pass = "XWvT9TQUfk";
$db = "xlNys7Lwd7";

//$host = "localhost";
//$user = "root";
//$pass = "";
//$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
mysqli_set_charset($connect,"utf8");

session_start();

ob_start();

?>