<div class="menu-dashboard">
    <div class="menu-container">
        <img src="pics/placeholder.jpg" style="max-width: 50px;border-radius: 50%;margin-left: auto;margin-right: auto;display: block;">
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
            <span style="color: white;font-weight:bold;padding:15px;margin-bottom:10px;display:block">Navigation Panel</span>
            
            <div class="group">
            <span>Main</span>
            <a href="dashboard.php"><button class="menu-link dashboard-menu"><i class="fas fa-home" style="margin-right: 5%;"></i> Dashboard</button></a>
            <a href="activities.php"><button class="menu-link activities-menu"><i class="fas fa-exchange-alt" style="margin-right: 5%;"></i> Latest Activities</button></a>
            </div>
            
            <div class="group">
            <span>Academic</span>
            <a href="sessions.php"><button class="menu-link sessions-menu"><i class="fas fa-plug" style="margin-right: 5%;"></i> Play Area</button></a>
            <a href="attendance.php" style="display:none"><button class="menu-link attendance-menu"><i class="fas fa-clipboard" style="margin-right: 5%;"></i> Academy Attendance</button></a>
            <a href="attendance-schedule.php" style="display:none"><button class="menu-link attendance-schedule-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> Personal Attendance</button></a>
            </div>

            <?php
                if($per_two !==""){
                    $current_month = date('M');
                    echo '
                    <div class="group">
                    <span>Accounting</span>
                    <a href="accounting.php?month='.$current_month.'"><button class="menu-link accounting-menu"><i class="fas fa-calculator" style="margin-right: 5%;"></i> Payments</button></a>
                    </div>        
                    ';
                }
            ?>

            <div class="group">
            <?php
                if($per_four !=="" || $per_three !== ""){
                    echo '<span>Verification</span>';
                }
            ?>
            
            <?php
                if($per_four !==""){
                    echo '<a href="card-verification.php"><button class="menu-link card-verify-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> Card Verification</button></a>';
                }
            ?>
            <?php
                if($per_three !==""){
                    echo '<a href="add-hours.php"><button class="menu-link add-hours-menu"><i class="fas fa-id-card" style="margin-right: 5%;"></i> Add Hours</button></a>';
                }
            ?>
            
            </div>

            <div class="group">
            <span>Admins</span>
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
                echo '<a href="add-admin.php"><button class="menu-link add-admin-menu"><i class="fas fa-user" style="margin-right: 5%;"></i> Add Admin</button></a>';
            }
            ?>
            </div>
            
        </div>
    </div>
</div>