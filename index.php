<?php 
include './shared/header.php';
include './shared/nav.php';

if($_GET['kill'] == 1)
{
  session_unset();
}
?>
  <br>

<h1 class="h">Welcome to Home Page</h1>

<br>

<div class="d-flex justify-content-center">
<a class="btn btn-primary btn-lg" href="auth/login.php">Log in</a>

</div>

<?php
include './shared/footer.php';
?>