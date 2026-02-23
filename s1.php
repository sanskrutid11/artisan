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
    // Retrieve order details including the date
    $orderResult = $conn->query("SELECT * FROM orders WHERE id = $orderId");
    if ($orderResult->num_rows > 0) {
        $order = $orderResult->fetch_assoc();
    } else {
        die("Order not found.");
    }

    // Retrieve product details
    $productResult = $conn->query("SELECT * FROM order_products WHERE order_id = $orderId");
    if (!$productResult) {
        die("Error retrieving product details: " . $conn->error);
    }

    $grandTotal = $order['grand_total'];
    
} else {
    die("Invalid order ID.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Summary</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .receipt {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .receipt h1 {
        margin: 0;
        font-size: 24px;
        color: #333;
        text-align: center;
    }
    .receipt p {
        margin: 5px 0;
    }
    .items {
        margin-top: 20px;
    }
    .items table {
        width: 100%;
        border-collapse: collapse;
    }
    .items table th, .items table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .items table th {
        background-color: #f4f4f4;
    }
    .totals {
        margin-top: 20px;
    }
    .totals p {
        margin: 5px 0;
        font-weight: bold;
    }
    .footer {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
    .product-image {
        width: 100px; /* Adjust size as needed */
        height: auto;
    }
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.receipt {
    max-width: 900px;
    margin: 30px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.receipt h1 {
    margin: 0;
    font-size: 28px;
    color: #333;
    text-align: center;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.receipt p {
    margin: 10px 0;
    font-size: 16px;
    line-height: 1.6;
}

.items {
    margin-top: 30px;
}

.items table {
    width: 100%;
    border-collapse: collapse;
}

.items table th, .items table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
    font-size: 16px;
}

.items table th {
    background-color: #007bff;
    color: #ffffff;
}

.items table td {
    background-color: #f9f9f9;
}

.items table tr:nth-child(even) td {
    background-color: #f1f1f1;
}

.totals {
    margin-top: 30px;
    padding-top: 10px;
    border-top: 1px solid #ddd;
}

.totals p {
    margin: 10px 0;
    font-weight: bold;
    font-size: 16px;
}

.footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 15px;
    border-top: 1px solid #ddd;
}

.btn {
    background-color: #007bff;
    border: none;
    color: #ffffff;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

.product-image {
    width: 120px; /* Adjust size as needed */
    height: auto;
    border-radius: 8px;
}

  </style>
</head>
<body>
    <div class="receipt">
        <h1>Order Summary</h1>

        <div class="items">
            <h4>Product Details:</h4>
            <table>
                <thead>
                    <tr>
                       
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = $productResult->fetch_assoc()): ?>
                        <tr>
                           
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($product['total']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="totals">
            <h4>Customer Information:</h4>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($order['first_name']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($order['mobile']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
            <p><strong>Order Notes:</strong> <?php echo htmlspecialchars($order['order_notes']); ?></p>
            <p><strong>Shipping:</strong> Rs <?php echo htmlspecialchars($order['shipping']); ?></p>
            <p><strong>Grand Total:</strong> Rs <?php echo htmlspecialchars($grandTotal); ?></p>
        </div>

        <div class="footer">
            <form action="index.php" method="post">
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
