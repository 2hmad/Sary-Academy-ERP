<html>
<head>
    <title>لوحة تحكم منطقة الألعاب | اكاديمية ساري</title>
    <?php include('links.php'); ?>
    <style>
    input[type="text"], input[type="email"], input[type="password"], input[type="date"],select {
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> تعديل بيانات الحساب</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;" enctype="multipart/form-data">
                    <div id='container'>
<?php
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
        $role = $row['role'];
        $phone = $row['phone'];
        $gender = $row['gender'];
    }
?>
                    <label style="font-weight: bold;">الاسم</label>
                    <input type="text" name="name" value="<?php echo "$name" ?>" required>
                    <label style="font-weight: bold;">رقم الهاتف</label>
                    <input type="text" name="phone"  value="<?php echo "$phone" ?>" required>
                    <label style="font-weight: bold;">الجنس</label>
                    <select name="gender" required>
                        <option hidden><?php 
                        if($gender == "Male") {
                            echo "ذكر";
                        } else {
                            echo "انثي";
                        }?></option>
                        <option value="Male">ذكر</option>
                        <option value="Female">انثي</option>
                    </select>
                    <label style="font-weight: bold;">نوع الحساب</label>
                    <input type="text" name="role"  value="<?php echo "$role" ?>" disabled>
                    </div>
                    <input type="submit" name="edit-card" value="تعديل الحساب">
                </form>
<?php
if(isset($_POST['edit-card'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $sql = "UPDATE users SET name='$name', phone='$phone', gender='$gender' WHERE email='$email'";
    $query = mysqli_query($connect, $sql);
    header('Location:'.$_SERVER['REQUEST_URI']);
    }
?>
            </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>