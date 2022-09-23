<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');
$good = false;
if (isset($_POST['add'])) {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    $image_name = time() .  $_FILES['image']['name'];
    $image_tmpname = $_FILES['image']['tmp_name'];


    $location =   "../uploads/$image_name";

    $x = move_uploaded_file($image_tmpname, $location);

    $insert = "INSERT INTO `admin` VALUES (NULL,'$username','$password', '$image_name')";
   $query= mysqli_query($connection, $insert);

   if($query)
   $good =true;

}


?>


<?php
include '../shared/header.php';
include '../shared/nav.php';
?>

<br>

<h1 class="h">Add Admin</h1>


<br>
<?php if ($good) { ?>
    <div class="d-flex justify-content-center ">
        <br>
        <div class="alert alert-success " role="alert">
            Admin has been added successfully
        </div>
        <br>
        <br>
    </div>
<?php } ?>
<br>
<div class="d-flex justify-content-center ">
    <form enctype="multipart/form-data" method="POST" class=" p-3 mb-5 rounded frm" style="width: 400px;">
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">username</label>
            <input type="text" class="form-control" name="name">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">password</label>
            <input type="password" class="form-control" name="pass">
        </div>


        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Photo</label>
            <input type="file" name="image">
        </div>



        <br>

        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="add">Add</button>
        </div>
    </form>
</div>

<?php
include '../shared/footer.php';
?>