<?php
require_once 'connection.php';

// Start the session (if not already started)
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $fetchedUsername, $hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        // Passwords match, set the username in the session
        $_SESSION['username'] = $fetchedUsername;
        // Redirect to dashboard or home page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
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
        <h1>LOGIN </h1>
        <p class="Form__Legend">Please enter your username and password:</p>
    </center>

    <div class="container">
        <form action="login.php" method="post">
            <label for="username"></label>
            <input type="text" placeholder="Username" name="username" required>
            <br>
            <label for="password"></label>
            <input type="password" placeholder="Password" name="password" required>
            <br>
            <button type="submit">Login</button>
            <div><center>
                <a href="regis.php">Don't have an account?Create one</a></center>
            </div>
        </form>
    </div>
</body>
</html>
