<div class="menu-dashboard">
    <div class="menu-container">
        <img src="../pics/placeholder.jpg" style="max-width: 50px;border-radius: 50%;margin-left: auto;margin-right: auto;display: block;">
        <span style="text-align: center;color:white;display:block;font-weight:bold;margin-top:2%"><?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    echo "$name";
}
?></span>
        <div class="menu-links">
            <span style="color: white;font-weight:bold;padding:15px;margin-bottom:10px;display:block">لوحة التنقل</span>
            <a href="dashboard.php"><button class="menu-link dashboard-menu"><i class="fal fa-home" style="margin-right: 5%;"></i> الصفحة الرئيسية</button></a>
            <?php
            if(!isset($_SESSION['email'])) {
                header('Location: index.php');
            } else {
                $email = $_SESSION['email'];
            }
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($query)) {
                $role = $row['role'];
            }
            if($role == "Admin") {

            } elseif($role == "Superadmin") {
                echo '<a href="add-admin.php"><button class="menu-link add-admin-menu"><i class="fal fa-user" style="margin-right: 5%;"></i> اضافة مشرف</button></a>';
            }
            ?>
            <a href="add-new-card.php" hidden><button class="menu-link add-new-card-menu"><i class="fal fa-id-card" style="margin-right: 5%;"></i> اضافة كارت جديد</button></a>
            <a href="edit-hour-price.php"><button class="menu-link edit-hour-price-menu"><i class="fal fa-money-bill" style="margin-right: 5%;"></i> تعديل سعر الساعه</button></a>
            <a href="activities.php"><button class="menu-link activities-menu"><i class="fal fa-exchange" style="margin-right: 5%;"></i> اخر النشاطات</button></a>
            <a href="sessions.php"><button class="menu-link sessions-menu"><i class="far fa-plug" style="margin-right: 5%;"></i> الجلسات</button></a>
            <a href="card-verification.php"><button class="menu-link card-verify-menu"><i class="fal fa-users" style="margin-right: 5%;"></i> التحقق من كارت</button></a>
        </div>
    </div>
</div>