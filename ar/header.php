<nav style="display: block;">
        <a href="https://sary-academy.com" target="_blank"><img src="../pics/saryacademy.png" alt="Sary academy" style="max-width: 200px;"></a>
        <a href="https://saryacademy.com/dashboard/login" style="margin-left:3%"><button class="btn btn-outline-dark">لوحة التحكم الرئيسية</button></a>
        <div style="float: right;display:flex;align-items: center;gap: 30px">
        <a href="../"><img src="../pics/usa-flag.png"></a>
        <div class="dropdown" style="box-shadow:none !important;background:#1D2362;border-radius: 5px;">
        <button class="btn dropdown-toggle shadow-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;font-weight:bold;">
            <img src="../pics/placeholder.jpg" style="max-width: 40px;border-radius: 50%;"> 
<?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    echo "$name";
}
?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 100%;">
            <li><a class="dropdown-item" href="my-account.php" style="text-transform: uppercase"><i class="fal fa-user"></i> تعديل الحساب</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="change-password.php" style="text-transform: uppercase"><i class="fal fa-key"></i> تغيير كلمة المرور</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" style="text-transform: uppercase"><i class="fal fa-sign-out"></i> تسجيل الخروج</a></li>
        </ul>
        </div>
        </div>
</nav>