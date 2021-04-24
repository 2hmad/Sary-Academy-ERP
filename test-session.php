<html>
<body>
<?php include('links.php') ?>
<form method="POST">
<button type="submit" name="create">Create Session</button>
</form>
<?php
if(isset($_POST['create'])) {
    $date = date("Y-m-d");
    date_default_timezone_set("Africa/Cairo");
    $start_time = date("h:i:sa");
    $end_time_format = strtotime($start_time) + 3600;
    $end_time = date("h:i:sa",$end_time_format);

    $sql = "INSERT INTO sessions (date, start_time, end_time) VALUES ('$date', '$start_time', '$end_time')";
    $query = mysqli_query($connect ,$sql);
}
?>
</body>
</html>