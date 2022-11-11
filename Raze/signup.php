<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="admin_assets/reg_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="admin_assets/reg_files/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="inner container mt-5">
            <div class="image-holder">
                <img height="460px" src="https://images.unsplash.com/flagged/photo-1554473675-d0904f3cbf38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80.jpg" alt="">
            </div>


            <form class="p-5" action="signup_post.php" method="POST">
                <h3 class="mb-5">Oxford University Student Panel</h3>
                <div class="mb-3">

                    <input placeholder="Name" name="name" type="text" class="form-control" value="<?= isset($_SESSION['name_value']) ? $_SESSION['name_value'] : '' ?>">

                    <?php if (isset($_SESSION['name_error'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['name_error'] ?></strong>
                    <?php }
                    unset($_SESSION['name_error']) ?>

                </div>
                <div class="mb-3">

                    <input name="roll" type="number" class="form-control" placeholder="Student Roll" value="<?= isset($_SESSION['roll_value']) ? $_SESSION['roll_value'] : '' ?>">

                    <?php if (isset($_SESSION['roll_error'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['roll_error'] ?></strong>
                    <?php }
                    unset($_SESSION['roll_error']) ?>

                </div>

                <div class="mb-3">
                    <input name="email" type="text" class="form-control" placeholder="Email" value="<?= isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '' ?>">
                    <?php if (isset($_SESSION['mailError'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['mailError'] ?></strong>
                    <?php }
                    unset($_SESSION['mailError']) ?>

                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <?php if (isset($_SESSION['passError'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['passError'] ?></strong>
                    <?php }
                    unset($_SESSION['passError']) ?>
                </div>

                <button class="btn btn-primary mt-1 mb-2" type="submit">Create Account</button>
                <p>Already Have an Account ? <strong><a href="login.php">Login Here</a></strong></p>
        </div>
        </form>

    </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_SESSION['success'])) { ?>

        <script>
            Swal.fire({
                title: 'Oxford University Student Panel',
                text: '<?= $_SESSION['success'] ?>',
                imageUrl: 'https://images.unsplash.com/flagged/photo-1554473675-d0904f3cbf38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            })
        </script>

    <?php }
    unset($_SESSION['success']) ?>

</body>

</html>

<?php

unset($_SESSION['name_value']);
unset($_SESSION['email_value']);
unset($_SESSION['roll_value']);


?>