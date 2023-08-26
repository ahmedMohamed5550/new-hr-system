<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// show roles
$select="SELECT * FROM `roles`";
$s=mysqli_query($connection,$select);

// add data
$error=[];
if(isset($_POST['add'])){
    $name=filtervalidation($_POST['name']);
    $password=filtervalidation($_POST['password']);
    $role=filtervalidation($_POST['role']);
    if(stringvalidation($name)){
        $error[]="please enter Name required";
    }

    if(stringvalidation($password)){
        $error[]="please enter password required";
    }

    if(empty($error)){
    $insert="INSERT INTO `admin` VALUES(NULL,'$name','$password',$role)";
    $i=mysqli_query($connection,$insert);
    // header("location:/companyy/dapartements/list.php");
    path('admin/list.php');
    }
}

auth(1);
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
        <h1>Add Admin page</h1>
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>  
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div> 
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <?php foreach($s as $data): ?>
                            <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                            <?php endforeach; ?>
                    </select>  
                    </div>                                  
                    <button class="btn" name="add">Add Admin</button>                                       
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