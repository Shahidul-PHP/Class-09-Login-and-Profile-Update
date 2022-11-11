<?php
session_start();
require '../db.php';


$id = $_GET['id'];


$delete_user = "DELETE FROM students WHERE id=$id";

mysqli_query($db_connection,$delete_user);

$_SESSION['deleteMsg'] = 'Students Information Deleted';
header('location:user_list.php');
