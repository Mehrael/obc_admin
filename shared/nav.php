<?php
error_reporting(1);  ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/ODC6/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <?php if($_SESSION['isAdmin']){ ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Actions
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/ODC6/employees/create.php">Create Employee</a>
          <a class="dropdown-item" href="/ODC6/employees/create_dep.php">Create Department</a>
          <a class="dropdown-item" href="/ODC6/employees/list.php">Employees' List</a>
          <a class="dropdown-item" href="/ODC6/employees/list_dep.php">Departments' List</a>
          <a class="dropdown-item" href="/ODC6/auth/admin_page.php">Dashboard</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/ODC6/index.php?kill=1">Log out <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>

    </ul>
  </div>
</nav>