<?php
session_start();

// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page with a logout message
header("Location: login.php?logout=1");
exit();
?>
