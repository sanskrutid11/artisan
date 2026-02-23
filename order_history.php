<?php
session_start();

// Check if the user is logged in
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

// Retrieve user's orders
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM orders WHERE first_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$orderResult = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table td {
            background-color: #f9f9f9;
        }
        .product-details {
            display: flex;
            align-items: center;
        }
        .product-details img {
            width: 80px;
            height: 80px;
            margin-right: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
        }
    </style>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table td {
            background-color: #f9f9f9;
        }
        .product-details {
            display: flex;
            align-items: center;
        }
        .product-details img {
            width: 80px;
            height: 80px;
            margin-right: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .btn {
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn:hover {
            background-color: green;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
        }
        body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1300px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    font-size: 32px;
    margin-bottom: 40px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    vertical-align: middle;
}

table th {
    background-color: #007bff;
    color: #ffffff;
    font-size: 18px;
}

table td {
    background-color: #fafafa;
    font-size: 16px;
}

.product-details {
    display: flex;
    align-items: center;
}

.product-details img {
    width: 60px;
    height: 60px;
    margin-right: 15px;
    border-radius: 5px;
    border: 1px solid #ddd;
    object-fit: cover;
}

.order-total {
    color: #007bff;
    font-weight: bold;
    font-size: 18px;
}

.btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: inline-block;
}

.btn:hover {
    background-color: #0056b3;
}

.logout {
    text-align: center;
    margin-top: 20px;
}

.logout .btn {
    background-color:blue;
}

.logout .btn:hover {
    background-color: #cc0000;
}

@media (max-width: 768px) {
    table, .btn, .product-details {
        font-size: 14px;
    }

    .product-details img {
        width: 50px;
        height: 50px;
    }

    h1 {
        font-size: 26px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>My Orders</h1>

        <?php if ($orderResult && $orderResult->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Order Notes</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $orderResult->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td>
                                <?php
                                // Retrieve product details for each order
                                $order_id = $order['id'];
                                $productStmt = $conn->prepare("SELECT product_name, quantity FROM order_products WHERE order_id = ?");
                                $productStmt->bind_param("i", $order_id);
                                $productStmt->execute();
                                $productResult = $productStmt->get_result();

                                if ($productResult && $productResult->num_rows > 0) {
                                    while ($product = $productResult->fetch_assoc()) {
                                        echo '<div class="product-details">';
                                        echo '<span>' . htmlspecialchars($product['product_name']) . '</span>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'No products found.';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                // Display the quantity in a separate column
                                if ($productResult && $productResult->num_rows > 0) {
                                    $productResult->data_seek(0); // Reset pointer to start of result set
                                    while ($product = $productResult->fetch_assoc()) {
                                        echo '<div class="product-details">';
                                        echo '<span>' . htmlspecialchars($product['quantity']) . '</span>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_notes']); ?></td>
                            <td>Rs <?php echo htmlspecialchars($order['grand_total']); ?></td>
                            <td>
                                <a href="submit_review.php?order_id=<?php echo $order['id']; ?>" class="btn">Submit Review</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no orders.</p>
        <?php endif; ?>

        <div class="logout">
            <a href="index.php" class="btn">Back</a>
        </div>
    </div>

    <?php
    $conn->close();
    ?>
</body>


</html>
