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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="fas fa-user-friends"></i> تعديل بيانات البطاقة</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;" enctype="multipart/form-data">
                    <div id='container'>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM cards WHERE id = $id";
$query = mysqli_query($connect, $sql);
$num = mysqli_num_rows($query);
if($num > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
        $phone = $row['phone'];
        $birthday = $row['birthday'];
        $gender = $row['gender'];
        $code = $row['code'];
        $kind = $row['kind'];
        $position = $row['position'];
        $salary = $row['salary'];
    }
} else {
    die();
}
?>
                    <label style="font-weight: bold;">الاسم</label>
                    <input type="text" name="name" value="<?php echo "$name" ?>" required>
                    <label style="font-weight: bold;">رقم الهاتف</label>
                    <input type="text" name="phone"  value="<?php echo "$phone" ?>">
                    <label style="font-weight: bold;">تاريخ الميلاد</label>
                    <input type="date" name="birthday" value="<?php echo "$birthday" ?>">
                    <label style="font-weight: bold;">الرقم التعريفي</label>
                    <input type="text" name="code" value="<?php echo "$code" ?>" disabled>
                    <label style="font-weight: bold;">الجنس</label>
                    <select name="gender" required>
                        <option hidden><?php echo "$gender" ?></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>

                    <label style="font-weight: bold;">نوع البطاقة</label>
                    <select name="kind" onchange="yesnoCheck(this);" required>
                        <option value=<?php echo "$kind" ?> hidden><?php echo "$kind" ?></option>
                        <option value="" hidden>-- نوع البطاقة --</option>
                        <option value="Student">طالب</option>
                        <option value="Employee">موظف</option>
                        <option value="Kids Area">منطقة الالعاب</option>
                    </select>

                    <label class="ifEmployeeLabel" style="font-weight: bold;display:none">المهنة</label>
                    <input type="text" name="position" class="ifEmployee" style="display:none" value="<?php echo "$position" ?>">

                    <label class="ifEmployeeLabelSalary" style="font-weight: bold;display:none">الراتب الشهري</label>
                    <input type="text" name="salary" class="ifEmployeeSalary" style="display:none" value="<?php echo "$salary" ?>">

                    </div>
                    <input type="submit" name="edit-card" value="تعديل البطاقة">
                </form>
<?php
if(isset($_POST['edit-card'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $hours = $_POST['hours'];
    $kind = $_POST['kind'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "UPDATE cards SET name='$name', phone='$phone', birthday='$birthday', gender='$gender', kind='$kind', position='$position', salary='$salary' WHERE id='$id'";
    $query = mysqli_query($connect, $sql);
    header('Location:'.$_SERVER['REQUEST_URI']);
    }
?>
            </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>