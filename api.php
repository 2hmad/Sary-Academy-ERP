<?php

$host = "us-cdbr-east-03.cleardb.com";
$user = "bbf1e46cd1f90a";
$pass = "9d4a4ff6";
$db = "heroku_407b2626d06f99e";

//$user = "root";
//$pass = "";
//$db = "kidsarea";$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");

date_default_timezone_set("Africa/Cairo");

$api_key = "f13b5611-170a-4174-9dfb-f5d68dbde960";
if(isset($_POST['key'])) {
if($_POST['key'] == $api_key) {
if(!empty($_POST['code']) && !empty($_POST['tag'])){

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
            $date = date("Y-m-d");
            $start_time = date("h:i:sa");
            $end_time_format = strtotime($start_time) + 3600;
            $end_time = date("h:i:sa",$end_time_format);
            $sql_hour = "SELECT * FROM cards WHERE code='$code'";
            $query_hour = mysqli_query($connect, $sql_hour);
            while($row_hour = mysqli_fetch_array($query_hour)) {

                $sql_stop = "SELECT * FROM sessions WHERE code = '$code' AND date='$date' AND status=''";
                $query_stop = mysqli_query($connect, $sql_stop);
                if(mysqli_num_rows($query_stop) > 0) {
                    $query_s = mysqli_query($connect, "UPDATE sessions SET status='Stopped' WHERE code = '$code' AND date='$date' AND status=''");
                    echo "Timer Stopped";

                    } else {
                        $hour = $row_hour['hours'];
                        if($hour > 0 ) {        
                        $sql = "INSERT INTO sessions (code, date, start_time, end_time) VALUES ('$code', '$date', '$start_time', '$end_time')";
                        $query = mysqli_query($connect, $sql);
                        $total_hours = $hour - 1;
                        $sql_update_hour = "UPDATE cards SET hours = '$total_hours' WHERE code='$code'";
                        $query_update_hour = mysqli_query($connect, $sql_update_hour);
                        $date = date("Y-m-d");
                        $time = date("h:i:sa");        
                        $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Timer Started')";
                        $query_activity = mysqli_query($connect, $sql_activity);        
                        echo "Timer Started";
                } else {
                    $date = date("Y-m-d");
                    $time = date("h:i:sa");        
                    $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Recharge card')";
                    $query_activity = mysqli_query($connect, $sql_activity);      
                    echo "Recharge your card"; 
                }
            }
            }
        } else {
            echo "This Card has not registered before";
            $date = date("Y-m-d");
            $time = date("h:i:sa");
            $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Check')";
            $query_activity = mysqli_query($connect, $sql_activity);

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