<?php  
      //export_attendence.php

include('connection.php');
if(!isset($_SESSION['email'])) {
    header('Location: index.php');
} else {
    $email = $_SESSION['email'];
}

 if(isset($_GET["code"])) {  
     $code = $_GET['code'];
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=attendence.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('No#','Card code', 'Name', 'Position', 'Type', 'Month', 'Date', 'Present', 'Absence'));  
      $date = date("Y-m-d");
      $query = "SELECT * from attendance WHERE code = '$code' ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } elseif( isset($_GET['code']) && isset($_GET['month']) ) {
    $code = $_GET['code'];
    $month = $_GET['month'];
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=attendence.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('No#','Card code', 'Name', 'Position', 'Type', 'Month', 'Date', 'Present', 'Absence'));  
    $date = date("Y-m-d");
    $query = "SELECT * from attendance WHERE code = '$code' AND month='$month' ORDER BY id DESC";  
    $result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
 }
 ?>  
