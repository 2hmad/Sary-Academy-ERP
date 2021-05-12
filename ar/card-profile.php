<?php  
 if(isset($_POST["card_id"]))  
 {  
      $output = '';  
      include('../connection.php');
      $query = "SELECT * FROM cards WHERE id = '".$_POST["card_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $kind = $row["kind"];
           if($kind == "Employee") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>الاسم</label></td>  
                    <td>'.$row["name"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>تاريخ الميلاد</label></td>  
                    <td>'.$row["birthday"].'</td> 
               </tr>
               <tr>
                    <td width="30%"><label>رقم الهاتف</label></td>  
                    <td>'.$row["phone"].'</td>   
               </tr>
               <tr>
                    <td width="30%"><label>الجنس</label></td>  
                    <td>'.$row["gender"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>نوع الكارت</label></td>  
                    <td>'.$row["kind"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>الوظيفة</label></td>  
                    <td>'.$row["position"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>الراتب الشهري</label></td>  
                    <td>'.$row["salary"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Kids Area") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>الاسم</label></td>  
                    <td>'.$row["name"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>تاريخ الميلاد</label></td>  
                    <td>'.$row["birthday"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>رقم الهاتف</label></td>  
                    <td>'.$row["phone"].'</td>   
               </tr>
               <tr>
                    <td width="30%"><label>الجنس</label></td>  
                    <td>'.$row["gender"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>نوع الكارت</label></td>  
                    <td>'.$row["kind"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>عدد الساعات في الكارت</label></td>  
                    <td>'.$row["hours"].'</td>  
               </tr>  
               ';  
           } elseif($kind == "Student") {
               $output .= '  
               <tr>  
                    <td width="30%"><label>الاسم</label></td>  
                    <td>'.$row["name"].'</td>  
               </tr>
               <tr>
                    <td width="30%"><label>تاريخ الميلاد</label></td>  
                    <td>'.$row["birthday"].'</td>  
               </tr>
               <tr>     
                    <td width="30%"><label>رقم الهاتف</label></td>  
                    <td>'.$row["phone"].'</td>   
               </tr>
               <tr>    
                    <td width="30%"><label>الجنس</label></td>  
                    <td>'.$row["gender"].'</td>  
               </tr>    
               <tr>  
                    <td width="30%"><label>نوع الكارت</label></td>  
                    <td>'.$row["kind"].'</td>  
               </tr>  
               ';  
           }
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
