<?php

$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$emps = mysqli_query($connection, "SELECT * FROM emp_view");


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($connection, "DELETE FROM employees WHERE id=$id");
    header( "Location: list.php" );
    exit;
}


?>

<?php 
include '../shared/header.php';
include '../shared/nav.php';
?>
  <br>

<h1 class="h">Employees' List</h1>

<br>
<br>

<div class="mx-auto p-3 mb-5 rounded" style="width: 600;">
        <table class="table table-dark tbl rounded">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($emps as $e) { ?>
                    <tr>
                        <th scope="row"><?php echo $e['id'] ?></th>
                        <td><?php echo $e['emp_name'] ?></td>
                        <td><?php echo $e['salary'] ?></td>
                        <td><?php echo $e['phone'] ?></td>
                        <td><?php echo $e['dep_name'] ?></td>
                        
                        <td>
                        <a class="btn btn-info" href="view_emp.php?edit=<?php echo $e['id']; ?>"> <i class="fa-solid fa-eye"></i></a>
                        </td>

                        <td>
                        <a class="btn btn-primary" href="update.php?edit=<?php echo $e['id']; ?>">  <i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                        <a class="del_btn btn btn-danger" href="list.php?del=<?php echo $e['id']; ?>">          <i class="fa-solid fa-trash-can" ></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php
include '../shared/footer.php';
?>