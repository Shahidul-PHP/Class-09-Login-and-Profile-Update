<?php
// php code
session_start();
?>

<!-- html code -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="dashboard_asset/colorlib-regform-26/fonts/linearicons/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="dashboard_asset/colorlib-regform-26/css/style.css">
    <style>
        .fa-solid {
            font-weight: 900;
            margin-top: -36px;
            position: relative;
            top: -24px;
            left: 288px
        }

        .show_error {
            color: red;
            margin-bottom: 16px;
            text-align: left;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="dashboard_asset/colorlib-regform-26/images/image-1.png" alt="" class="image-1">

            <form action="register_data_post.php" method="POST">
                <h3>Create Account</h3>

                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input name="name" type="text" class="form-control" placeholder="Student Full Name" value="<?= isset($_SESSION['name_value_error']) ? $_SESSION['name_value_error'] : '' ?>">
                </div>

                <?php if (isset($_SESSION['nameError'])) { ?>
                    <p class="show_error"><?= $_SESSION['nameError'] ?></p>
                <?php }
                unset($_SESSION['nameError']) ?>

                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input name="department" type="text" class="form-control" placeholder="Department" value="<?= isset($_SESSION['department_value_error']) ? $_SESSION['department_value_error'] : '' ?>">
                </div>

                <?php if (isset($_SESSION['deptError'])) { ?>
                    <p class=" show_error"><?= $_SESSION['deptError'] ?></p>
                <?php }
                unset($_SESSION['deptError']) ?>

                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input name="email" type="text" class="form-control" placeholder="Mail" value="<?= isset($_SESSION['mail_value_error']) ? $_SESSION['mail_value_error'] : '' ?>">
                </div>

                <?php if (isset($_SESSION['mailError'])) { ?>
                    <p class=" show_error"><?= $_SESSION['mailError'] ?></p>
                <?php }
                unset($_SESSION['mailError']) ?>

                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="show" name="password" type="password" class="form-control" placeholder="Password"><i class="fa-solid fa-eye" onclick="showPass()"></i>
                </div>
                <?php if (isset($_SESSION['passError'])) { ?>
                    <p class="show_error"><?= $_SESSION['passError'] ?></p>
                <?php }
                unset($_SESSION['passError']) ?>

                <button type="submit">
                    <span>CREATE NEW ACCOUNT</span>
                </button>
                <br>
                <p>Already have an Account ? <a href="login.php"><strong>Login Here</strong></a></p>

            </form>

            <img src="dashboard_asset/colorlib-regform-26/images/image-2.png" alt="" class="image-2">
        </div>
    </div>


    <script src="dashboard_asset/colorlib-regform-26/js/jquery-3.3.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="dashboard_asset/colorlib-regform-26/js/main.js"></script>

    <?php if (isset($_SESSION['confirmation'])) { ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "<?= $_SESSION['confirmation'] ?>",
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php }
    unset($_SESSION['confirmation']) ?>

    <script>
        function showPass() {
            let pass = document.getElementById('show')
            if (pass.type == 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }
        }
    </script>

</body>

</html>



<?php
// session code 
unset($_SESSION['name_value_error']);
unset($_SESSION['department_value_error']);
unset($_SESSION['mail_value_error']);
?>