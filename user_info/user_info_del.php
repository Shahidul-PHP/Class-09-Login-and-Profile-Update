<?php 
require '../db.php';
session_start();

$id = $_GET['id'];


$delete_user = "DELETE FROM students WHERE id=$id";

mysqli_query($db_connection,$delete_user);

$_SESSION['deleteMsg'] = 'Students Information Deleted';
header('location:users.php');
















?>