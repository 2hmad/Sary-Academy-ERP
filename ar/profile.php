<html>

<head>
    <?php include('links.php'); ?>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM cards WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $name = $row['name'];
                $code = $row['code'];
                $pic = $row['profile_pic'];
                $kind = $row['kind'];
                if ($kind == "Student") {
                    echo '
                    <div class="id-print">
                    <div class="id-student">
                        <div class="student-image" style="max-width: 185px;height: 185px;object-fit: cover;">
                        <img class="pic-print" src="../students/' . $pic . '">
                        <div class="id-info" style="text-align:center">
                            <span class="print-name" style="font-weight: bold;color: white;position: relative;top: 120px;left: 155px;font-size: 22px;">'.$name.'</span>
                            <span class="print-code" style="font-weight: bold;color: white;position: relative;top: 120px;left: 155px;font-size: 22px;">'.$code.'</span>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="back-id">
                    
                    </div>
                ';
                } elseif ($kind == "Employee") {
                    echo '
                    <div class="id-print">
                    <div class="id-student">
                        <div class="student-image" style="max-width: 185px;height: 185px;object-fit: cover;">
                        <img class="pic-print" src="../employees/' . $pic . '">
                        <div class="id-info" style="text-align:center">
                            <span class="print-name" style="font-weight: bold;color: white;position: relative;top: 120px;left: 155px;font-size: 22px;">'.$name.'</span>
                            <span class="print-code" style="font-weight: bold;color: white;position: relative;top: 120px;left: 155px;font-size: 22px;">'.$code.'</span>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="back-id">
                    
                    </div>
                ';
                }
            }
        }
    }
    ?>

    <button type="button" class="print" onclick="codespeedy()">
        Print <?php echo "$name" ?> ID
    </button>
</body>
<script>
    function codespeedy() {
        window.print()
        }
</script>
</html>