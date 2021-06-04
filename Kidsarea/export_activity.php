<?php  
      //export_activity.php  
 if(isset($_POST["export"]))  
 {  
      include('connection.php');
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=activities.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('No#','Card code', 'Date', 'Time', 'Tag'));  
      $date = date("Y-m-d");
      $query = "SELECT * from activities WHERE date = '$date' ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  
