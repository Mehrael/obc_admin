<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');


if (isset($_GET['insrt'])) {
    $name = $_GET['name'];
        $insert = "INSERT INTO departments VALUE (NULL, '$name')";
    mysqli_query($connection, $insert);
}


?>


<?php
include '../shared/header.php';
include '../shared/nav.php';
?>

<br>

<h1 class="h">Create Employee</h1>


<br>
<br>

<div class="d-flex justify-content-center ">
    <form class="  p-3 mb-5 rounded frm" style="width: 400px;">
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Department name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="insrt">Insert Department</button>
        </div>
    </form>
</div>


<?php
include '../shared/footer.php';
?>