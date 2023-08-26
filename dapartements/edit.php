<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// edit 

$name=false;
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$sselect="SELECT * FROM `department` WHERE id=$id";
$ss=mysqli_query($connection,$sselect);
$data=mysqli_fetch_assoc($ss);
$name=$data['name'];

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $updatedata="UPDATE `department` SET name='$name' WHERE id=$id";
    $u=mysqli_query($connection,$updatedata);
    path('dapartements/list.php');
}
}
auth();
?>


<section class="home">
    <div class="container pt-1">
        <div class="center">
        <div class="h1">
        <h1>Edit Department page</h1>
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $name ?>" class="form-control" placeholder="Department name">
                    </div>                                     
                    <button class="btn" name="update">Update Department</button>                                       
                </form>
            </div>
        </div>
        </div>
        </div>
    
    </div>
</section>



<?php 
include '../public/script.php';
?>