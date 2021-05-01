<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
     include('connection.php');
     header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Name', 'Phone', 'Birthday', 'Gender', 'Code', 'Profile Pic', 'Hours'));  
      $query = "SELECT * from cards ORDER BY id ASC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  
