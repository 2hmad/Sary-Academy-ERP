<?php  
 if(isset($_POST["card_id"]))  
 {  
      $output = '';  
      include('connection.php');
      $query = "SELECT * FROM cards WHERE id = '".$_POST["card_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $kind = $row["kind"];
           if($kind == "Employee") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td width="70%">'.$row["name"].'</td>  
                    <td width="30%"><label>Birthday</label></td>  
                    <td width="70%">'.$row["birthday"].'</td> 
                    <td width="30%"><label>Phone</label></td>  
                    <td width="70%">'.$row["phone"].'</td>   
                    <td width="30%"><label>Gender</label></td>  
                    <td width="70%">'.$row["gender"].'</td>  
                    <td width="30%"><label>Type</label></td>  
                    <td width="70%">'.$row["kind"].'</td>  
                    <td width="30%"><label>Position</label></td>  
                    <td width="70%">'.$row["position"].'</td>  
                    <td width="30%"><label>Salary</label></td>  
                    <td width="70%">'.$row["salary"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Kids Area") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td width="70%">'.$row["name"].'</td>  
                    <td width="30%"><label>Birthday</label></td>  
                    <td width="70%">'.$row["birthday"].'</td>  
                    <td width="30%"><label>Phone</label></td>  
                    <td width="70%">'.$row["phone"].'</td>   
                    <td width="30%"><label>Gender</label></td>  
                    <td width="70%">'.$row["gender"].'</td>  
                    <td width="30%"><label>Type</label></td>  
                    <td width="70%">'.$row["kind"].'</td>  
                    <td width="30%"><label>Hours in card</label></td>  
                    <td width="70%">'.$row["hours"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Student") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td width="70%">'.$row["name"].'</td>  
                    <td width="30%"><label>Birthday</label></td>  
                    <td width="70%">'.$row["birthday"].'</td>  
                    <td width="30%"><label>Phone</label></td>  
                    <td width="70%">'.$row["phone"].'</td>   
                    <td width="30%"><label>Gender</label></td>  
                    <td width="70%">'.$row["gender"].'</td>  
                    <td width="30%"><label>Type</label></td>  
                    <td width="70%">'.$row["kind"].'</td>  
               </tr>  
               ';  
           }
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
