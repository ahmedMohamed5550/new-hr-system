<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// add data
$error=[];

if(isset($_POST['add'])){
    $name=filtervalidation($_POST['name']);
    $salary=$_POST['salary'];
    $imagename=time() . $_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_type=$_FILES['image']['type'];      
    $tmpname=$_FILES['image']['tmp_name'];
    $location="../upload/" . $imagename;

    if(checkfilesize($image_size,2)){
        $error[]="please check file size";
    }

    if(checktypeimage($image_type)){
        $error[]="please check file type";
    }

    
    $depid=$_POST['dbname'];
    if(stringvalidation($name)){
        $error[]="please enter Name required";
    }
    if(numbervalidation($salary)){
        $error[]="please enter salary required";
    }

    if(empty($error)){
    move_uploaded_file($tmpname,$location);
    $insert="INSERT INTO `employees` VALUES(NULL,'$name',$salary,'$imagename',$depid)";
    $i=mysqli_query($connection,$insert);
    // header("location:/companyy/dapartements/list.php");
    path('employees/list.php');
    }
}


// show depatrmet
$select="SELECT * FROM `department`";
$s=mysqli_query($connection,$select);
auth(2);
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
        <h1>Add Employee page</h1>
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>  
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" placeholder="Salary">
                    </div> 
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div> 
                    <div class="form-group">
                        <label>Department Name</label>
                        <select name="dbname" class="form-control">
                            <?php foreach($s as $data): ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                                    
                    <button class="btn" name="add">add Employee</button>                                       
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