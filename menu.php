<div class="menu-dashboard">
    <div class="menu-container">
        <img src="pics/placeholder.jpg" style="max-width: 50px;border-radius: 50%;margin-left: auto;margin-right: auto;display: block;">
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
            <span style="color: white;font-weight:bold;padding:15px;margin-bottom:10px;display:block">Navigation Panel</span>
            <a href="dashboard.php"><button class="menu-link dashboard-menu"><i class="fas fa-home" style="margin-right: 5%;"></i> Dashboard</button></a>
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
            <a href="accounting.php"><button class="menu-link accounting-menu"><i class="fas fa-calculator" style="margin-right: 5%;"></i> Accounting</button></a>
            <a href="attendance-schedule.php"><button class="menu-link attendance-schedule-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> Attendance Schedule</button></a>
            <a href="attendance.php"><button class="menu-link attendance-menu"><i class="fas fa-clipboard" style="margin-right: 5%;"></i> Attendances</button></a>
            <a href="add-hours.php"><button class="menu-link add-hours-menu"><i class="fas fa-id-card" style="margin-right: 5%;"></i> Add Hours</button></a>
            <a href="activities.php"><button class="menu-link activities-menu"><i class="fas fa-exchange-alt" style="margin-right: 5%;"></i> Latest Activities</button></a>
            <a href="sessions.php"><button class="menu-link sessions-menu"><i class="fas fa-plug" style="margin-right: 5%;"></i> Sessions</button></a>
            <a href="card-verification.php"><button class="menu-link card-verify-menu"><i class="fas fa-users" style="margin-right: 5%;"></i> Card Verification</button></a>
        </div>
    </div>
</div>