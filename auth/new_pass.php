<?php
include '../shared/header.php';
include '../shared/nav.php';

$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$id = $_SESSION['id'];

$admins = mysqli_query($connection, "SELECT * FROM `admin` WHERE id=$id");
$admin = mysqli_fetch_assoc($admins);
$good = false;
$alert = false;
$re_enter = false;
if (isset($_POST['update'])) {
    $old_pass = $_POST['old_pass'];

    if ($old_pass == $admin['password']) {
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
        if ($new_pass == $confirm_pass) {
            $update = "UPDATE `admin` SET `password`=$new_pass WHERE id = $id";

            $query = mysqli_query($connection, $update);

            if ($query)
                $good = true;
        } else {
            $re_enter = true;
        }
    } else {
        $alert = true;
    }
}
?>
<br>
<h1 class="h">Change password</h1>
<br>
<?php if ($good) { ?>
    <div class="d-flex justify-content-center ">
        <br>
        <div class="alert alert-success " role="alert">
            Password changed successfully
        </div>

    </div>
<?php }
if ($alert) { ?>
    <div class="d-flex justify-content-center ">
        <br>
        <div class="alert alert-danger " role="alert">
            password is incorrect
        </div>


    </div>


<?php } ?>
<br>
<div class="d-flex justify-content-center p-3 mb-5 rounded">
    <form method="POST" class=" p-3 mb-5 rounded frm" style="width: 400px;">

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Old password</label>
            <input type="password" class="form-control" name="old_pass">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">New password</label>
            <input type="password" class="form-control" name="new_pass">
        </div>
        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Confirm password</label>
            <input type="password" class="form-control" name="confirm_pass">
        </div>
        <br>
        <?php if ($re_enter) { ?>
            <div class="mx-auto" style="width: 200px;">
                <label class="warning" for="formGroupExampleInput2">Confirm your new password</label>
            </div>
            <br>
        <?php } ?>
        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="update">Update</button>
        </div>
    </form>

</div>
<?php
include '../shared/footer.php';
?>