<?php

function testmessage($connection,$message){
if($connection){
echo "<div class='alert alert-danger'>
    $message successfuly
</div>";
}
else{
    echo "<div class='alert alert-danger'>
    $message failed
</div>";
}
}

function path($go){
echo "<script> location.replace('/companyy/$go') </script>";
}

function auth($num1=null,$num2=null){
    if(isset($_SESSION['admin'])){
        if($_SESSION['admin']['role'] == 1 || $_SESSION['admin']['role'] == $num1 || $_SESSION['admin']['role'] == $num2){

        }
        else{
            path('public/error.php');
        }
    }
    else{
        path('admin/login.php');
    }
}

// validation to input 

function filtervalidation($inputvalue){
$inputvalue = trim($inputvalue);
$inputvalue = htmlspecialchars($inputvalue);
$inputvalue = strip_tags($inputvalue);
return $inputvalue;
}


function stringvalidation($inputvalue){
    $empty = empty($inputvalue);
    $lengh = strlen($inputvalue) < 5;

    if($empty == true || $lengh == true){
        return true;
    }
    else{
    return false;
    }

    }

    // validation number
    function numbervalidation($inputvalue){
        $empty = empty($inputvalue);
        $isnegative = ($inputvalue) < 0;
        $isnumber=filter_var($inputvalue, FILTER_VALIDATE_INT) == false;
    
        if($empty == true || $isnegative == true || $isnumber == true){
            return true;
        }
        else{
        return false;
        }    
        }

        // check file size
    function checkfilesize($filesize,$size){
        $file_validate_size=($filesize/1024) / 1024;
        if($file_validate_size > $size){
            return true;
        }
        else{
            return false;
        }
    }

    // check image type
    function checktypeimage($imageinput){
        if($imageinput == "image/jpeg" || $imageinput == "image/jpg" || $imageinput == "image/png" || $imageinput == "image/jif"){
            return false;
        }
        else{
            return true;
        }
    }
        
    

?>

