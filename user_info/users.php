
<?php
require '../login_req.php';
require '../db.php';
session_start();

$user_info_select = "SELECT * FROM students ";
$result = mysqli_query($db_connection, $user_info_select);
echo '<title>Student List</title>';
?>


<?php require '../dashboard_parts/Header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-4 p-4">
            <div class="card">
                <div class="card-header">
                    <h2>Students Information</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name of Student's</th>
                            <th>Department</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($result as $key => $student_info) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $student_info['name'] ?></td>
                                <td><?= $student_info['department'] ?></td>
                                <td><?= $student_info['email'] ?></td>
                                <td>
                                    <a href="user_info_edit.php?id=<?= $student_info['id'] ?>" class="btn btn-warning text-white"><i class="fa-solid fa-user-pen"></i></a>

                                    <button data-id="user_info_del.php?id=<?= $student_info['id'] ?>" class="delete_btn btn btn-primary"><i class=" fa-sharp fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../dashboard_parts/Footer.php' ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete_btn').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                link = $(this).attr('data-id');
                window.location.href = link;
            }

        })
    });
</script>
<?php
if (isset($_SESSION['deleteMsg'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?= $_SESSION['deleteMsg'] ?>',
            'success'
        )
    </script>
<?php }
unset($_SESSION['deleteMsg']) ?>