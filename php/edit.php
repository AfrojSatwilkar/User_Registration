<?php
include 'connection.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match("/^[A-Z][a-z]{2,}$/", $firstname)) {
        $errors = "First letter cap and minimum 2 char";
        header("location: ../pages/index.php?firstnameerror=$errors");
    } elseif (!preg_match("/^[A-Z][a-z]{2,}$/", $lastname)) {
        $errors = "First letter cap and minimum 2 char";
        header("location: ../pages/index.php?lastnameerror=$errors");
    } elseif (!preg_match("/^[a-zA-Z0-9]+([._+-]*[0-9A-Za-z]+)*@[a-zA-Z0-9]+.[a-zA-Z]{2,4}([.][a-z]{2,4})?$/", $email)) {
        $errors = "Enter valid email";
        header("location: ../pages/index.php?emailerror=$errors");
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*#?&])([a-zA-Z0-9@$!%*#?&]){8,}$/", $password)) {
        $errors = "Enter valid password";
        header("location: ../pages/index.php?passworderror=$errors");
    } else {
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password' WHERE id=$id";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("location: ../pages/index.php");
        }
    }
}
