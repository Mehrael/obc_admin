<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$department = mysqli_query($connection, "SELECT * FROM departments");

$id = 0;

    $id = $_GET['edit'];
    // echo $id;

    $emp =  mysqli_query($connection, "SELECT * FROM emp_view WHERE id=$id");
    $e = mysqli_fetch_assoc($emp);



?>


<?php
include '../shared/header.php';
include '../shared/nav.php';
?>
<br>

<h1 class="h">Employees's Data</h1>

<br>
<div class="p-3 mb-5 rounded d-flex justify-content-center ">


    <form class="  p-3 mb-5 rounded frm" style="width: 500px;">
        <div class="mx-auto p-3 mb-5 rounded d-flex  justify-content-center" style="width: 200px;">
            <img src="/ODC6/uploads/<?php echo $e['photo'];?>" width="400px;">
        </div>
   

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Employee name</label>
            <input type="text" disabled="true" class="form-control" name="name" value="<?php echo $e['emp_name']; ?>">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Salary</label>
            <input type="number" disabled="true" class="form-control" name="salary" value="<?php echo $e['salary']; ?>">
        </div>

        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput">Phone</label>
            <input type="text" disabled="true" class="form-control" name="phone" value="<?php echo $e['phone']; ?>">
        </div>


        <br>

        <div class="mx-auto" style="width: 200px;">
            <label for="formGroupExampleInput2">Department</label>
            <br>

            <select name="dept_select" disabled="true">

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

       
    </form>
</div>

<?php
include '../shared/footer.php';
?>