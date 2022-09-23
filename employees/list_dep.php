<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$emps = mysqli_query($connection, "SELECT * FROM departments");


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($connection, "DELETE FROM departments WHERE id=$id");
    header( "Location: list_dep.php" );
    exit;
}


?>

<?php 
include '../shared/header.php';
include '../shared/nav.php';
?>
  <br>

<h1 class="h">Departments' List</h1>

<br>
<br>

<div class="mx-auto p-3 mb-5 rounded">
        <table class="table table-dark tbl rounded">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($emps as $e) { ?>
                    <tr>
                        <th scope="row"><?php echo $e['id'] ?></th>
                        <td><?php echo $e['dep_name'] ?></td>
                        <td>
                        <a class="btn btn-primary" href="update_dep.php?edit=<?php echo $e['id']; ?>">Edit</a>
                        </td>
                        <td>
                        <a class="del_btn btn btn-danger" href="list_dep.php?del=<?php echo $e['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php
include '../shared/footer.php';
?>