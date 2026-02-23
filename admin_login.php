<?
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Validate the username and password against your admin credentials
    // For simplicity, you may hardcode them or check against a database
    if ($username === 'admin' && $password === 'adminpassword') {
        $_SESSION['admin'] = true;
        header('Location: adminindex.php');
        exit();
    } else {
        $error = "Invalid login credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
      padding: 10px 15px;
      margin: 10px 0px;
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
      background-color: lightyellow;
    }
  </style>
</head>
<body>
<center><h1>Admin Login</h1></center>
  <div class="container">
    
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
   <form method="post" action="adminindex.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="login">Login</button>
</form>
</div>
</body>
</html>
