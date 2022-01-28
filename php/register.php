<?php
include 'connection.php';
$error = "";
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match("/^[A-Z][a-z]{2,}$/", $firstname)) {
        $error = "First letter cap and minimum 2 char";
        header("location: ../pages/index.php?firstnameerror=$error");
    } elseif (!preg_match("/^[A-Z][a-z]{2,}$/", $lastname)) {
        $error = "First letter cap and minimum 2 char";
        header("location: ../pages/index.php?lastnameerror=$error");
    } elseif (!preg_match("/^[a-zA-Z0-9]+([._+-]*[0-9A-Za-z]+)*@[a-zA-Z0-9]+.[a-zA-Z]{2,4}([.][a-z]{2,4})?$/", $email)) {
        $error = "Enter valid email";
        header("location: ../pages/index.php?emailerror=$error");
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*#?&])([a-zA-Z0-9@$!%*#?&]){8,}$/", $password)) {
        $error = "Enter valid password";
        header("location: ../pages/index.php?passworderror=$error");
    } else {
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')";
    
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("location: ../pages/index.php");
        }   
    }
}
?>