<html>
<head>
    <title>لوحة تحكم منطقة الألعاب | اكاديمية ساري</title>
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> اضافة ساعات</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                <div id='container'>
                    <label style="font-weight: bold;">الرقم التعريفي للكارت</label>
                    <input type="text" name="code" required>
                    <label style="font-weight: bold;">الساعات <span class="total">(المبلغ الاجمالي: <span class="price"></span> )</span></label>
                    <input type="number" name="hours" class="hours-num" value="0" required>
                    <?php
                    $sql = "SELECT * FROM price";
                    $query = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_array($query)) {
                        $price = $row['price'];
                    }
                    ?>
                    
                    <span class="hidden-price" style="display:none"><?php echo "$price" ?></span>
                </div>
                    <input type="submit" class="hours-btn" name="add-hours" value="اضافة ساعات للكارت">
                </form>
<?php

if(isset($_POST['add-hours'])) {
    $code = $_POST['code'];
    
    if($code !== "") {
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
                $time = date("h:i:sa");
                $tag = "Added " . $hours . " Hours" . "<br>" . "Hour rate: $price EGP";
                $sql = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', '$tag')";
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
  output.innerHTML = this.value * calculate + " جنيه";
}

input.addEventListener("input", keydownHandler);

</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</html>