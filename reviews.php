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

// Retrieve user's reviews
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM review WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$reviewResult = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2><center>My Reviews</center></h2>

    <?php if ($reviewResult->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Review Text</th>
                    <th>Rating</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $reviewResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['review_text']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reviews found.</p>
    <?php endif; ?>

    <!-- Back Button -->
    <button onclick="history.back()">Back</button>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
