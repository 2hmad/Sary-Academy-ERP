<html>
<head>
    <title>Kids Area Dashboard | Sary Academy</title>
    <?php include('links.php'); ?>
    <style>
    input[type="number"] {
        padding: 5px;
        border: 1px solid #CCC;
        border-radius: 5px;
        outline: none;
        margin-bottom: 3%;
    }    
    #container {
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    input[type="submit"] {
        padding: 10px;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 3%;
        background: white;
        color: #1d2362;
        border-radius: 15px;
        border: 1px solid #1d2362;
        font-weight: bold;
        outline: none;
    }
    input[type="submit"]:hover {
        background-color: #1d2362;
        color: white;
        -webkit-transition: 0.5s;
        transition: 0.5s;
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Edit hour price</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;" enctype="multipart/form-data">
                    <div id='container'>
                        <label style="font-weight: bold;">Hour Price</label>
                        <input type="number" name="hour-price" value=
                        <?php
                        $sql_select = "SELECT * FROM price";
                        $query_select = mysqli_query($connect, $sql_select);   
                        $num = mysqli_num_rows($query_select);
                        if($num > 0) {
                            while($row = mysqli_fetch_array($query_select)) {
                                $price_rate = $row['price'];
                                echo "$price_rate";
                            }
                        } else {
                            echo "0";
                        }
                        ?> required>
                    </div>
                    <input type="submit" name="edit-price" value="Edit Hour Price">
                </form>
<?php
if(isset($_POST['edit-price'])) {
    $price = $_POST['hour-price'];

    $sql = "SELECT * FROM price";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
        $sql = "UPDATE price SET price = '$price'";
        $query = mysqli_query($connect, $sql);    
    } else {
        $sql = "INSERT INTO price (price) VALUES ('$price')";
        $query = mysqli_query($connect, $sql);    
    }
}
?>
            </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>