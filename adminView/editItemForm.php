<div class="container p-5">

<h4>Edit Product Detail</h4>
<?php
session_start();
require_once'C:\xampp\htdocs\artisian\connection.php';

$ID = mysqli_real_escape_string($conn, $_POST['record']);
$qry = mysqli_query($conn, "SELECT * FROM product WHERE id='$ID'");
$numberOfRow = mysqli_num_rows($qry);

if ($numberOfRow > 0) {
    while ($row1 = mysqli_fetch_array($qry)) {
?>
<form enctype="multipart/form-data" action="controller/updateItemController.php" method="POST">

    <div class="form-group">
        <input type="text" class="form-control" id="product_id" name="id" value="<?=$row1['id']?>" method="POST" hidden>
    </div>
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" name="name" value="<?=$row1['name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Product Description:</label>
      <input type="text" class="form-control"  name="desci"value="<?=$row1['desci']?>">
    </div>
    <div class="form-group">
      <label for="price">Unit Price:</label>
      <input type="number" class="form-control" name="price" value="<?=$row1['price']?>">
    </div>
    
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$row1["img"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <input type="hidden" name="existingImage"  class="form-control" value="<?=$row1['img']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
</form>
<?php
    }
}
?>
</div>