<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$department = mysqli_query($connection, "SELECT * FROM departments");

$id = 0;
if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $name = $_GET['name'];
    $salary = $_GET['salary'];
    $phone = $_GET['phone'];
    $depid = $_GET['dept_select'];

    // echo $id;
    $query = "UPDATE employees SET emp_name='$name',phone='$phone',salary=$salary,depID=$depid WHERE id = $id";

    mysqli_query($connection, $query);

    // path("/ODC6/employees/list.php");

    header("Location: list.php");
    exit;
} else {

    $id = $_GET['edit'];
    // echo $id;

    $emp =  mysqli_query($connection, "SELECT * FROM emp_view WHERE id=$id");
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
            <label for="formGroupExampleInput">Employee name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $e['emp_name']; ?>">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Salary</label>
            <input type="number" class="form-control" name="salary" value="<?php echo $e['salary']; ?>">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $e['phone']; ?>">
        </div>


        <br>

        <?php if ($e['photo'] != "") { ?>
            <div class="mx-auto p-3 mb-3 d-flex  justify-content-center">
                <img src="/ODC6/uploads/<?php echo $e['photo']; ?>" width="200px;">
            </div>

        <?php } ?>
        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Photo</label>
            <input type="file" name="image" value="<?php echo $e['photo']; ?>">
        </div>


        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Department</label>
            <br>

            <select name="dept_select">

                <?php foreach ($department as $option) { ?>

                    <option value="<?php echo $option['id']; ?> " <?php if ($e['depID'] == $option['id']) {
                                                                        echo "selected";
                                                                    } ?>>
                        <?php echo $option['dep_name']; ?>
                    </option>

                <?php } ?>
            </select>

        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary btn-lg btn-block" name="update" value="<?php echo $id; ?>">Update Employee</button>
        </div>
    </form>
</div>


<?php
include '../shared/footer.php';
?>