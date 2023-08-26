<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// list department

$select="SELECT * FROM `department`";
$s=mysqli_query($connection,$select);

// DELETE department
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $remove="DELETE FROM `department` WHERE id=$id";
    $r=mysqli_query($connection,$remove);
    path('dapartements/list.php');
}
auth(2,3);
?>


<section class="home">
    <div class="container pt-1">
        <div class="center">
        <div class="h1">
        <h1>List Department page</h1>
        <div class="table">
        <div class="container col-md-8 text-center">
            <table class="table table-dark table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>                   
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach($s as $data): ?>
                <tr>
                <th><?= $data['id'] ?></th>
                <th><?= $data['name'] ?></th>
                <th><a href="/companyy/dapartements/edit.php?edit=<?= $data['id'] ?>" class="btn btn-info">Edit</a></th>
                <th><a onclick="return confirm('Are you sure ?')" href="/companyy/dapartements/list.php?delete=<?= $data['id'] ?>" class="btn btn-danger">Delete</a></th>
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