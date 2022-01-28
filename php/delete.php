<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location: ../pages/index.php");
    }
}
?>