<html>
<head>
    <title>لوحة تحكم | ساري اكاديمي</title>
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> البحث عن بطاقة</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;margin-bottom:5%" enctype="multipart/form-data">
                    <div style="display:block;text-align:center">
                        <input type="text" name="keyword" placeholder="ادخل الاسم / الرقم التعريفي">
                        <input type="submit" class="search-btn" name="search" value="بحث">
                        <input type="submit" class="search-btn" name="show-all" value="رؤية الكل">
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
} elseif(isset($_POST['show-all'])) {
    header('Location: card-verification.php?search=show-all');
}
        echo '
        <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">الرقم التعريفي</th>
                <th scope="col">الاسم</th>
                <th scope="col">الوظيفة</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody style="vertical-align: baseline">';

    if(isset($_GET['search'])) {
        $keyword_get = $_GET['search'];
        if($keyword_get == "show-all") {

            $sql = "SELECT * FROM cards ORDER BY id DESC";
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
                            <li><input type="button" name="view" value="الملف الشخصي" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">تعديل</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">حذف</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            ?>
            <?php
            } else {
                echo "<caption>لا توجد بيانات متاحة</caption>";
            }

        } else {
            $sql = "SELECT * FROM cards WHERE name LIKE '%$keyword_get%' OR code LIKE '%$keyword_get%'";
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
                            <li><input type="button" name="view" value="الملف الشخصي" id="<?php echo $id ?>" class="btn btn-xs view_data dropdown-item" /></li>
                            <li><a class="dropdown-item" href="edit-profile.php?id=<?php echo $id ?>">تعديل</a></li>
                            <li><a class="dropdown-item" href="delete-profile.php?id=<?php echo $id ?>">حذف</a></li>
                        </ul>
                        </div>
                        </td>
                    </tr>

            <?php
                }
            ?>
            <?php
            } else {
                echo '<script>alert("لا توجد بيانات مطابقة للبحث")</script>';
            }
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
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الملف الشخصي</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="card_detail">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
      </div>
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
