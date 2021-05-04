<?php

$host = "us-cdbr-east-03.cleardb.com";
$user = "root";
$pass = "";
$db = "kidsarea";
$connect = mysqli_connect($host, $user, $pass, $db) or die("Can't connect with database");

date_default_timezone_set("Africa/Cairo");

if(isset($_GET['tag']) && isset($_GET['code'])) {
    if($_GET['tag'] == "pressed") {
        $code = $_GET['code'];
        $sql_check = "SELECT * FROM cards WHERE code = '$code'";
        $query_check = mysqli_query($connect, $sql_check);
        $num_check = mysqli_num_rows($query_check);
        if($num_check > 0) {
            $response = array(
                'status' => false,
                'message' => 'This User is Registerd Before'
            );
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
            $response = array(
                'status' => true,
                'message' => 'Successful'
            );
        }
    } elseif($_GET['tag'] == "released") {
        $code = $_GET['code'];
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
                    $response = array(
                        'status' => true,
                        'message' => 'Timer Started'
                    );        
                } else {
                    $date = date("Y-m-d");
                    $time = date("h:i:sa");        
                    $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Recharge card')";
                    $query_activity = mysqli_query($connect, $sql_activity);        
                    $response = array(
                        'status' => true,
                        'message' => 'Recharge your card'
                    );
                }
            }
        } else {
            $response = array(
                'status' => true,
                'message' => 'This Card has not registered before'
            );
            $date = date("Y-m-d");
            $time = date("h:i:sa");
            $sql_activity = "INSERT INTO activities (code, date, time, tag) VALUES ('$code', '$date', '$time', 'Check')";
            $query_activity = mysqli_query($connect, $sql_activity);

        }
    }
} else {
    $response = array(
        'status' => false,
        'message' => 'No data'
    );
}
echo json_encode($response);
?>