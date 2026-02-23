<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials (Replace this with your actual validation logic)
    if ($username === 'admin' && $password === 'adminpass') {
        $_SESSION['admin'] = true;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!-- HTML Form for Admin Login -->
<form method="post" action="admin_login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

Admin Dashboard (admin_dashboard.php):

php

<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!-- HTML structure for Admin Dashboard -->
<h1>Welcome to the Admin Dashboard</h1>
<ul>
    <li><a href="add_medicine.php">Add Medicine</a></li>
    <li><a href="manage_orders.php">Manage Orders</a></li>
    <!-- Add more links for other functionalities -->
</ul>