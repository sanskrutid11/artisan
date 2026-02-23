<?php

     require_once'C:\xampp\htdocs\artisian\connection.php';

    $id=$_POST['record'];
    $query="DELETE FROM product_size_variation where var_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"variation Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>