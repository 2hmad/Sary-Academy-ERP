<?php  
      //export_activity.php 
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
       
 if(isset($_POST["export"]))  
 {  
      include('../connection.php');
     
      header('Content-Type: text/csv; charset=UTF8');  
      header('Content-Disposition: attachment; filename=activities.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('التسلسل','الرقم التعريفي', 'التاريخ', 'الوقت', 'الحالة'));  
      $date = date("Y-m-d");
      $current_month = date("F");
      $query = "SELECT * from activities WHERE monthname(date)='$current_month' ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }
