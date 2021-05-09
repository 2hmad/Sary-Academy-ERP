<html>
<head>
    <title>Dashboard | Sary Academy</title>
    <?php include('links.php'); ?>
    <style>
    input[type="text"], input[type="number"] {
        padding: 5px;
        border: 1px solid #CCC;
        border-radius: 5px;
        outline: none;
        width: 300px;
        display: block;
        margin-bottom: 2%;
        margin-left: auto;
        margin-right: auto;
    }    
    #container {
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    .hours-btn {
        padding: 5px;
        display: block;
        background: white;
        color: #1d2362;
        border-radius: 5px;
        border: 1px solid #1d2362;
        font-weight: bold;
        outline: none;
        width: 100px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
    }
    .hours-btn:hover {
        background-color: #1d2362;
        color: white;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }
    .options::after {
        display:none
    }
    .total {
        font-size: 13px;
        font-weight: 500;
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Add Hours</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                <div id='container'>

<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];
        $sql_total = "SELECT * FROM cards WHERE code = '$code'";
        $query_total = mysqli_query($connect, $sql_total);
        while($row_total = mysqli_fetch_array($query_total)) {
            $total_hours = $row_total['hours'];
        }
        echo '
        <label style="font-weight: bold;">Hours in card</label>
        <input type="number" value="'.$total_hours.'" disabled>
        <label style="font-weight: bold;">Hours <span class="total">(Total price: <span class="price"></span> )</span></label>
        <input type="number" name="hours" class="hours-num" value="0" required>';

        $sql = "SELECT * FROM cards WHERE code=".$_GET['code']."";
        $query = mysqli_query($connect, $sql);
        
        $price = $_GET['price'];
        echo '
        <span class="hidden-price" style="display:none">'.$price.'</span>
        </div>
        <input type="submit" class="hours-btn" name="add-hours" value="Add Hours">
        </form>
        ';
        
    } else {
        echo '
        <label style="font-weight: bold;">Card ID</label>
        <input type="text" name="code" required>
        <label style="font-weight: bold;">Hour Price</label>
        <input type="text" name="price" required>
        </div>
        <input type="submit" class="hours-btn" name="next" value="Next Step">
        </form>
        ';
    }
?>

<?php

if(isset($_POST['next'])) {
    $code = $_POST['code'];
    $price = $_POST['price'];

    $sql_check = "SELECT * FROM cards WHERE code = '$code'";
    $query_check = mysqli_query($connect, $sql_check);
    $num = mysqli_num_rows($query_check);
    if($num > 0 ) {
        header('Location: add-hours.php?code='.$code.'&price='.$price.'');
    } else {
        echo "<div class='alert alert-danger'>This card not found</div>";
    }
    
}

if(isset($_POST['add-hours'])) {
    $code = $_GET['code'];
    $price = $_GET['price'];

    if($code !== "" && $price !== "") {
        $sql_check = "SELECT * FROM cards WHERE code = '$code'";
        $query_check = mysqli_query($connect, $sql_check);
        $num = mysqli_num_rows($query_check);
        if($num > 0 ) {
            $sql_add = "SELECT * FROM cards WHERE code = '$code'";
            $query_add = mysqli_query($connect, $sql_add);
            while($row_add = mysqli_fetch_array($query_add)) {
                $hours_add = $row_add['hours'];
            }
            $hours = $_POST['hours'];
            if($hours > 0) {
                $hours_modify = $hours + $hours_add;
                $sql_update = "UPDATE cards SET hours = '$hours_modify' WHERE code='$code'";
                $query_update = mysqli_query($connect, $sql_update);
                
                $date = date("Y-m-d");
                $sql = "INSERT INTO accounting (code, hours, price, date) VALUES ('$code', '$hours', '$price', '$date')";
                $query = mysqli_query($connect, $sql);
    
                echo "<div class='alert alert-success'>Added $hours hours to this card</div>";    
            } else {
                echo "<div class='alert alert-danger'>Please Enter Hours</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>This Card is not found</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Please Enter Card Code</div>";
    }
}
?>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
<script>

var input  = document.querySelector("[type=number]"),
    output = document.querySelector(".price"),
    calculate = document.querySelector(".hidden-price").innerHTML;

function keydownHandler() {
  output.innerHTML = this.value * calculate + " EGP";
}

input.addEventListener("input", keydownHandler);

</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</html>