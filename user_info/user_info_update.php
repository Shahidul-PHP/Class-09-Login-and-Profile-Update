<?php 
require '../db.php';
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$password = $_POST['password'];

$after_hash = password_hash($password,PASSWORD_DEFAULT);



if(empty($password)){
    $update_info = "UPDATE students SET name='$name', department = '$department', email = '$email' WHERE id= $id";
    mysqli_query($db_connection,$update_info);
    header('location:users.php');
}else{
    $update_info = "UPDATE students SET name='$name', department = '$department', email = '$email', password = '$password' WHERE id= $id";
    mysqli_query($db_connection, $update_info);
    header('location:users.php');
}
















?>