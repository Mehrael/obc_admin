<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$department = mysqli_query($connection, "SELECT * FROM departments");

if (isset($_POST['insrt'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $image_name = time() .  $_FILES['image']['name'];
    $image_tmpname = $_FILES['image']['tmp_name'];
    $depid = $_POST['dept_select'];

    $location =   "../uploads/$image_name";
    $x = move_uploaded_file($image_tmpname, $location);
    $insert = "INSERT INTO employees VALUES (NULL,'$name',$salary, '$phone','$image_name', $depid)";
    mysqli_query($connection, $insert);
// if($x)
// {
//     echo "DONE";
// }
//     echo $name;
//     echo $image_name;


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
    <form enctype="multipart/form-data" method="POST" class=" p-3 mb-5 rounded frm" style="width: 400px;">
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Employee name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Salary</label>
            <input type="number" class="form-control" name="salary">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>


        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Photo</label>
            <input type="file" name="image">
        </div>


        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Department</label>
            <br>



            <select name="dept_select">
                <?php foreach ($department as $option) { ?>
                    <option value="<?php echo $option['id']; ?> ">
                        <?php echo $option['dep_name']; ?>
                    </option>

                <?php } ?>
            </select>

        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="insrt">Insert Employee</button>
        </div>
    </form>
</div>


<?php
include '../shared/footer.php';
?>