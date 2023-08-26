<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

$select="SELECT * FROM department";
$department=mysqli_query($connection,$select);




if($_GET['edit']){
    $id=$_GET['edit'];
    $select="SELECT * FROM employeeswithdepartement WHERE id=$id";
    $s=mysqli_query($connection,$select);
    $row=mysqli_fetch_assoc($s);

    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $salary=$_POST['salary'];
        // image
        if(!empty ($_FILES['image']['name'])){
        $imagename=time() . $_FILES['image']['name'];
        $tmpname=$_FILES['image']['tmp_name'];
        $location="../upload/" . $imagename;
        move_uploaded_file($tmpname,$location);
        $imgname=$row['image'];
        unlink("../upload/$imgname");
        }
        else{
            $imagename=$row['image'];
        }
                
        $departement_id=$_POST['departement_id'];

        $update="UPDATE `employees` set name='$name',salary='$salary',image='$imagename', department_id='$departement_id' where id=$id";
        $i=mysqli_query($connection,$update);
        path('employees/list.php');
    }
}

auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <h1>Welcome at Edit department page</h1>
        <div class="card">
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="<?= $row['empname'] ?>" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" value="<?= $row['salary'] ?>" class="form-control" name="salary">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div> 
                    <div class="form-group">
                        <label>departement id</label>
                        <select name="departement_id" class="form-control" >
                        <option value="<?= $row['id'] ?>"> <?= $row['depname'] ?> </option> 
                        <?php foreach($department as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>                          
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <button name="send" class="btn btn-info m-3">Send employees</button>
                </form>
            </div>
        </div>

    </div>
</section>



<?php 
include '../public/script.php';
?>