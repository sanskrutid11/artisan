<?php
session_start();
require_once'C:\xampp\htdocs\artisian\connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    // Retrieve form data
    $ProductName = $_POST['name'];
    $desc = $_POST['desci'];
    $price = $_POST['price'];

    // Process file upload and other data
    $name = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];

    $location = "../img/";
    $image = $location . $name;

    $target_dir = "../img/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $finalImage);

    // Perform database insertion
    $query1 = "INSERT INTO `product` (name, img, price, desci) VALUES (?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $query1);

    if (!$stmt1) {
        echo "Error preparing statement: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($stmt1, "ssds", $ProductName, $finalImage, $price, $desc);
    $insert = mysqli_stmt_execute($stmt1);

    if (!$insert) {
        $error_message = mysqli_error($conn);

        // Check if it's a duplicate entry error
        if (strpos($error_message, 'Duplicate entry') !== false) {
            echo "Error: Duplicate entry. Please handle accordingly.";
        } else {
            echo "Error: $error_message";
        }
    } else {
        echo "Record added successfully.";
    }
}
?>
