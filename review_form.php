<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'C:\xampp\htdocs\artisian\connection.php';

$product_id = $_GET['product_id'];
$order_id = $_GET['order_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    // Insert review into the database
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_id, rating, comment, order_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisi", $product_id, $user_id, $rating, $comment, $order_id);

    if ($stmt->execute()) {
        echo "Review submitted successfully!";
        // Redirect to order history page
        header("Location: order_history.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Submit Review for Product ID: <?php echo htmlspecialchars($product_id); ?></h2>
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>
        <br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required></textarea>
        <br>
        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
