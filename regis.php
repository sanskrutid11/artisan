<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $username = htmlspecialchars($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $phno = htmlspecialchars($_POST["phno"]);
    $email = htmlspecialchars($_POST["email"]);
    $addr = htmlspecialchars($_POST["addr"]);

    // Check if username already exists
    $check_username_stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check_username_stmt->bind_param("s", $username);
    $check_username_stmt->execute();

    if ($check_username_stmt->fetch()) {
        echo "Error: Username already exists!";
        $check_username_stmt->close();
        exit();
    }

    $check_username_stmt->close();

    // Insert user into the database with hashed password
    $stmt = $conn->prepare("INSERT INTO users (username, password, phno, email, addr) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $phno, $email, $addr);

    if ($stmt->execute()) {
        // Registration successful
        $_SESSION['username'] = $username;
        $_SESSION['phno'] = $phno; // Store phone number in session
        $_SESSION['addr'] = $addr; // Store address in session
        header("location: login.php");
        exit();
    } else {
        echo "Error during registration: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
<style>
    body {
      font-family: arial, sans-serif;
      background-image: url('C:\xampp\htdocs\Project1\iStock-479304376 (1).jpg');
      background-size: cover;
      background-position: center;
    }

    button {
      background-color: orange;
      color: white;
      width: 500px;
      padding: 10px 15px;
      margin: 10px auto;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type=text], input[type=password] {
      width: 100%;
      margin: 8px 0;
      padding: 12px 20px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      margin: 10px 5px;
    }

    .container {
      width: 500px;
      margin: 10px auto;
      padding: 20px;
      background-color: white;
    }
  </style>
</head>
<body>
<center>
        <h1>REGISTER </h1>
        <p class="Form__Legend">Please fill in the information below:</p>
    </center>


<div class="container">
    <form action="regis.php" method="post">
        <label for="username"></label>
        <input type="text" placeholder="Username" name="username" required>
        <br>
        <label for="password"></label>
        <input type="password" placeholder="Password" name="password" required>
        <br>
        <label for="phno"></label>
        <input type="text" placeholder="Phone" name="phno" required>
        <br>
        <label for="email"></label>
        <input type="text" placeholder="Email" name="email" required>
        <br>
        <label for="addr"></label>
        <input type="text" placeholder="Address" name="addr" required>
        <br>
        <button type="submit">CREATE MY ACCOUNT</button>
       
        
    </form>
</div>
</body>
</html>
