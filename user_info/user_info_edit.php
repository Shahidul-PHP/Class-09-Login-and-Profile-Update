<?php
require '../login_req.php';
require '../db.php';
session_start();

$id = $_GET['id'];
$select_all_user = "SELECT * FROM students WHERE id = $id";

$make_query = mysqli_query($db_connection, $select_all_user);
$make_assoc = mysqli_fetch_assoc($make_query);

// echo '<pre>';
//     print_r($make_assoc);
// echo '</pre>';
// 
?>

<?php require '../dashboard_parts/Header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-3 p-4">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Students Informations</h2>
                </div>
                <div class="card-body">
                    <form class="p-3" action="user_info_update.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $id ?>">
                            <input type="text" name="name" class="form-control" value="<?= $make_assoc['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Department</label>
                            <input type="text" name="department" class="form-control" value="<?= $make_assoc['department'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $make_assoc['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Update Your Password">
                        </div>

                        <button type="submit" class="mt-2 btn btn-danger">Update Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../dashboard_parts/Footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>