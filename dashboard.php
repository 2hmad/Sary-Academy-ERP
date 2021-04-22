<html>
<head>
    <title>Kids Area Dashboard | Sary Academy</title>
    <?php include('links.php'); ?>
    <style>
    .card {
        max-width: 400px;
    }
    .box-card {
        padding: 13px;
        font-size: 20px;
        position: absolute;
        background: #1d2362;
        color: white;
        border-radius: 5px;
        right: 20px;
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
            <div class="row" style="margin-left: 5%;">
                <div class="card" style="padding: 30px;margin-right:5%">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Cards</h5>
                    <div class="box-card"><i class="fad fa-user-friends"></i></div>
                    <span style="font-size: 35px;font-weight: bold;">5</span>
                    <span style="text-transform: uppercase;">total cards</span>
                </div>
                <div class="card" style="padding: 30px;margin-right:5%">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Today Attendances</h5>
                    <div class="box-card"><i class="fad fa-user-friends"></i></div>
                    <span style="font-size: 35px;font-weight: bold;">5</span>
                    <span style="text-transform: uppercase;">total Today Attendances</span>
                </div>
            </div>
            <div class="row" style="margin-left: 5%;margin-top:3%">
                <div class="card" style="padding: 30px;margin-right:5%">
                    <h5 class="text-muted" style="font-size: 1.1rem;font-weight: 400;"><i class="fad fa-user-friends"></i> Users</h5>
                    <div class="box-card"><i class="fad fa-user-friends"></i></div>
                    <span style="font-size: 35px;font-weight: bold;">5</span>
                    <span style="text-transform: uppercase;">total uesrs</span>
                </div>
            </div>
        <div style="margin-top: 5%;margin-left: 5%;">
        <h5 style="text-align: center;text-transform:uppercase">Recently Added Of <?php echo date("F") ?></h5>
        <table class="table table-striped table-bordered table-responsive">
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        </table>
        </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>