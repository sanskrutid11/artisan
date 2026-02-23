<?php
// Database connection
$host = 'localhost';
$dbname = 'artisian';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
    exit;
}

// Fetch reviews
$sql = "SELECT id, product_id, user_name, review_text, rating, created_at FROM review ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($reviews);
