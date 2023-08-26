<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

$select="SELECT * FROM `roles`";
$roles=mysqli_query($connection,$select);
// edit 

$name=false;
$password=false;
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$sselect="SELECT * FROM `admin` WHERE id=$id";
$ss=mysqli_query($connection,$sselect);
$row=mysqli_fetch_assoc($ss);
$name=$row['name'];
$password=$row['password'];
$role=$row['role'];

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $updatedata="UPDATE `admin` SET name='$name',password='$password',role=$role WHERE id=$id";
    $u=mysqli_query($connection,$updatedata);
    path('admin/list.php');
}
}
auth();
?>


<section class="home">
    <div class="container pt-1">
        <div class="center">
        <div class="h1">
        <h1>Edit admin page</h1>
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $name ?>" class="form-control" placeholder="name">
                    </div>    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="password" name="password" value="<?= $password ?>" class="form-control" placeholder="password">
                    </div>  
                    <div class="form-group">
                        <label>role</label>
                        <select name="role" class="form-control" >                      
                        <?php foreach($roles as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['description'] ?> </option>                          
                        <?php endforeach; ?>
                        </select>
                    </div>                                 
                    <button class="btn" name="update">Update admin</button>                                       
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