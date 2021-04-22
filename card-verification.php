<html>
<head>
    <title>Kids Area Dashboard | Sary Academy</title>
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
    input[type="submit"] {
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Card Verification</h5>
            </div>
            <div class="row" style="min-height:550px;background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;">
                    <div style="display:block;text-align:center">
                        <input type="text" name="keyword" placeholder="Enter Name / Code">
                        <input type="submit" name="search" value="Search">
                        <input type="submit" name="show-all" value="Show All">
                    </div>
                </form>
<?php
if(isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    if($keyword !== "") {
        header('Location: card-verification.php?search='.$keyword.'');
        $keyword_get = $_GET['search'];
        echo $_GET['search'];
        $sql = "SELECT * FROM cards WHERE name LIKE '%$keyword_get%' OR code LIKE '%$keyword_get%'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            while($row = mysqli_fetch_array($query)) {
                $name = $row['name'];
                $profile_pic = $row['profile_pic'];
                $hours = $row['hours'];
                $code = $row['code'];
                $gender = $row['gender'];
                $birthday = $row['birthday'];
                $phone = $row['phone'];
                echo '
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Profile Pic</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="students/'.$profile_pic.'"></td>
                        <td>'.$name.'</td>
                        <td>'.$code.'</td>
                    </tr>
                </tbody>
                </table>
                ';
            }
        } else {
            echo '
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Profile Pic</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                </tr>
            </thead>
            </table>
            ';
        }
    } else {
        header('Location: card-verification.php');
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