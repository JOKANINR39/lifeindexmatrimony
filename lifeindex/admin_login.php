<?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $admin_user = "admin";
  $admin_pass = "admin123";

  $user = $_POST['username'];
  $pass = $_POST['password'];

  if ($user == $admin_user && $pass == $admin_pass) {
    $_SESSION['admin'] = $user;
    header("Location: admin_dashboard.php");
    exit();
  } else {
    $error = "Invalid credentials!";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #4b0082, #2d004d);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: rgba(255,255,255,0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255,255,255,0.2);
    }
    input {
      display: block;
      width: 250px;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: none;
    }
    button {
      background: #ff6b6b;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #ff4040;
    }
    .error { color: #ff6b6b; font-size: 14px; }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Admin Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    </form>
  </div>
</body>
</html>
