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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Accounting</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
<button class="btn btn-success refresh" onclick="location.reload();" style="width: auto;display:block;margin-bottom:2%"><i class="far fa-sync"></i> Refresh</button>

<?php
        echo '
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
        $sql = "SELECT * FROM accounting WHERE date='$date' ORDER BY id DESC LIMIT $from, $num_per_page";
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
                <td>'.$total.' EGP</td>
                </tr>
                ';
            }
        } else {
            echo '<caption>No data available at this moment</ؤش>';
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