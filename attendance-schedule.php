<html>
<head>
    <title>Dashboard | Sary Academy</title>
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Attendance</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                    <div style="display:block;text-align:center">
                        <input type="text" name="code" placeholder='Person Card Code' required>
                        <input type="submit" class="apply-btn" name="apply" value="Apply">
                    </div>
                </form>
<?php
echo '
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead class="table-dark">
    <tr>
    <th scope="col">Name</th>
    <th scope="col">Position</th>
    <th scope="col">Date</th>
    <th scope="col">Present</th>
    <th scope="col">Absence</th>
    <th scope="col">Total</th>
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
    $code = $_POST['code'];
    header('Location: attendance-schedule.php?code='.$code.'');
}

if(isset($_GET['code'])) {
    $code = $_GET['code'];
$sql = "SELECT * FROM attendance WHERE code='$code' ORDER BY id DESC LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);        

if(mysqli_num_rows($query) > 0) {

    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
        $position = $row['position'];
        $date = $row['date'];
        $present = $row['present'];
        $absence = $row['absence'];
        
        $date1 = strtotime($present);
        $date2 = strtotime($absence);
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

        echo '
        <tr>
            <td>'.$name.'</td>
            <td>'.$position.'</td>
            <td>'.$date.'</td>
            <td>'.$present.'</td>
            <td>'.$absence.'</td>
            <td>'.$hours.' Hours : '.$minutes.' Minutes</td>
        </tr>
        ';
    }

} else {
    echo "<caption>No data Available</caption>";
}
}
echo '
    </tbody>
    </table>
    </div>
';

if(isset($_GET['code'])) {
    $sql_pagination = "SELECT * FROM attendance WHERE code='$code'";
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
if(isset($_GET['code']) && $totalItems > 0) {
    echo '
    <form method="POST" style="width:auto" action="export_person.php?code='.$code.'">
        <button class="btn btn-success" name="export" type="submit" style="width: auto;margin-bottom:2%;text-transform:capitalize;float:left"><i class="far fa-file-csv"></i> Export '.$name.'</button>
    </form>
    ';
}
?>

<nav aria-label="Page navigation example" style="margin-left:auto;width:auto">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="
        <?php
        if(isset($_GET['code'])) {
            echo "?code=$code";
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
    if(isset($_GET['code'])) {
        echo "?code=$code";
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