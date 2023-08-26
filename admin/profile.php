<?php 

// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

$adminid=$_SESSION['admin']['id'];
$select="SELECT * FROM adminalldata WHERE id=$adminid";
$s=mysqli_query($connection,$select);
$row=mysqli_fetch_assoc($s);

if(isset($_POST['send'])){
    $imagename=time() . $_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_type=$_FILES['image']['type'];
    $tmpname=$_FILES['image']['tmp_name'];
    $location="../upload/" . $imagename;
    if(empty($_FILES['image']['name'])){
        $imagename=$row['image'];
    }
    else{
        move_uploaded_file($tmpname,$location);
        $oldimage=$row['image'];
        if($oldimage != "profile.png"){
            unlink("../upload/$oldimage");
        }
    }
    $insert="UPDATE admin set image='$imagename' where id=$adminid";
    $i=mysqli_query($connection,$insert);
    path('admin/profile.php');


}



auth(2,3);
?>


<section class="home">
    <h1 class="text-center text-info mt-2 pt-2">Profile page</h1>
    <div class="container col-4">
        <div class="card">
            <img src="../upload/<?= $row['image']  ?>" class="img-top">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Upload image
</button>
            <div class="card-body">
                <h3>Name : <?= $row['name'] ?> </h3>
                <hr>
                <h4>Role : <?= $row['description'] ?></h4>
                <hr>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
        </div> 
        <button class="btn btn-primary" name="send">Save changes</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>


<?php 
include '../public/script.php';
?>