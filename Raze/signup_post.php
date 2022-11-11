<?php 
require 'db.php';
session_start();

//name validation

$name = $_POST['name'];
$flag = true;

if(empty($name)){
    $_SESSION['name_error'] = 'Enter Your Name First';
    header('location:signup.php');
    $flag = false;
}else{
    if (!preg_match("/^[a-z A-z]*$/", $name)) {
        $_SESSION['name_error'] = 'Only Alphabet is Allowed';
        header('location:signup.php');
        $flag = false;
    }
}


// roll validation

$roll = $_POST['roll'];

if(empty($roll)){
    $_SESSION['roll_error'] = 'Enter Your Roll';
    header('location:signup.php');
    $flag = false;
}else{
    if(strlen($roll) < 6){
        $_SESSION['roll_error'] = 'Roll Must be 6 Digit';
        header('location:signup.php');
        $flag = false;
    }
}


// email validation

$email = $_POST['email'];

if (empty($email)) {
    $_SESSION['mailError'] = 'Enter Your Mail Please';
    header('location:signup.php');
    $flag = false;
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mailError'] = "Email Format Doesn't Mathed";
        header('location:signup.php');
        $flag = false;
    }
}

// password validation

$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,^.&,*,\,~,!!,!]@', $password);

if (empty($password)) {
    $_SESSION['passError'] = 'Provide a Password Please';
    header('location:signup.php');
    $flag = false;
} else {
    if (!$upper || !$lower || !$number || !$spsl || strlen($password) < 8) {
        $_SESSION['passError'] = 'Password Should be 1 uppercase, 1 lowercase, special character <br> and minumum 8 Character !! ';
        header('location:signup.php');
        $flag = false;
    }
}


if($flag){
    // databse insert file 
    $insert = "INSERT INTO students(name,roll,email,password) VALUES ('$name','$roll','$email','$after_hash')";
    mysqli_query($db_connection,$insert);
   
    $_SESSION['success'] = 'Account Created Successfully';
    header('location:signup.php');

}else{
    $_SESSION['name_value'] = $name;
    $_SESSION['email_value'] = $email;
    $_SESSION['roll_value'] = $roll;
    header('location:signup.php');
}













?>