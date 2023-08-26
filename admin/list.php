<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// list department

$select="SELECT * FROM `adminroles`";
$s=mysqli_query($connection,$select);

// DELETE department
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $remove="DELETE FROM `admin` WHERE id=$id";
    $r=mysqli_query($connection,$remove);
    path('admin/list.php');
}
auth(1);
?>


<section class="home">
    <div class="container pt-1">
        <div class="center">
        <div class="h1">
        <h1>List Admin page</h1>
        <div class="table">
        <div class="container col-md-8 text-center">
            <table class="table table-dark table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>  
                    <th>role</th>                  
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach($s as $data): ?>
                <tr>
                <th><?= $data['id'] ?></th>
                <th><?= $data['name'] ?></th>
                <th><?= $data['description'] ?></th>
                <th><a href="/companyy/admin/edit.php?edit=<?= $data['id'] ?>" class="btn btn-info">Edit</a></th>
                <th><a onclick="return confirm('Are you sure ?')" href="/companyy/admin/list.php?delete=<?= $data['id'] ?>" class="btn btn-danger">Delete</a></th>
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