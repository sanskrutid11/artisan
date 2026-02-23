<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artisian";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if the session variable is set
if (!isset($_SESSION['id'])) {
    echo "Session variable 'user_id' is not set.";
    $userId = 1; // Use a valid user ID or remove filtering temporarily
} else {
    $userId = $_SESSION['id'];
}

// Query to fetch all orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($conn->error) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0): ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>My Orders</title>
            <link rel="stylesheet" href="path/to/bootstrap.min.css"> <!-- Replace with your CSS path -->
        </head>
        <body>
            <div class="container mt-5">
                <h2>My Orders</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>First Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Order Notes</th>
                            <th>Grand Total</th>
                            <th>Created At</th>
                            <th>Shipping</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['order_notes']); ?></td>
                                <td><?php echo htmlspecialchars($row['grand_total']); ?></td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                <td><?php echo htmlspecialchars($row['shipping']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <script src="path/to/bootstrap.bundle.min.js"></script> <!-- Replace with your JS path -->
        </body>
        </html>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif;
}

$conn->close();
?>
