<?php
include '../shared/header.php';
include '../shared/nav.php';
?>

<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$id = $_SESSION['id'];

$admins = mysqli_query($connection, "SELECT * FROM `admin` WHERE id=$id");
$admin = mysqli_fetch_assoc($admins);
$good = false;

if (isset($_POST['update'])) {

    $username = $_POST['name'];

    $image_name = time() .  $_FILES['image']['name'];
    $image_tmpname = $_FILES['image']['tmp_name'];

    $location =   "../uploads/$image_name";
    $x = move_uploaded_file($image_tmpname, $location);


    $update = "UPDATE `admin` SET username='$username',photo='$image_name' WHERE id = $id";

    $query = mysqli_query($connection, $update);

    if ($query)
        $good = true;
}


?>

<br>

<h1 class="h">Update Data</h1>

<?php if ($good) { ?>
    <div class="d-flex justify-content-center ">
        <br>
        <div class="alert alert-success " role="alert">
            Data have been updated successfully
        </div>
        <br>
        <br>
    </div>
<?php } ?>
<br>
<br>

<div class="d-flex justify-content-center">
<form enctype="multipart/form-data" method="POST" class=" p-3 mb-5 rounded " style="width: 400px;">

    <div class="card p-3 mb-5 rounded frm" style="width: 20rem;">
        <?php if ($admin['photo'] != "") { ?>
            <div class="mx-auto" style="width: 200px;">
                <img src="/ODC6/uploads/<?php echo $admin['photo']; ?>" width="200px;">
            </div>

        <?php } ?>
        <br>
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Photo</label>
            <input type="file" name="image">
        </div>

        <br>
        <div class="mx-auto card-body">
            <p class="card-text">Username: </p>
            <input type="text" class="form-control" name="name" value="<?php echo $admin['username']; ?>">
        </div>
        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="update">Update</button>
        </div>
    </div>
</form>
</div>

<?php
include '../shared/footer.php';
?>