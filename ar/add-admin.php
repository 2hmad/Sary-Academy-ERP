<html>
<head>
    <title>لوحة تحكم | ساري اكاديمي</title>
    <?php include('links.php'); ?>
    <style>
    input[type="text"], input[type="email"], input[type="password"], select {
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
        margin-top: 1%;
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

<?php
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $role = $row['role'];
    }
    if($role == "Admin") {
        header('Location: no_permissions.php');
    }
?>

<div class="container" style="max-width: 95%;margin-top: 70px;">
    <div class="row">
        <div class="col-lg-3">
            <?php include('menu.php'); ?>
        </div>
        <div class="col-lg">
            <div class="row" style="background:white;height: 70px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px">
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> اضافة مشرف جديد</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;">
                    <div id='container'>
                    <label style="font-weight: bold;">الاسم</label>
                    <input type="text" name="admin-name" required>
                    <label style="font-weight: bold;">البريد الالكتروني</label>
                    <input type="email" name="admin-email" required>
                    <label style="font-weight: bold;">كلمة المرور</label>
                    <input type="password" name="admin-password" required>
                    <label style="font-weight: bold;">الجنس</label>
                    <select name="admin-gender" required>
                        <option value="" hidden>اختر الجنس</option>
                        <option>ذكر</option>
                        <option>انثي</option>
                    </select>
                    <label style="font-weight: bold;">رقم الهاتف</label>
                    <input type="text" name="admin-phone" value="+20">
                    </div>

                    <label style="font-weight:bold">الاذونات</label><br>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="all" value="All" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        الكل
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="accounting" value="Accounting" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        صفحة الايرادات
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="add-hours" value="Add Hours" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        اضافة ساعات
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="card-verification" value="Card Verification" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        التحقق من كارت
                    </label>
                    </div>

                    <input type="submit" name="create-admin" value="اضافة مشرف">
                </form>
<?php
if(isset($_POST['create-admin'])){
    $name = $_POST['admin-name'];
    $email = $_POST['admin-email'];
    $password = sha1($_POST['admin-password']);
    $gender = $_POST['admin-gender'];
    $phone = $_POST['admin-phone'];
    $role = "Admin";

    $sql_select = "SELECT * FROM users WHERE email = '$email'";
    $query_select = mysqli_query($connect, $sql_select);
    $num = mysqli_num_rows($query_select);
    if($num > 0) {
        echo "<script>alert('This admin has been registered before')</script>";
    } else {
        $sql = "INSERT INTO users (name, email, password, gender, phone, role) VALUES ('$name', '$email', '$password', '$gender', '$phone', '$role')";
        $query = mysqli_query($connect, $sql);
        header('Location: add-admin.php');
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