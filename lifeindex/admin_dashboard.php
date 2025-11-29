<?php
session_start();
include("db.php");

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}

if (isset($_GET['approve'])) {
  $id = intval($_GET['approve']);
  $conn->query("UPDATE users SET status='approved' WHERE id=$id");
  header("Location: admin_dashboard.php");
  exit();
}

$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9ff;
      padding: 20px;
    }
    h1 {
      color: #4b0082;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    th {
      background: #4b0082;
      color: white;
    }
    tr:hover {
      background: #f2e6ff;
    }
    .approve-btn {
      background: #28a745;
      color: white;
      padding: 6px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .approve-btn:hover {
      background: #218838;
    }
    .logout {
      float: right;
      background: #ff6b6b;
      color: white;
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>Admin Dashboard</h1>
  <a href="logout.php" class="logout">Logout</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['fullname']); ?></td>
      <td><?php echo htmlspecialchars($row['email']); ?></td>
      <td><?php echo htmlspecialchars($row['phone']); ?></td>
      <td><?php echo ucfirst($row['status']); ?></td>
      <td>
        <?php if ($row['status'] == 'pending'): ?>
          <a href="?approve=<?php echo $row['id']; ?>" class="approve-btn">Approve</a>
        <?php else: ?>
          ✅ Approved
        <?php endif; ?>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
