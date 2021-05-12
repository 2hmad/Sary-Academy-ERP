<html>
<head>
    <title>Dashboard | Sary Academy</title>
    <?php include('links.php'); ?>
    <style>
    .card {
        max-width: 400px;
    }
    .box-card {
        padding: 13px;
        font-size: 20px;
        position: absolute;
        background: #1d2362;
        color: white;
        border-radius: 5px;
        right: 20px;
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
            <div class="row" style="margin-left: 5%;">
                <div class="card" style="padding: 30px;margin-right:5%;box-shadow: 0px 0px 5px 0px #cccc;">
                    <a href="card-verification.php?search=show-all">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Cards</h5>
                    </a>
                    <div class="box-card"><i class="fad fa-user-friends"></i></div>
                    <a href="card-verification.php?search=show-all">
                    <span style="font-size: 35px;font-weight: bold;">
<?php
$sql = "SELECT COUNT(*) AS total_cards FROM cards";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$count = $row['total_cards'];
echo $count;
?>
                    </span>
                    </a>
                    <span style="text-transform: uppercase;">total cards</span>
                </div>
                <div class="card" style="padding: 30px;margin-right:5%;box-shadow: 0px 0px 5px 0px #cccc;">
                    <a href="attendance.php?type=Employee&month=<?php echo date("M"); ?>">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Today Attendances</h5>
                    </a>
                    <div class="box-card" style="background: #004a99;"><i class="fad fa-user-friends"></i></div>
                    <a href="attendance.php?type=Employee&month=<?php echo date("M"); ?>">
                    <span style="font-size: 35px;font-weight: bold;">
<?php
$date = date("Y-m-d");
$sql = "SELECT COUNT(*) AS total_attend FROM attendance WHERE date='$date' AND type='Employee'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$count = $row['total_attend'];
echo $count;
?>
                    </span>
                    </a>
                    <span style="text-transform: uppercase;">total employees attendances today</span>
                </div>
            </div>
            <div class="row" style="margin-left: 5%;margin-top:3%">
            <div class="card" style="padding: 30px;margin-right:5%;box-shadow: 0px 0px 5px 0px #cccc;">
                    <a href="attendance.php?type=Students&month=<?php echo date("M"); ?>">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Today Attendances</h5>
                    </a>
                    <div class="box-card" style="background: #3caa36;"><i class="fad fa-user-friends"></i></div>
                    <a href="attendance.php?type=Students&month=<?php echo date("M"); ?>">
                    <span style="font-size: 35px;font-weight: bold;">
<?php
$date = date("Y-m-d");
$sql = "SELECT COUNT(*) AS total_attend FROM attendance WHERE date='$date' AND type='Student'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$count = $row['total_attend'];
echo $count;
?>
                    </span>
                    </a>
                    <span style="text-transform: uppercase;">total students attendances today</span>
                </div>
                <div class="card" style="padding: 30px;margin-right:5%;box-shadow: 0px 0px 5px 0px #cccc;">
                    <a href="sessions.php">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Kids Area</h5>
                    </a>
                    <div class="box-card" style="background: #f39710;"><i class="fad fa-user-friends"></i></div>
                    <a href="sessions.php">
                    <span style="font-size: 35px;font-weight: bold;">
<?php
$sql = "SELECT COUNT(*) AS total_kids FROM sessions WHERE status=''";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$count = $row['total_kids'];
echo $count;
?>
                    </span>
                    </a>
                    <span style="text-transform: uppercase;">total in kids area</span>
                </div>
            </div>
        <div style="margin-top: 5%;margin-left: 5%;">
        <table class="table caption-top table-striped table-bordered table-responsive">
        <caption style="text-transform: uppercase;text-align:center;font-weight:bold">Recently Added Of <?php echo date("F") ?></caption>
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
<?php
$sql = "SELECT * FROM cards ORDER BY id DESC LIMIT 4";
$query = mysqli_query($connect, $sql);
$num = mysqli_num_rows($query);
if($num > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
        $gender = $row['gender'];
        $code = $row['code'];
        echo "
        <tr>
            <td>$name</td>
            <td>$gender</td>
            <td>$code</td>
        </tr>
        ";
    }
}
?>
        </tbody>
        </table>
        </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>