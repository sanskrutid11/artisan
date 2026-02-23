<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artisian";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve order ID from the query string
$orderId = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($orderId > 0) {
    // Prepare and bind the order statement
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $orderResult = $stmt->get_result();

    if ($orderResult && $orderResult->num_rows > 0) {
        $order = $orderResult->fetch_assoc();
    } else {
        die("Order not found.");
    }
} else {
    die("Invalid order ID.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    // Insert the review into the reviews table
    $stmt = $conn->prepare("INSERT INTO review (product_id, user_name, review_text, rating, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $orderId, $_SESSION['username'], $review, $rating);

    if ($stmt->execute()) {
        echo "Review submitted successfully.";
    } else {
        echo "Error submitting review: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <style>
        /* CSS Stylesheet */

body {
    font-family: Arial, sans-serif;
    background-color: white;
    color: #e0e0e0;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: black;
    margin-top: 20px;
}

form {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    max-width: 600px;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

label {
    display: block;
    margin-bottom: 10px;
    color: black;
}

textarea, input[type="number"] {
    width: 96%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #444;
    border-radius: 4px;
    background-color: white;
    color: #e0e0e0;
}

textarea {
    height: 100px;
    resize: vertical;
}

button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

a {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #4CAF50;
    text-decoration: none;
    font-size: 16px;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h1>Submit Review for Order #<?php echo htmlspecialchars($orderId); ?></h1>

    <form method="post">
        <label for="review">Review:</label>
        <textarea name="review" id="review" required></textarea>
        <br>
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required>
        <br>
        <button type="submit">Submit Review</button>
    </form>

    <a href="order_history.php">Back to Order History</a>
</body>
</html>
