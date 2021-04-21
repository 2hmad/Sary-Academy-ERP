<html>
<head>
    <title>Kids Area Dashboard | Sary Academy</title>
    <?php include('links.php'); ?>
</head>
<body style="background-color:#FAFAFA;padding:10px">

    <header>
        <a href="https://sary-academy.com" target="_blank" style="float:left"><img src="pics/saryacademy.png" alt="Sary academy" style="max-width: 200px;"></a>
        <div class="dropdown" style="float:right;box-shadow:0 0 0 0">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Ahmed Mohamed Ibrahim
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="my-account.php" style="text-transform: uppercase">My Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="change-password.php" style="text-transform: uppercase">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" style="text-transform: uppercase">Log out</a></li>
        </ul>
        </div>
    </header>

</body>
<?php include('scripts.php') ?>
</html>