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

    // Retrieve product details
    $stmt = $conn->prepare("SELECT * FROM order_products WHERE order_id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $productResult = $stmt->get_result();

    if (!$productResult) {
        die("Error retrieving product details: " . $conn->error);
    }

    $grandTotal = $order['grand_total'];
    
} else {
    die("Invalid order ID.");
}

$conn->close();
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
            background-color: #f9f9f9;
        }

        .receipt {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            position: relative;
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

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .header .bill-to, .header .tax-info {
            width: 48%;
        }

        .header .tax-info {
            text-align: right;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            color: #007bff;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
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

        .totals, .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .totals p, .footer p {
            margin: 5px 0;
            font-weight: bold;
            font-size: 16px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
          body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .receipt {
        max-width: 900px;
        margin: 30px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
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
    .header, .date-section {
        margin-bottom: 20px;
    }
    .header h2 {
        margin: 0;
        font-size: 20px;
        color: #007bff;
    }
    .header .info {
        margin-top: 10px;
    }
    .header .info p {
        margin: 5px 0;
    }
    .date-section {
        text-align: right;
    }
    .date-section .date-info {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
    .date-section .date-info div {
        text-align: left;
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
    .totals, .footer {
        margin-top: 30px;
        padding-top: 10px;
        border-top: 1px solid #ddd;
        text-align: left;
    }
    .totals p, .footer p {
        margin: 5px 0;
        font-weight: bold;
        font-size: 16px;
    }
    .footer {
        text-align: left;
        margin-top: 30px;
        padding-top: 15px;
        border-top: 1px solid #ddd;
    }
    .footer p {
        margin: 5px 0;
        font-size: 12px;
    }
    .footer .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
    }
    .footer .btn:hover {
        background-color: #0056b3;
    }
    .break-line {
    border: 0;
    border-top: 1px solid black; /* Green color for the break line */
    margin: 10px 0; /* Adjust margin as needed */
}

    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <div class="bill-to">
                <h2>BILL TO:</h2>
                <?php if (isset($order)): ?>
                    <p><?php echo htmlspecialchars($order['first_name']); ?></p>
                    <p><?php echo htmlspecialchars($order['address']); ?></p>
                    <p><?php echo htmlspecialchars($order['mobile']); ?></p>
                    <p><?php echo htmlspecialchars($order['email']); ?></p>
                    <p>Place of Supply: 27 Maharashtra</p>
                <?php else: ?>
                    <p>Order details not available.</p>
                <?php endif; ?>
            </div>
            <div class="tax-info">
                <p><strong>Payment Invoice</strong></p>
                <p><strong>Original For Recipient</strong></p>
                
                <p><strong>Invoice Number:</strong> nh4cf2487818</p>
            </div>
        </div>
<hr class="break-line">  
<div class="date-section">
            <?php if (isset($order)): ?>
                <p><strong>Order Number:</strong> <div><?php echo htmlspecialchars($order['id']); ?></div></p>
                <p><strong>Order Date:</strong> 
                    <div><?php echo isset($order['created_at']) ? date('d-m-Y H:i:s', strtotime($order['created_at'])) : 'N/A'; ?></div></p>
            <?php else: ?>
                <p>Order and invoice dates not available.</p>
            <?php endif; ?>
        </div>

        <div class="header">
            <div class="ship-to">
            <h2>SHIP TO:</h2>

            <?php if (isset($order)): ?>

                <p><?php echo htmlspecialchars($order['first_name']); ?></p>
                <p><?php echo htmlspecialchars($order['address']); ?></p>
                <p><?php echo htmlspecialchars($order['mobile']); ?></p>
                <p><?php echo htmlspecialchars($order['email']); ?></p>
                
            <?php else: ?>
                <p>Shipping details not available.</p>
            <?php endif; ?>
        </div>
</div>
     <hr class="break-line">  
       <div class="items">
            <h4>Product Details:</h4>
            <?php if (isset($productResult) && $productResult->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Description</th>
                            <th>Qty.</th>
                            <th>Gross Amount</th>
                            <th>Shipping Price</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1; ?>
                        <?php $totalShipping = 0; ?>
                        <?php while ($product = $productResult->fetch_assoc()): ?>
                            <?php $shippingPrice = 0; /* Fetch or calculate shipping price if needed */ ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']); ?></td>
                                <td><?php echo htmlspecialchars($order['shipping']); ?></td>
                                
                            </tr>
                            <?php $totalShipping += $shippingPrice; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No product details available.</p>
            <?php endif; ?>
        </div>

        <!-- Totals -->
        <div class="totals">
            <h4>Grand Total:</h4>
            <?php if (isset($order)): ?>
                <table class="total-table">
                    
                    <tr>
                      
                        <td>Rs <?php echo htmlspecialchars($grandTotal); ?></td>
                    </tr>
                </table>
            <?php else: ?>
                <p>Total details not available.</p>
            <?php endif; ?>
        </div>

        <div class="footer">
            <hr class="break-line">
            <p><b>Terms & Conditions:</b></p>
            <p>Sold by: Artisian Marketplace</p>
            <p>Artisian Marketplace, PLOT NO-55 GROUND FLOOR HARIOM INDUSTRIAL ESTATE  Rahuri, Maharashtra 395010, 24EWQPP4712J1Z3</p>
            <p>This is a computer generated invoice and does not require signature</p>
            <hr class="break-line">
            <a href="order_history.php" class="btn">Submit Review</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>

    </div>
</body>
</html>

