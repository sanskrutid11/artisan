<?php
session_start();
include('db_connect.php'); // Include your database connection file

// Assuming you store user ID in session
$user_id = $_SESSION['user_id'];

// Fetch user data
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Fetch orders
$orders_query = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY order_date DESC";
$orders_result = mysqli_query($conn, $orders_query);

// Fetch cart products
$cart_query = "SELECT * FROM cart WHERE user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);

// Fetch reviews
$reviews_query = "SELECT * FROM reviews WHERE user_id = $user_id";
$reviews_result = mysqli_query($conn, $reviews_query);
?>

<div class="container mt-5">
    <h2>My Account</h2>
    <hr>

    <!-- Display User Information -->
    <h3>Personal Information</h3>
    <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Address:</strong> <?php echo $user['address']; ?></p>

    <!-- Display Order History -->
    <h3>Order History</h3>
    <ul>
        <?php while ($order = mysqli_fetch_assoc($orders_result)) { ?>
            <li>
                <strong>Order ID:</strong> <?php echo $order['id']; ?> - 
                <strong>Date:</strong> <?php echo $order['order_date']; ?> - 
                <strong>Total:</strong> <?php echo $order['total_amount']; ?>
            </li>
        <?php } ?>
    </ul>

    <!-- Display Cart Products -->
    <h3>Cart Products</h3>
    <ul>
        <?php while ($cart_item = mysqli_fetch_assoc($cart_result)) { ?>
            <li><?php echo $cart_item['product_name']; ?> - Quantity: <?php echo $cart_item['quantity']; ?></li>
        <?php } ?>
    </ul>

    <!-- Display Reviews -->
    <h3>My Reviews</h3>
    <ul>
        <?php while ($review = mysqli_fetch_assoc($reviews_result)) { ?>
            <li>
                <strong>Product:</strong> <?php echo $review['product_name']; ?> - 
                <strong>Rating:</strong> <?php echo $review['rating']; ?> - 
                <strong>Review:</strong> <?php echo $review['review_text']; ?>
            </li>
        <?php } ?>
    </ul>
</div>
