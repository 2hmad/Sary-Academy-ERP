<html>
<head>
    <title>Kids Area Dashboard | Sary Academy</title>
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
        display: inline;
        background: white;
        color: #1d2362;
        border-radius: 5px;
        border: 1px solid #1d2362;
        font-weight: bold;
        outline: none;
        width: 100px;
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
                    <div style="display:block;text-align:center">
                        <input type="text" name="code" placeholder="Enter Card Code">
                        <input type="number" name="hours" class="hours-num" placeholder="Hours">
<?php
$sql = "SELECT * FROM price";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)) {
    $price = $row['price'];
}
?>
                        <span class="total" style="display:block">Total price: 
                            <span class="price">
                                <span class="hidden-price" style="display:none"><?php echo "$price" ?></span>
                            </span>
                        </span>
                        <input type="submit" class="hours-btn" name="add-hours" value="Add Hours">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
<script>

var textInputElement = document.getElementsByClassName('hours-num');
    nameDivElement = document.getElementsByClassName('price');
    textInputElement.addEventListener('keyup', function(){
    var text = textInputElement.value;
    nameDivElement.innerHTML = text;
});


</script>
</html>