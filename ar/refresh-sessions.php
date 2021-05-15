<?php
include('../connection.php');
        echo '
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">الرقم التعريفي</th>
                <th scope="col">الاسم</th>
                <th scope="col">التاريخ</th>
                <th scope="col">وقت البدء</th>
                <th scope="col">وقت الانتهاء</th>
                <th scope="col">الحالة</th>
            </tr>
        </thead>
        <tbody style="vertical-align: baseline">';

        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d");
        $current_time = date("h:i:sa");
        if(isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }
        $num_per_page = 10;
        $from = ($page_number-1)*$num_per_page;        
        $sql = "SELECT * FROM sessions WHERE date='$date' ORDER BY id DESC LIMIT $from, $num_per_page";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            while($row = $query->fetch_assoc()) {
                $code = $row['code'];
                $date = $row['date'];
                $start_time = $row['start_time'];
                $end_time = $row['end_time'];
                $status = $row['status'];

                $sql_name = mysqli_query($connect, "SELECT * FROM cards WHERE code='$code'");
                while($row_name = mysqli_fetch_array($sql_name)) {
                  $name = $row_name["name"];
                echo '
                    <tr>
                        <td><span class="code">'.$code.'</span></td>
                        <td><span class="name">'.$name.'</span></td>
                        <td>'.$date.'</td>
                        <td>'.$start_time.'</td>
                        <td><span class="end-time">'.$end_time.'</span></td>
                        <td><span class="msg">'.$status.'</span></td>
                    </tr>
                ';  
            }
          }
            $sql_update = "UPDATE sessions SET status='Complete' WHERE date='$date' AND end_time <= '$current_time' AND code='$code'";
            $query_update = mysqli_query($connect, $sql_update);            
        } else {
            echo '<caption>لا توجد بيانات متاحة في الوقت الحالي</caption>';
        }
?>
        </tbody>
    </table>

    
    <?php
    $sql = "SELECT * FROM sessions WHERE date='$date'";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
    }
?>

<nav aria-label="Page navigation example">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="?page=<?php if(($page_number - 1) > 0){ echo $page_number - 1; }else{ echo $page_number; }?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#"><?php echo "$page_number" ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php if(($page_number + 1) < $total_pages){ echo $page_number + 1; }elseif(($page_number + 1) >= $total_pages){ echo $total_pages; }?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<span class="current-time" style="display:none"><?php echo "$current_time" ?></span>

<script>
var time1 = document.querySelector(".current-time").innerHTML;
var time2 = document.querySelector(".end-time").innerHTML;

var time1InMinutesForTime1 = getTimeAsNumberOfMinutes(time1);
var time1InMinutesForTime2 = getTimeAsNumberOfMinutes(time2);

function getTimeAsNumberOfMinutes(time) {
    var timeParts = time.split(":");
    var timeInMinutes = (timeParts[0] * 60) + timeParts[1];
    return timeInMinutes;
}

if(time1InMinutesForTime1 >= time1InMinutesForTime2) {
  var msg = document.querySelector(".msg").innerHTML;
  if(msg === "Complete" || msg === "Stopped") {

  } else {
    var code = document.querySelector(".name").innerHTML;
    alert('الطفل ' + code + ' خارجة من منطقة الالعاب');
    /*setAlarm(time1, time2, () => {
    document.querySelector("audio").play().then(()=>{
      setTimeout(() => {
        alert(code + ' coming out of Kids Area')
      }, 0);
    })
  });*/
};
}
</script>
