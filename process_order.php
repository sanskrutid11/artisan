<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "artisian");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        echo "<script>
                alert('Please login before making a purchase');
                window.location.href='login.php'; // Adjust the login page URL
              </script>";
        exit();
    }

    // Extract and sanitize purchase details from the form
    $name = $_POST['name'] ?? '';
    $phno = $_POST['phno'] ?? '';
    $addr = $_POST['addr'] ?? '';
    $email = $_POST['email'] ?? '';
    $orderNotes = $_POST['order_notes'] ?? '';
    $shipping = isset($_POST['shipping']) ? (float)$_POST['shipping'] : 0; // Convert to float
    $paymode = $_POST['paymode'] ?? 'COD';

    // Calculate grand total
    $grandTotal = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $value) {
            $price = (float)$value['price']; // Ensure price is a float
            $quantity = (int)$value['quantity']; // Ensure quantity is an integer
            $grandTotal += $quantity * $price;
        }
    }
    $grandTotal += $shipping; // Add shipping cost

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert into orders table
        $stmt1 = $conn->prepare("INSERT INTO orders (first_name, address, mobile, email, order_notes, shipping, grand_total) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("ssssssd", $name, $addr, $phno, $email, $orderNotes, $shipping, $grandTotal);
        if (!$stmt1->execute()) {
            throw new Exception($stmt1->error);
        }
        $orderId = $stmt1->insert_id;
        $stmt1->close();

        // Insert into order_products table
        if (isset($_SESSION['cart'])) {
            $stmt2 = $conn->prepare("INSERT INTO order_products (order_id, product_name, price, quantity, total) VALUES (?, ?, ?, ?, ?)");
            foreach ($_SESSION['cart'] as $value) {
                $productTotal = (float)$value['quantity'] * (float)$value['price'];
                $stmt2->bind_param("isddd", $orderId, $value['med'], $value['price'], $value['quantity'], $productTotal);
                if (!$stmt2->execute()) {
                    throw new Exception($stmt2->error);
                }
            }
            $stmt2->close();
        }

        // Commit the transaction
        $conn->commit();

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to the bill page
        echo "<script>
                alert('Order placed successfully');
                window.location.href='summary.php?order_id=$orderId';
              </script>";

    } catch (Exception $e) {
        // Rollback the transaction
        $conn->rollback();
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href='cart.php';
              </script>";
    }

    $conn->close();
} else {
    // Invalid purchase request
    echo "<script>
            alert('Invalid purchase request');
            window.location.href='cart.php';
          </script>";
}
?>
