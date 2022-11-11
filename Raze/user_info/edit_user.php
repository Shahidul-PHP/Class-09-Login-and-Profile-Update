<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select_user = "SELECT * FROM students WHERE id=$id";
$select_user_res = mysqli_query($db_connection, $select_user);

$after_assoc = mysqli_fetch_assoc($select_user_res);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student Info</h2>
                    </div>
                    <div class="card-body">
                        <form action="update_user.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>

                                <input name="id" type="hidden" class="form-control" id="exampleInputName" aria-describedby="emailHelp" value="<?= $id ?>">

                                <input value="<?= $after_assoc['name'] ?>" name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputRoll" class="form-label">Roll</label>
                                <input value="<?= $after_assoc['roll'] ?>" name="roll" type="number" class="form-control" id="exampleInputRoll" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input value="<?= $after_assoc['email'] ?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>











</body>

</html>