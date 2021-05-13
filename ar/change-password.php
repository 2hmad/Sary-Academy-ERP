<html>
<head>
    <title>لوحة تحكم | ساري اكاديمي</title>
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> تغيير كلمة المرور</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;" enctype="multipart/form-data">
                    <div id='container'>
<?php
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $password = $row['password'];
    }
?>
                    <label style="font-weight: bold;">كلمة المرور القديمة</label>
                    <input type="password" name="old-password" required>
                    <label style="font-weight: bold;">كلمة المرور الجديدة</label>
                    <input type="password" name="new-password" required>
                    </div>
                    <input type="submit" name="change-password" value="تغيير كلمة المرور">
                </form>
<?php
if(isset($_POST['change-password'])) {
    $old = sha1($_POST['old-password']);
    $new = sha1($_POST['new-password']);
    if("$old" === "$password") {
        $sql = "UPDATE users SET password='$new' WHERE email='$email'";
        $query = mysqli_query($connect, $sql);
        echo "<div class='alert alert-success'>تم تغيير كلمة المرور ، سيتم نقلك الي صفحة تسجيل الدخول خلال 10 ثواني</div>";
        echo '
        <script>
        window.setTimeout(function(){
            window.location.href = "logout.php";
        }, 10000);
        </script>
        ';
    } else {
        echo "<div class='alert alert-danger'>كلمة المرور القديمة غير مطابقة</div>";
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