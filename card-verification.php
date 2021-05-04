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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> Card Verification</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                    <div style="display:block;text-align:center">
                        <input type="text" name="keyword" placeholder="Enter Name / Code">
                        <input type="submit" class="search-btn" name="search" value="Search">
                    </div>
                </form>

<?php
if(isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    if($keyword !== "") {
        header('Location: card-verification.php?search='.$keyword.'');
    } else {
        header('Location: card-verification.php');
    }
}
        echo '
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Profile Pic</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody style="vertical-align: baseline">';

        if(isset($_GET['search'])) {
        $keyword_get = $_GET['search'];
        $sql = "SELECT * FROM cards WHERE name LIKE '%$keyword_get%' OR code LIKE '%$keyword_get%'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            while($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $profile_pic = $row['profile_pic'];
                $hours = $row['hours'];
                $gender = $row['gender'];
                $birthday = $row['birthday'];
                $phone = $row['phone'];
                echo '
                    <tr>
                        <td><img src="students/'.$profile_pic.'" style="max-width:50px;border-radius:50%"></td>
                        <td>'.$name.'</td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="edit-profile.php?id='.$id.'">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id='.$id.'">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>
                ';
            }
        } else {
            echo '<script>alert("No match data with search")</script>';
        }
    }

    ?>
        </tbody>
    </table>
    <form method="post" action="export.php">  
        <input type="submit" name="export" value="Export All Cards in CSV" class="btn btn-success" />  
    </form>  

</div>
    </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
</html>