<?php

session_start();

if(isset($_GET['logout'])){
session_destroy();
session_unset();
header("location:/companyy/admin/login.php");
}

?>



<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/companyy/index.php">company</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if(isset($_SESSION['admin'])):?> 
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/companyy/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/companyy/admin/profile.php">Profile</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/companyy/dapartements/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                departments
                </a>
                <ul class="dropdown-menu" aria-labelledby="departments">
                  <li><a class="dropdown-item" href="/companyy/dapartements/add.php">Add department</a></li>
                  <li><a class="dropdown-item" href="/companyy/dapartements/list.php">list department</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/companyy/employees/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                employees
                </a>
                <ul class="dropdown-menu" aria-labelledby="employees">
                  <li><a class="dropdown-item" href="/companyy/employees/add.php">Add employees</a></li>
                  <li><a class="dropdown-item" href="/companyy/employees/list.php">list employees</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/companyy/admin/add.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
                </a>
                <ul class="dropdown-menu" aria-labelledby="departments">
                  <li><a class="dropdown-item" href="/companyy/admin/add.php">Add admin</a></li>
                  <li><a class="dropdown-item" href="/companyy/admin/list.php">list admin</a></li>
                </ul>
              </li>
              <?php endif;?> 
              
             
            </ul>
            <div class="d-flex">  
              <?php if(!isset($_SESSION['admin'])):?>          
              <a class="btn btn-success mx-3" href="/companyy/admin/login.php" >login</a>
              <?php else: ?>              
              <form>
              <button onclick="return confirm('are you sure ?')" name="logout" class="btn btn-danger ml-3" href="/companyy/admin/login.php">logout</button>
              </form>
              <?php endif; ?> 
             
            </div>
          </div>
        </div>
    </nav>