<div class="menu-dashboard">
    <div class="menu-container">
        <img src="../pics/placeholder.jpg" style="max-width: 50px;border-radius: 50%;margin-left: auto;margin-right: auto;display: block;">
        <span style="text-align: center;color:white;display:block;font-weight:bold;margin-top:2%"><?php
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_assoc($query)) {
            $name = $row['name'];
            $per_one = $row['per_one'];
            $per_two = $row['per_two'];
            $per_three = $row['per_three'];
            $per_four = $row['per_four'];
            echo "$name";
        }
        ?></span>
        <div class="menu-links">
            <span style="color: white;font-weight:bold;padding:15px;margin-bottom:10px;display:block">لوحة التنقل</span>
            
            <div class="group">
            <span>رئيسي</span>
            <a href="dashboard.php"><button class="menu-link dashboard-menu"><i class="fas fa-home" style="margin-right: 5%;"></i> الرئيسية</button></a>
            <a href="activities.php"><button class="menu-link activities-menu"><i class="fas fa-exchange-alt" style="margin-right: 5%;"></i> اخر النشاطات</button></a>
            </div>
            
            <div class="group">
            <span>اكاديمي</span>
            <a href="display-sessions.php?month=<?php echo date('M') ?>"><button class="menu-link sessions-menu"><i class="fas fa-plug" style="margin-right: 5%;"></i> منطقة الالعاب</button></a>
            <a href="attendance.php" style="display:none"><button class="menu-link attendance-menu"><i class="fas fa-clipboard" style="margin-right: 5%;"></i> حضور الاكاديمية</button></a>
            <a href="attendance-schedule.php" style="display:none"><button class="menu-link attendance-schedule-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> حضور شخصي</button></a>
            </div>

            <?php
                if($per_two !==""){
                    echo '
                    <div class="group">
                    <span>حسابات</span>
                    <a href="accounting.php?month='.date('M').'"><button class="menu-link accounting-menu"><i class="fas fa-calculator" style="margin-right: 5%;"></i> الحسابات</button></a>
                    </div>
                    ';
                }
            ?>

            <div class="group">
            <?php
                if($per_four !=="" || $per_three !== ""){
                    echo '<span>التحقق</span>';
                }
            ?>
            
            <?php
                if($per_four !==""){
                    echo '<a href="card-verification.php"><button class="menu-link card-verify-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> التحقق من كارت</button></a>';
                }
            ?>
            <?php
                if($per_three !==""){
                    echo '<a href="add-hours.php"><button class="menu-link add-hours-menu"><i class="fas fa-id-card" style="margin-right: 5%;"></i> اضافة ساعات</button></a>';
                }
            ?>
            </div>

            <div class="group">
            <span>الإشراف</span>
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
                echo '<a href="add-admin.php"><button class="menu-link add-admin-menu"><i class="fas fa-user" style="margin-right: 5%;"></i> اضافة مشرف</button></a>';
            }
            ?>
            </div>
            
        </div>
    </div>
</div>