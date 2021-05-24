<?php
$host = "bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
$user = "tfkx1mkuw3590scm";
$pass = "amj1es3fhfnt4kw5";
$db = "f6yog60g77dtmdrl";

//$host = "localhost";
//$user = "root";
//$pass = "";
//$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
mysqli_set_charset($connect, "set names 'utf8'");

session_start();

ob_start();

?>