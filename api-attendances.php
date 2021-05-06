<?php

//$host = "us-cdbr-east-03.cleardb.com";
//$user = "bbf1e46cd1f90a";
//$pass = "9d4a4ff6";
//$db = "heroku_407b2626d06f99e";

$host = "localhost";
$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");
date_default_timezone_set("Africa/Cairo");

$api_key = "42f12f-b368be-e7fbb4-de0036-56975d";
if(isset($_POST['key'])) {
if($_POST['key'] == $api_key) {
if(!empty($_POST['code'])){

    $code = $_POST['code'];
    $tag = $_POST['tag'];

    if($tag == "pressed") {
        $sql_check = "SELECT * FROM cards WHERE code = '$code'";
        $query_check = mysqli_query($connect, $sql_check);
        $num_check = mysqli_num_rows($query_check);
        if($num_check > 0) {
            echo "This User is Registerd Before";
            $date = date("Y-m-d");
            $time = date("h:i:sa");

            $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Check')";
            $query_activity = mysqli_query($connect, $sql_activity);

        } else {
            $sql_card = "INSERT INTO cards (code, profile_pic) VALUES ('$code', 'placeholder.jpg')";
            $query_card = mysqli_query($connect, $sql_card);

            $date = date("Y-m-d");
            $time = date("h:i:sa");
            
            $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'New')";
            $query_activity = mysqli_query($connect, $sql_activity);
            echo "the card has been added";
        }
    } elseif($tag == "released") {
        $sql_check = "SELECT * FROM cards WHERE code = '$code'";
        $query_check = mysqli_query($connect, $sql_check);
        $num_check = mysqli_num_rows($query_check);
        if($num_check > 0) {
            while($row_card = mysqli_fetch_assoc($query_check)) {
                if($row_card['name'] !== "") {
                    $name = $row_card['name'];
                } else {
                    $name = "";
                }
                if($row_card['kind'] !== "") {
                    $kind = $row_card['kind'];
                } else {
                    $kind = "";
                }
                if($row_card['position'] !== "") {
                    $position = $row_card['position'];
                } else {
                    $position = "";
                }
            }

            $date = date("Y-m-d");
            $sql_check_activity = "SELECT * FROM attendance WHERE code='$code' AND date = '$date' AND present!='' AND absence!=''";
            $query_check_activity = mysqli_query($connect, $sql_check_activity);
            if(mysqli_num_rows($query_check_activity) > 0) {
                echo "Attendance and absence has been proven";
            } else {
                $sql_attendance = mysqli_query($connect, "SELECT * FROM attendance WHERE code='$code' AND date='$date'");
                if(mysqli_num_rows($sql_attendance) > 0) {
                    $current_month = date('M');
                    $current_time = date("H:i");
                    $sql_absence = "UPDATE attendance SET absence='$current_time' WHERE code='$code' AND date='$date'";
                    $query_absence = mysqli_query($connect, $sql_absence);
                    echo "Absence time updated";
                } else {
                    $date = date("Y-m-d");
                    $current_month = date('M');
                    $current_time = date("H:i");
                    $sql_insert = "INSERT INTO attendance (code, name, position, type, month, date, present) VALUES ('$code', '$name', '$position', '$kind', '$current_month', '$date' ,'$current_time')";
                    $query_insert = mysqli_query($connect, $sql_insert);
                    echo "Present time added";
                }
            }
            

        } else {
            echo "Please create this user first";
        }
    }
} else {
    echo "Enter Values in POST Request";
}
} else {
    echo "Enter Correct API Key";
}
} else {
    echo "Enter API Key";
}
?>