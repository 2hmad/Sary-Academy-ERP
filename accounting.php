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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Accounting</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
            <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                    <div style="display:block;text-align:center">
                        <select type="text" name="month" required>
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
                        <input type="submit" class="apply-btn" name="apply" value="Apply">
                    </div>
                </form>
<?php
        echo '
        <div class="table-responsive">
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Hours</th>
                <th scope="col">Price per hour</th>
                <th scope="col">Date</th>
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
            $month = $_POST['month'];
            header('Location: accounting.php?month='.$month.'');
        }
            
        if(isset($_GET['month'])) {
            $month_get = $_GET['month'];
            $sql = "SELECT * FROM accounting WHERE month='$month_get' ORDER BY id DESC LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            $num = mysqli_num_rows($query);
            if($num > 0) {
                while($row = $query->fetch_assoc()) {
                    $code = $row['code'];
                    $date = $row['date'];
                    $hours = $row['hours'];
                    $price = $row['price'];
                    $total = $hours*$price;
                    echo '
                    <tr>
                    <td>'.$code.'</td>
                    <td>'.$hours.'</td>
                    <td>'.$price.' EGP</td>
                    <td>'.$date.'</td>
                    <td class="total">'.$total.' EGP</td>
                    </tr>
                    ';
                }
            } else {
                echo '<caption>No data available at this moment</caption>';
            }    
        }
echo '
    </tbody>
    </table>
    </div>
    
';

    if(isset($_GET['month'])) {
        $sql_pagination = "SELECT * FROM accounting WHERE month='$month_get'";
    } else {
        $sql_pagination = "SELECT * FROM accounting";
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

    <span class="show-tot" style="text-align: center;font-weight: bold;font-size: 19px;text-transform:uppercase"></span>

<?php
if(isset($_GET['month']) && $totalItems > 0) {
    echo '
    <form method="POST" style="width:auto" action="export_accounting.php?month='.$month_get.'">
        <button class="btn btn-success" name="export" type="submit" style="width: auto;margin-bottom:2%;text-transform:capitalize;float:left"><i class="far fa-file-csv"></i> Export '.$month_get.'</button>
    </form>
    ';
}
?>


<nav aria-label="Page navigation example" style="margin-left:auto;width:auto">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="
        <?php
        if(isset($_GET['month'])) {
            echo "?month=$month_get";
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
    if(isset($_GET['month'])) {
        echo "?month=$month_get";
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
<script>
var total = 0;
var allTotal = document.querySelectorAll(".total")
allTotal.forEach(totalVal=>{
    
   total += Number(totalVal.innerHTML.match(/\d+/)[0])
})
document.querySelector(".show-tot").innerHTML = "Total / Month: " + total + " EGP";
</script>
</html>