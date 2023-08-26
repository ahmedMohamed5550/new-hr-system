<?php
// // ui
include '../public/head.php';
include '../public/nav.php';

// // connect to database
include '../App/config.php';
include '../App/function.php';
// testmessage($connection,"connection");

// admin login
if(isset($_POST['login'])){
$name=$_POST['name'];
$password=$_POST['password'];
// $hashpassword=sha1($_POST['password']);
$select="SELECT * FROM `admin` WHERE name='$name' and password='$password'";
$s=mysqli_query($connection,$select);
$row=mysqli_num_rows($s);
$data=mysqli_fetch_assoc($s);
if($row == 1){
$_SESSION['admin']=[
    "name"=> $data['name'],
    "role"=> $data['role'],
    "id" => $data['id']
];

path('index.php');
}
else{

}
}
// print_r($_SESSION);

 ?>


<section class="home">
            
        <div class="container col-6">
        <h1 >Login page</h1>
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button name="login" class="btn btn-login m-3 ">login</button>
                </form>
            </div>
        </div>

    </div>
</section>



<?php
include '../public/script.php';
?>