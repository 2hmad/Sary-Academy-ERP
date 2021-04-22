<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
ob_start();
session_start();
?>