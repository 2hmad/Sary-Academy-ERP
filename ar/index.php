<html>
<head>
    <title>لوحة تحكم منطقة الألعاب | اكاديمية ساري</title>
    <?php include('links.php'); ?>
    <style>
    input[name="email-login"]{
        padding: 5px;
        width: 350px;
        border: 1px solid #CCC;
        outline: none;
        border-radius: 5px;
        display: block;
        margin-bottom: 4%;
        max-width: 80%;
    }
    input[name="pass-login"]{
        padding: 5px;
        width: 350px;
        border: 1px solid #CCC;
        outline: none;
        border-radius: 5px;
        display: block;
        margin-bottom: 2%;
        max-width: 80%;
    }

    </style>
</head>
<body style="background-color:#FAFAFA">

<div class="container" style="background-color: white;position: relative;top: 15%;min-height:500px;box-shadow: 0 0 30px -9px #B0B0B0;border-radius:15px">
    <div class="row">
        <div class="col-lg-5" style="padding: 0px 0px 0px 55px;min-height:500px">
        <a href="../"><img src="../pics/usa-flag.png" style="position: absolute;top: 5%;"></a>
            <h4 style="margin-top:15%;margin-bottom: 5%;text-transform:uppercase;font-weight:bold;font-size: 27px;">تسجيل الدخول</h4>
            <form method="POST">
            <input type="text" name="email-login" placeholder="ادخل بريدك الالكتروني">
            <input type="password" name="pass-login" placeholder="ادخل كلمة المرور">
            <a href="#" style="display:block;">هل نسيت كلمة المرور ؟</a>
            
            <input type="submit" name="login" class="btn btn-dark" value="تسجيل الدخول" style="width: 200px;margin-top:5%;display:block">
            </form>
<?php
if(isset($_SESSION['email'])) {
    header('Location: dashboard.php');
} else {
    if(isset($_POST['login'])) {
        $email = $_POST['email-login'];
        $pass = sha1($_POST['pass-login']);
        $sql = "SELECT * FROM users WHERE email='$email' AND password = '$pass'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            header('Location: dashboard.php');
            $_SESSION['email'] = $email;
        } else {
            echo "<div class='alert alert-danger' style='width:90%;margin-top:2%'>Email Address / Password is incorrect</div>";
        }
    }
}
?>
        </div>
        <div class="col-lg" style="background: url('../pics/wooden-playground-area.jpg');background-position: 5px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;">
        
        </div>
    </div>
</div>

</body>
<?php include('scripts.php') ?>
</html>