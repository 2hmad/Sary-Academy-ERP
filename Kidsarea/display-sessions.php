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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> Online Sessions</h5>
            </div>
    <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
    <form method="POST" style="margin-top: 2%;margin-bottom:5%">
        <div style="text-align: center;">
        <select name="month">
            <?php
            if(!isset($_GET['month'])) {
                echo '<option value="" hidden>Choose Month</option>';
            } else {
                $month_get = $_GET['month'];
                echo '<option hidden>'.$month_get.'</option>';
            }
            ?>
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>
        <input type="submit" class="apply-btn" name="apply" value="Apply">
        </div>
    </form>
    <?php
        if(isset($_POST['apply'])) {
            $month = $_POST['month'];
            if($month !== "") {
                header('Location: display-sessions.php?month='.$month.'');
            } else {
                header('Location: sessions.php');
            }
        }
    ?>
    
    <?php
        echo '
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Card ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody style="vertical-align: baseline">';

        date_default_timezone_set("Africa/Cairo");
        $current_date = date("Y-m-d");
        $current_time = date("H:i");
        if(isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }
        $num_per_page = 10;
        $from = ($page_number-1)*$num_per_page;     
        
        if(!isset($_GET['month'])) {
        $sql = "SELECT * FROM sessions WHERE date='$current_date' ORDER BY id DESC LIMIT $from, $num_per_page";
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
          $select_check = "SELECT * FROM sessions WHERE status='' AND date='$current_date' AND end_time <= '$current_time'";
          $query_check = mysqli_query($connect, $select_check);
          if(mysqli_num_rows($query_check) > 0) {
              while($check_time = mysqli_fetch_array($query_check)) {
                $code_check = $check_time['code'];

                $sql_name = mysqli_query($connect, "SELECT * FROM cards WHERE code='$code_check'");
                while($row_name = mysqli_fetch_array($sql_name)) {
                  $name = $row_name["name"];
                }  
                $current_time = date("H:i");
                $sql_update = "UPDATE sessions SET status='Complete' WHERE code = '$code_check' AND date='$current_date' AND end_time <= '$current_time'";
                $query_update = mysqli_query($connect, $sql_update);
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Children : '.$name.' Outside of the kids area
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    var snd = new Audio("Alarm.mp3");    
                    snd .play();
                </script>';
                }
          }
      } else {
            echo '<caption>No data available now</caption>';
      }

    } elseif(isset($_GET['month'])) {
      $select_month = $_GET['month'];
      $sql = "SELECT * FROM sessions WHERE monthname(date)='$select_month' ORDER BY id DESC LIMIT $from, $num_per_page";
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
        $select_check = "SELECT * FROM sessions WHERE status='' AND monthname(date)='$select_month' AND end_time <= '$current_time'";
        $query_check = mysqli_query($connect, $select_check);
        if(mysqli_num_rows($query_check) > 0) {
            while($check_time = mysqli_fetch_array($query_check)) {
              $code_check = $check_time['code'];

              $sql_name = mysqli_query($connect, "SELECT * FROM cards WHERE code='$code_check'");
              while($row_name = mysqli_fetch_array($sql_name)) {
                $name = $row_name["name"];
              }  
              $sql_update = "UPDATE sessions SET status='Complete' WHERE code = '$code_check' AND monthname(date)='$select_month' AND end_time <= '$current_time'";
              $query_update = mysqli_query($connect, $sql_update);
              echo '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Children : '.$name.' Outside of the kids area
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <script>
              var snd = new Audio("Alarm.mp3");    
              snd .play();
              </script>';
              }
        }
    } else {
          echo '<caption>No data available now</caption>';
    }

    }
?>
        </tbody>
    </table>

    <?php
        if(!isset($_GET['month'])) {
          $sql = "SELECT * FROM sessions WHERE date='$current_date'";
        } else {
          $sql = "SELECT * FROM sessions WHERE monthname(date)='$select_month'";
        }
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
    
    </div>
    </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>

</html>