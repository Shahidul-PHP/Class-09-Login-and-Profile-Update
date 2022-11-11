<?php
session_start();
require 'db.php';



$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT COUNT(*) as find  FROM students WHERE email='$email'";
$select_res = mysqli_query($db_connection,$select);
$after_assoc = mysqli_fetch_assoc($select_res);


if($after_assoc['find'] == 1){
    $select2 = "SELECT * FROM students WHERE email='$email'";
    $select_res2 = mysqli_query($db_connection, $select2);
    $after_assoc2 = mysqli_fetch_assoc($select_res2);


    if(password_verify($password, $after_assoc2['password'])){
        $_SESSION['login_confirm'] = 'Login Done';
        header('location:dashboard.php'); 
    }else{
        if (empty($password)) {
            $_SESSION['wrong_pass'] = 'Enter Your Password !!';
            header('location:login.php');
        } else {
            $_SESSION['wrong_pass'] = 'Wrong Password ! Try Again';
            header('location:login.php');
        }   
    }

}else{
    if(empty($email)){
        $_SESSION['invalidMsg'] = 'For Login, Enter Your Email First';
        header('location:login.php');
    }else{
        $_SESSION['invalidMsg'] = 'Invalid Email Address';
        header('location:login.php');
    }
   
}


























?>