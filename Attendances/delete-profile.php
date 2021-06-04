<?php
include('connection.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cards WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);
    echo '<script>
    alert("Deleted Card");
    window.location.href="card-verification.php";
    </script>';
} else {
    header('Location: card-verification.php');
}
?>