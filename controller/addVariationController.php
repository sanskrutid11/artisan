<?php
   require_once'C:\xampp\htdocs\artisian\connection.php';

    if(isset($_POST['upload']))
    {
       
        $product = $_POST['product'];
        
        $qty = $_POST['qty'];

         $insert = mysqli_query($conn,"INSERT INTO product_size_variation
         (product_id,quantity_in_stock) VALUES ('$product','$qty')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../adminindex.php?variation=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../adminindex.php?variation=success");
         }
     
    }
        
?>