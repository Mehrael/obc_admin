<?php
include '../shared/header.php';
include '../shared/nav.php';

?>

<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

// print_r($_SESSION);
$id = $_SESSION['id'];
$admins = mysqli_query($connection, "SELECT * FROM `admin` WHERE id=$id");
$admin = mysqli_fetch_assoc($admins);

?>

<br>
<h1 class="h">Welcome</h1>
<br>
<div class="d-flex justify-content-center p-3 mb-5 rounded">
    <div class="row">
        <div class="col">
            <div class="col-sm-12">
                <div class="frm card justify-content-center p-5 mb-5 rounded" style="width: 20rem;">
                    <img src="/ODC6/uploads/<?php echo $admin['photo']; ?>" width="200px;">
                    <br>
                    <p class="h card-title">Username: <?php echo $admin['username']; ?></p>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="col-sm-12 ">
                <div class="frm rounded">
                    <div class="card-body">
                        <h5 class="card-title">Add new Admin</h5>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <a href="add_admin.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="col-sm-12">
                <div class="frm ">
                    <div class="card-body">
                        <h5 class="card-title">Edit your data</h5>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <a href="edit.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="col-sm-12">
                <div class="frm ">
                    <div class="card-body">
                        <h5 class="card-title">Change password</h5>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <a href="new_pass.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include '../shared/footer.php';
?>