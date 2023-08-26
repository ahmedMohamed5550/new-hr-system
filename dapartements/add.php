<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// add data

$error=[];  // to push error message

if(isset($_POST['add'])){
    $name=filtervalidation($_POST['name']);
    if(stringvalidation($name)){
        $error[]="please enter Name required";
    }
    if(empty($error)){
        $insert="INSERT INTO `department` VALUES(NULL,'$name')";
        $i=mysqli_query($connection,$insert);
        path('dapartements/list.php');
    }

}
auth(2,3);
?>


<section class="home">
    <div class="container pt-1">
        <?php if(!empty($error)): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach($error as $data): ?>
                    <li> <?= $data ?> </li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="center">
        <div class="h1">
        <h1>Add Department page</h1>
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Department name">
                    </div>                                     
                    <button class="btn" name="add">add Department</button>                                       
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