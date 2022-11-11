<?php 
require '../db.php';
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$roll = $_POST['roll'];
$password = $_POST['password'];

$after_hash = password_hash($password,PASSWORD_DEFAULT);



if(empty($password)){
    $update_info = "UPDATE students SET name='$name', roll = '$roll', email = '$email' WHERE id= $id";
    mysqli_query($db_connection,$update_info);
    header('location:user_list.php');
}else{
    $update_info = "UPDATE students SET name='$name', roll='$roll', email = '$email', password = '$password' WHERE id= $id";
    mysqli_query($db_connection, $update_info);
    header('location:user_list.php');
}
