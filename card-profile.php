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
                    <td>'.$row["name"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>Birthday</label></td>  
                    <td>'.$row["birthday"].'</td> 
               </tr>
               <tr>
                    <td width="30%"><label>Phone</label></td>  
                    <td>'.$row["phone"].'</td>   
               </tr>
               <tr>
                    <td width="30%"><label>Gender</label></td>  
                    <td>'.$row["gender"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>Type</label></td>  
                    <td>'.$row["kind"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>Position</label></td>  
                    <td>'.$row["position"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>Salary</label></td>  
                    <td>'.$row["salary"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Kids Area") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td>'.$row["name"].'</td>  
                    <td width="30%"><label>Birthday</label></td>  
                    <td>'.$row["birthday"].'</td>  
                    <td width="30%"><label>Phone</label></td>  
                    <td>'.$row["phone"].'</td>   
                    <td width="30%"><label>Gender</label></td>  
                    <td>'.$row["gender"].'</td>  
                    <td width="30%"><label>Type</label></td>  
                    <td>'.$row["kind"].'</td>  
                    <td width="30%"><label>Hours in card</label></td>  
                    <td>'.$row["hours"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Student") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td>'.$row["name"].'</td>  
                    <td width="30%"><label>Birthday</label></td>  
                    <td>'.$row["birthday"].'</td>  
                    <td width="30%"><label>Phone</label></td>  
                    <td>'.$row["phone"].'</td>   
                    <td width="30%"><label>Gender</label></td>  
                    <td>'.$row["gender"].'</td>  
                    <td width="30%"><label>Type</label></td>  
                    <td>'.$row["kind"].'</td>  
               </tr>  
               ';  
           }
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
