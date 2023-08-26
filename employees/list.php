<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");


// list employees
$select="SELECT * FROM `employeeswithdepartement`";
$s=mysqli_query($connection,$select);




// DELETE employees
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $selectimage="SELECT `image` FROM `employees` WHERE id=$id";
    $simage=mysqli_query($connection,$select);
    $row=mysqli_fetch_assoc($simage);
    $img=$row['image'];
    unlink("../upload/$img");
    $remove="DELETE FROM `employees` WHERE id=$id";
    $r=mysqli_query($connection,$remove);
    path('employees/list.php');
}
auth(2);
?>


<section class="home">
    <div class="container pt-1">
    <form class="form" action="./search.php" method="get">
        <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group">
                        <input name="namevalue" class="form-control" type="text" placeholder="search">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button id="myInput" name="search" class="btn">search</button>                                            
                    </div>
                    <div class="col-md-2">                       
                        <button name="searchbyDESC" class="btn">DESC</button>                       
                    </div>
                    <div class="col-md-2">                       
                        <button name="searchbyASC" class="btn">ASC</button>                       
                    </div>
                </div>
        </form>
        <div class="center">
        <div class="h1">
        <h1>List Employees page</h1>
        <div class="table">
        <div class="container col-md-8 text-center">
            <table id="myTable" class="table table-dark table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>salary</th>
                    <th>Image</th>
                    <th>Dep Id</th>               
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach($s as $data): ?>
                <tr>
                <th><?= $data['id'] ?></th>
                <th><?= $data['empname'] ?></th>
                <th><?= $data['salary'] ?></th>
                <th><img width="80px" src="../upload/<?= $data['image'] ?>"></th>
                <th><?= $data['depname']?></th>
                <th><a href="/companyy/employees/edit.php?edit=<?= $data['id'] ?>" class="btn btn-info">Edit</a></th>
                <th><a onclick="return confirm('Are you sure ?')" href="/companyy/employees/list.php?delete=<?= $data['id'] ?>" class="btn btn-danger">Delete</a></th>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
        </div>
        </div>
    
    </div>
</section>


<?php 
include '../public/script.php';
?>