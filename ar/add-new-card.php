<html>
<head>
    <title>لوحة تحكم منطقة الألعاب | اكاديمية ساري</title>
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
                <h5 style="text-transform: uppercase;font-weight:bold;color:#424242;align-self: center;"><i class="far fa-user-crown"></i> اضافة كارت جديد</h5>
            </div>
            <div class="row" style="background:white;padding:20px;box-shadow:0 0 15px -9px rgba(0, 0, 0, 0.25);border-radius:5px;margin-top:3%">
                <form method="POST" style="margin-top: 2%;" enctype="multipart/form-data">
                    <div id='container'>
                    <label style="font-weight: bold;">الإسم</label>
                    <input type="text" name="name" required>
                    <label style="font-weight: bold;">رقم الهاتف</label>
                    <input type="text" name="phone" value="+20" required>
                    <label style="font-weight: bold;">تاريخ الميلاد</label>
                    <input type="date" name="birthday" required>
                    <label style="font-weight: bold;">الجنس</label>
                    <select name="gender" required>
                        <option value="" hidden>اختر الجنس</option>
                        <option value="Male">ذكر</option>
                        <option value="Female">انثي</option>
                    </select>
                    <label style="font-weight: bold;" for="formFile" class="form-label">الصورة الشخصية</label>
                    <input type="file" class="form-control" id="formFile" name="profile-pic">
                    </div>
                    <input type="submit" name="create-card" value="انشاء كارت">
                </form>
<?php
if(isset($_POST['create-card'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $hours = "0";
    if($_FILES["profile-pic"]["name"] !== "") {
        $targetDir = "students/";
        $fileName = basename($_FILES["profile-pic"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $targetFilePath)){
            $sql = "INSERT INTO cards (name, phone, birthday, gender, profile_pic, hours) VALUES ('$name', '$phone', '$birthday', '$gender', '$fileName', $hours)";
            $query = mysqli_query($connect, $sql);
        }
    } else {
        $fileName = "placeholder.jpg";
        $sql = "INSERT INTO cards (name, phone, birthday, gender, profile_pic, hours) VALUES ('$name', '$phone', '$birthday', '$gender', '$fileName', $hours)";
        $query = mysqli_query($connect, $sql);
    }
}
?>
            </div>
        </div>
    </div>

</div>


</body>
<?php include('scripts.php') ?>
</html>