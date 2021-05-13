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
    .apply-btn {
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
    .apply-btn:hover {
        background-color: #1d2362;
        color: white;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }
    .options::after {
        display:none
    }
    select {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #CCC;
        outline: none;
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> الحضور والانصراف</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                    <div style="display:block;text-align:center">
                        <select name="role" required>
                            <option value="">الوظيفة</option>
                            <option>طالب</option>
                            <option>موظف</option>
                        </select>
                        <select name="month" required>
                            <option value="">اختر الشهر</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option=>
                            <option>August</option=>
                            <option>September</option=>
                            <option>October</option=>
                            <option>November</option=>
                            <option>December</option=>
                        </select>
                        <input type="submit" class="apply-btn" name="apply" value="بحث">
                    </div>
                </form>
<?php
echo '
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead class="table-dark">
    <tr>
    <th scope="col">الرقم التعريفي</th>
    <th scope="col">الاسم</th>
    <th scope="col">المهنة</th>
    <th scope="col">التاريخ</th>
    <th scope="col">الحضور</th>
    <th scope="col">الانصراف</th>
    </tr>
    </thead>
    <tbody style="vertical-align: baseline">
';

if(isset($_GET['page'])) {
    $page_number = $_GET['page'];
} else {
    $page_number = 1;
}
$num_per_page = 10;
$from = ($page_number-1)*$num_per_page;

if(isset($_POST['apply'])) {
    $month = $_POST['month'];
    $type = $_POST['role'];
    header('Location: attendance.php?type='.$type.'&month='.$month.'');
}


if(isset($_GET['month']) && isset($_GET['type'])) {
    $month_get = $_GET['month'];
    $type_get = $_GET['type'];
} else {
    $month_get = "";
    $type_get = "";
}

$sql = "SELECT * FROM attendance WHERE type='$type_get' AND month='$month_get' ORDER BY id DESC LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);        

if(mysqli_num_rows($query) > 0) {

    while($row = mysqli_fetch_assoc($query)) {
        $code = $row['code'];
        $name = $row['name'];
        $position = $row['position'];
        $date = $row['date'];
        $present = $row['present'];
        $absence = $row['absence'];
        
        echo '
        <tr>
            <td>'.$code.'</td>
            <td>'.$name.'</td>
            <td>'.$position.'</td>
            <td>'.$date.'</td>
            <td>'.$present.'</td>
            <td>'.$absence.'</td>
        </tr>
        ';
    }

} else {
    echo "<caption>لا توجد بيانات متاحة</caption>";
}

echo '
    </tbody>
    </table>
    </div>
';

if(isset($_GET['month']) && isset($_GET['type'])) {
    $sql_pagination = "SELECT * FROM attendance WHERE month='$month_get'";
} else {
    $sql_pagination = "SELECT * FROM attendance";
}
$query_pagination = mysqli_query($connect, $sql_pagination);
$totalItems = mysqli_num_rows($query_pagination);

if($totalItems > 0) {
    $total_pages = ceil($totalItems/$num_per_page);
} else {
    $total_pages = 1;
}

for($i=1;$i<=$total_pages;$i++){
}

?>

<?php
if(isset($_GET['month']) && $totalItems > 0) {
    echo '
    <form method="POST" style="width:auto" action="export_attendance.php?month='.$month_get.'">
        <button class="btn btn-success" name="export" type="submit" style="width: auto;margin-bottom:2%;text-transform:capitalize;float:left"><i class="fas fa-file-csv"></i> اصدار حضور شهر '.$month_get.'</button>
    </form>
    ';
}
?>

<nav aria-label="Page navigation example" style="margin-left:auto;width:auto">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="
        <?php
        if(isset($_GET['month']) && isset($_GET['type'])) {
            echo "?type=$type_get&month=$month_get";
            if(($page_number - 1) > 0){
                echo "&page=";
                echo $page_number-1;
            } else {
                echo "&page=";
                echo $page_number;
            }    
        }
        ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#"><?php echo "$page_number" ?></a></li>
    <li class="page-item">
      <a class="page-link" href="
    <?php
    if(isset($_GET['month']) && isset($_GET['type'])) {
        echo "?type=$type_get&month=$month_get";
        if(($page_number + 1) < $total_pages){
            echo "&page=";
            echo $page_number + 1;
        } elseif(($page_number + 1) >= $total_pages) {
            echo "&page=";
            echo $total_pages;
        }
    }
    ?>" aria-label="Next">
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