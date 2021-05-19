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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> Card Verification</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%">
                    <div style="display:block;text-align:center">
                        <input type="text" name="keyword" placeholder="Enter Name / Code">
                        <input type="submit" class="search-btn" name="search" value="Search">
                        <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                        Filter
                        </button>
                        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="filterModalLabel">Search filter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: left;">
                                <label style="font-weight: bold;">Search filter</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="show-all">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Show All
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="students">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Students
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="employees">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Employees
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="kidsarea">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Kids Area
                                </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="apply" class="btn btn-primary">Apply</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>

<?php
echo '
<table class="table table-bordered">
<thead class="table-dark">
    <tr>
        <th scope="col">Card ID</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col"></th>
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

if(isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    if($keyword !== "") {
        header('Location: card-verification.php?search='.$keyword.'');
    } else {
        header('Location: card-verification.php');
    }
}
if(isset($_POST['apply'])) {
    $filter = $_POST['flexRadioDefault'];
    header('Location: card-verification.php?search='.$filter.'');
}

    if(isset($_GET['search'])) {
        $keyword_get = $_GET['search'];
        if($keyword_get == "show-all") {
            $sql = "SELECT * FROM cards ORDER BY id DESC LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query) > 0) {
                while($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $code = $row['code'];
                    $name = $row['name'];
                    $profile_pic = $row['profile_pic'];
                    $hours = $row['hours'];
                    $gender = $row['gender'];
                    $birthday = $row['birthday'];
                    $phone = $row['phone'];
                    $kind = $row['kind'];
                ?>
                    <tr>
                        <td><?php echo $code ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $kind ?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><input type="button" name="view" value="Profile" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            } else {
                echo "<caption>No data available</caption>";
            }

        } elseif($keyword_get == "students") {
            $sql = "SELECT * FROM cards WHERE kind = 'Students' ORDER BY id DESC LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query) > 0) {
                while($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $code = $row['code'];
                    $name = $row['name'];
                    $profile_pic = $row['profile_pic'];
                    $hours = $row['hours'];
                    $gender = $row['gender'];
                    $birthday = $row['birthday'];
                    $phone = $row['phone'];
                    $kind = $row['kind'];
                ?>
                    <tr>
                        <td><?php echo $code ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $kind ?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><input type="button" name="view" value="Profile" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            ?>
            <?php
            } else {
                echo "<caption>No data available</caption>";
            }

        }elseif($keyword_get == "employees"){
            $sql = "SELECT * FROM cards WHERE kind='Employee' ORDER BY id DESC LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query) > 0) {
                while($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $code = $row['code'];
                    $name = $row['name'];
                    $profile_pic = $row['profile_pic'];
                    $hours = $row['hours'];
                    $gender = $row['gender'];
                    $birthday = $row['birthday'];
                    $phone = $row['phone'];
                    $kind = $row['kind'];
                ?>
                    <tr>
                        <td><?php echo $code ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $kind ?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><input type="button" name="view" value="Profile" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            ?>
            <?php
            } else {
                echo "<caption>No data available</caption>";
            }
        }elseif($keyword_get == "kidsarea"){
            $sql = "SELECT * FROM cards WHERE kind='Kids Area' ORDER BY id DESC LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query) > 0) {
                while($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $code = $row['code'];
                    $name = $row['name'];
                    $profile_pic = $row['profile_pic'];
                    $hours = $row['hours'];
                    $gender = $row['gender'];
                    $birthday = $row['birthday'];
                    $phone = $row['phone'];
                    $kind = $row['kind'];
                ?>
                    <tr>
                        <td><?php echo $code ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $kind ?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><input type="button" name="view" value="Profile" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            ?>
            <?php
            } else {
                echo "<caption>No data available</caption>";
            }
        } else {
            $sql = "SELECT * FROM cards WHERE name LIKE '%$keyword_get%' OR code LIKE '%$keyword_get%' LIMIT $from, $num_per_page";
            $query = mysqli_query($connect, $sql);
            $num = mysqli_num_rows($query);
            if($num > 0) {
                while($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $code = $row['code'];
                    $name = $row['name'];
                    $profile_pic = $row['profile_pic'];
                    $hours = $row['hours'];
                    $gender = $row['gender'];
                    $birthday = $row['birthday'];
                    $phone = $row['phone'];
                    $kind = $row['kind'];
                    ?>
                    <tr>
                        <td><?php echo $code ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $kind ?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none options" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><input type="button" name="view" value="Profile" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">Delete</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>
            <?php
                }
            ?>
            <?php
            } else {
                echo '<script>alert("No match data with search")</script>';
            }
        }
    }

echo '
    </tbody>
    </table>
';

    if(isset($_GET['search'])) {
        if($_GET['search'] == "show-all") {
            $sql_pagination = "SELECT * FROM cards";
        } elseif($_GET['search'] == "students") {
            $sql_pagination = "SELECT * FROM cards WHERE kind = 'Student'";
        } elseif($_GET['search'] == "employees") {
            $sql_pagination = "SELECT * FROM cards WHERE kind = 'Employee'";
        } elseif($_GET['search'] == "kidsarea") {
            $sql_pagination = "SELECT * FROM cards WHERE kind = 'Kids Area'";
        } else {
            $keyword_get = $_GET['search'];
            $sql_pagination = "SELECT * FROM cards WHERE name LIKE '%$keyword_get%' OR code LIKE '%$keyword_get%'";
        }
    } else {
        $sql_pagination = "SELECT * FROM cards";
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
<nav aria-label="Page navigation example" style="margin-left:auto;width:auto">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="
        <?php
        if(isset($_GET['search'])) {
            $search_get = $_GET['search'];
            echo "?search=$search_get";
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
    if(isset($_GET['search'])) {
        $search_get = $_GET['search'];
        echo "?search=$search_get";
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
</html>

<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="card_detail">
        
    </div>
  </div>
</div>



 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var card_id = $(this).attr("id");  
           $.ajax({  
                url:"card-profile.php",  
                method:"post",  
                data:{card_id:card_id},  
                success:function(data){  
                     $('#card_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
