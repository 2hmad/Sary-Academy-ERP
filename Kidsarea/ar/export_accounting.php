<?php  
      //export_accounting.php

include('connection.php');
if(!isset($_SESSION['email'])) {
    header('Location: index.php');
} else {
    $email = $_SESSION['email'];
}

 if(isset($_GET["month"])) {  
    $month = $_GET['month'];
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=accounting.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('التسلسل#', 'الرقم التعريفي', 'الاسم' , 'عدد الساعات', 'السعر للساعه' , 'تاريخ', 'شهر'));  
      if($month === "All") {
        $query = "SELECT * from accounting ORDER BY id DESC";  
      } else {
        $query = "SELECT * from accounting WHERE month = '$month' ORDER BY id DESC";  
      }
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }
 ?>  
