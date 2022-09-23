<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');



$id = 0;
if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $name = $_GET['name'];

    $query = "UPDATE departments SET dep_name='$name' WHERE id = $id";

    mysqli_query($connection, $query);


    header("Location: list_dep.php");
    exit;
}
else
{
    
$id = $_GET['edit'];
// echo $id;

$emp =  mysqli_query($connection, "SELECT * FROM departments WHERE id=$id");
$e = mysqli_fetch_assoc($emp);
}


?>


<?php
include '../shared/header.php';
include '../shared/nav.php';
?>

<br>

<h1 class="h">Update Employee</h1>


<br>
<br>

<div class="d-flex justify-content-center ">
    <form class="  p-3 mb-5 rounded frm" style="width: 400px;">
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Department name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $e['dep_name']; ?>">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="update" value="<?php echo $id; ?>">Update</button>
        </div>
    </form>
</div>


<?php
include '../shared/footer.php';
?>