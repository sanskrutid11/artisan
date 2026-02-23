<?php
session_start();
require_once'C:\xampp\htdocs\artisian\connection.php';

$product_id = $_POST['id'];
$p_name = mysqli_real_escape_string($conn, $_POST['name']);
$p_desc = mysqli_real_escape_string($conn, $_POST['desci']);
$p_price = $_POST['price'];

// Check if 'existingImage' key is set in the $_POST array
$existingImage = isset($_POST['existingImage']) ? $_POST['existingImage'] : '';

if (isset($_FILES['newImage'])) {
    // Process file upload and other data
    // ...
} else {
    // Use the existing image path
    $final_image = $existingImage;
}

$updateQuery = "UPDATE product SET 
    name='$p_name', 
    desci='$p_desc', 
    price=$p_price,
    img='$final_image' 
    WHERE id=$product_id";

// Uncomment the next line to see the generated SQL query for debugging
// echo $updateQuery;

$updateItem = mysqli_query($conn, $updateQuery);

if ($updateItem) {
    echo "Update successful";
} else {
    echo "Update failed: " . mysqli_error($conn) . " - Query: " . $updateQuery;
}
?>
