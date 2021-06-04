<html>
<head>
    <title>لوحة تحكم | ساري اكاديمي</title>
    <?php include('links.php'); ?>
    <style>
    input[type="text"] {
        padding: 5px;
        border: 1px solid #CCC;
        border-radius: 5px;
        outline: none;
        width: 200px;
    }    
    #container {
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    .search-btn {
        padding: 5px;
        display: inline;
        background: white;
        color: #1d2362;
        border-radius: 5px;
        border: 1px solid #1d2362;
        font-weight: bold;
        outline: none;
        width: 100px;
    }
    .search-btn:hover {
        background-color: #1d2362;
        color: white;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }
    .options::after {
        display:none
    }
    </style>
</head>
<body style="background-color:#FAFAFA;padding:10px">
<?php include('header.php'); ?>

<div class="container" style="max-width: 95%;margin-top: 70px;">
    <div class="row">
        <div class="col-lg-3">
            <?php include('menu.php'); ?>
        </div>
        <div class="col-lg">
            <div class="row" style="background:white;height: 70px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px">
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> الأنشطة</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">            
            <form method="POST" style="display: flex;">
                <button class="btn btn-success refresh" onclick="location.reload();" style="width: auto;display:block;margin-bottom:2%"><i class="fas fa-sync"></i> تحديث</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: auto;display:block;margin-bottom:2%;margin-left: auto;"><i class="fas fa-trash"></i> حذف الكل</button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد؟</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        هل انت متأكد من هذا الاجراء؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary" name="delete-all">تأكيد</button>
                    </div>
                    </div>
                </div>
                </div>

            </form>

<?php
$date = date("Y-m-d");
$current_month = date("F");
if(isset($_POST['delete-all'])) {
    $sql = "DELETE FROM activities WHERE monthname(date)='$current_month'";
    $query = mysqli_query($connect, $sql);
}
?>
<?php
        echo '
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">الرقم التعريفي</th>
                <th scope="col">الاسم</th>
                <th scope="col">التاريخ</th>
                <th scope="col">الوقت</th>
                <th scope="col">الحالة</th>
            </tr>
        </thead>
        <tbody style="vertical-align: baseline">';

        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d");
        $current_time = date("h:i:sa");
        $current_month = date("F");

        if(isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }
        $num_per_page = 10;
        $from = ($page_number-1)*$num_per_page;        
        $sql = "SELECT * FROM activities WHERE monthname(date)='$current_month' ORDER BY id DESC LIMIT $from, $num_per_page";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            while($row = $query->fetch_assoc()) {
                $code = $row['code'];
                $date = $row['date'];
                $time = $row['time'];
                $status = $row['tag'];
            
            $sql_name = mysqli_query($connect, "SELECT * FROM cards WHERE code='$code'");
            if(mysqli_num_rows($sql_name) > 0) {
                while($row_name = mysqli_fetch_array($sql_name)) {
                    $name = $row_name['name'];
                    echo '
                    <tr>
                        <td>'.$code.'</td>    
                        <td>'.$name.'</td>
                        <td>'.$date.'</td>
                        <td>'.$time.'</td>
                        <td>'.$status.'</td>
                    </tr>
                    ';    
            }          
            }else {
                echo '
                <tr>
                    <td>'.$code.'</td>    
                    <td></td>
                    <td>'.$date.'</td>
                    <td>'.$time.'</td>
                    <td>'.$status.'</td>
                </tr>
                ';    
            } 
        }
        } else {
            echo '<caption>لا توجد بيانات متاحة</caption>';
        }
?>
        </tbody>
    </table>
    <?php
    $sql = "SELECT * FROM activities WHERE date='$date'";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
    }
?>

<form method="POST" style="width:auto" action="export_activity.php">
    <button class="btn btn-success" name="export" type="submit" style="width: auto;margin-bottom:2%;text-transform:capitalize;float:left"><i class="fas fa-file-csv"></i> تحميل انشطة اليوم</button>
</form>

<nav aria-label="Page navigation example" style="margin-left:auto;width:auto">
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
</div>
    </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
</html>