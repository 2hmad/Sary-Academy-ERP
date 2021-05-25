<html>
<head>
    <title>لوحة تحكم | ساري اكاديمي</title>
    <?php include('links.php'); ?>
    <style>
    input[type="text"] {
        padding: 5px;
        border: 1px solid #CCC;
        border-radius: 5px;
        outline: none;
        width: 200px;
    }    
    #container {
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    .apply-btn {
        padding: 5px;
        display: inline;
        background: white;
        color: #1d2362;
        border-radius: 5px;
        border: 1px solid #1d2362;
        font-weight: bold;
        outline: none;
        width: 100px;
    }
    .apply-btn:hover {
        background-color: #1d2362;
        color: white;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }
    .options::after {
        display:none
    }
    select {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #CCC;
        outline: none;
    }
    </style>
</head>
<body style="background-color:#FAFAFA;padding:10px">
<?php include('header.php'); ?>

<audio src="Alarm.mp3" preload="auto"></audio>

<div class="container" style="max-width: 95%;margin-top: 70px;">
    <div class="row">
        <div class="col-lg-3">
            <?php include('menu.php'); ?>
        </div>
        <div class="col-lg">
            <div class="row" style="background:white;height: 70px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px">
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> منطقة الالعاب</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
            <form method="POST" style="margin-top: 2%;margin-bottom:5%">
        <div style="text-align: center;">
        <select name="month">
            <?php
            if(!isset($_GET['month'])) {
                echo '<option value="" hidden>اختر الشهر</option>';
            } else {
                $month_get = $_GET['month'];
                echo '<option hidden>'.$month_get.'</option>';
            }
            ?>
            <option value="January">يناير</option>
            <option value="February">فبراير</option>
            <option value="March">مارس</option>
            <option value="April">ابريل</option>
            <option value="May">مايو</option>
            <option value="June">يونيو</option>
            <option value="July">يوليو</option=>
            <option value="August">اغسطس</option=>
            <option value="September">سبتمبر</option=>
            <option value="October">اكتوبر</option=>
            <option value="November">نوفمبر</option=>
            <option value="December">ديسمبر</option=>
        </select>
        <input type="submit" class="apply-btn" name="apply" value="بحث">
        </div>
    </form>
    <?php
        if(isset($_POST['apply'])) {
            $month = $_POST['month'];
            if($month !== "") {
                header('Location: display-sessions.php?month='.$month.'');
            } else {
                header('Location: sessions.php');
            }
        }
    ?>

    <div id="tableHolder"></div>

    </div>
    </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('refresh-sessions.php', function(){
           setTimeout(refreshTable, 20000);
        });
    }
</script>

</html>