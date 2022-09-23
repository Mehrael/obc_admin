
<?php
include '../shared/header.php';
include '../shared/nav.php';
?>
<br>


<?php
$connection = mysqli_connect('localhost', 'root', '', 'odc6');

$rows = mysqli_query($connection, "SELECT * FROM `admin`");
// $admins = mysqli_fetch_assoc($rows);
// print_r($admins);

$allow = true;

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  foreach ($rows as $admins) {
    // print_r($admins);
    if ($username == $admins['username'] && $password == $admins['password']) {
      $_SESSION['id'] = $admins['id'];
      $_SESSION['isAdmin'] = true;
      $allow = true;
      // print_r($_SESSION);
      // echo $admins["id"];
      
      header("Location: admin_page.php");
      exit;
      break;
    } else {
      $allow = false;
      $_SESSION['isAdmin'] = false;
    }
  }
}


?>

<h1 class="h">Log in</h1>
<br>
<br>

<div class="d-flex justify-content-center ">
  <form method="POST" class=" p-3 mb-5 rounded frm" style="width: 400px;">
    <div class="mx-auto" style="width: 200px;">
      <label for="formGroupExampleInput">Username</label>
      <input type="text" class="form-control" name="username">
    </div>

    <br>

    <div class="mx-auto" style="width: 200px;">
      <label for="formGroupExampleInput2">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <br>
    <?php if (!$allow) { ?>
      <div class="mx-auto" style="width: 200px;">
        <label class="warning" for="formGroupExampleInput2">Either username or password is not correct</label>
      </div>
      <br>
    <?php } ?>
    <div class="mx-auto" style="width: 200px;">
      <button class="btn btn-primary btn-lg btn-block" name="login">Log in</button>
    </div>
    <br>
  </form>
</div>

<?php
include '../shared/footer.php';
?>