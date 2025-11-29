<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile - LifeIndex Matrimonial</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f9f7fe 0%, #f0e6ff 100%);
      min-height: 100vh;
      color: #333;
      padding: 20px;
    }

    .profile-container {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
      background: linear-gradient(135deg, #8a2be2, #4b0082);
      color: white;
      padding: 25px 35px;
    }

    .profile-header h1 {
      font-family: 'Playfair Display', serif;
      margin-bottom: 8px;
    }

    .profile-content {
      padding: 40px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    input, select {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      background-color: #f9f9f9;
      transition: all 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    input:focus, select:focus {
      outline: none;
      border-color: #8a2be2;
      background-color: white;
      box-shadow: 0 0 0 3px rgba(138, 43, 226, 0.1);
    }

    input[readonly] {
      background-color: #f0f0f0;
      color: #666;
      cursor: not-allowed;
    }

    .btn-update {
      padding: 14px 35px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-update:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(138, 43, 226, 0.3);
    }

    .btn-cancel {
      padding: 14px 30px;
      background: #f5f5f5;
      color: #555;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      margin-left: 15px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-cancel:hover {
      background: #e0e0e0;
      transform: translateY(-2px);
    }

    .form-actions {
      text-align: center;
      margin-top: 20px;
    }

    .home-icon {
      position: fixed;
      top: 25px;
      right: 25px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border-radius: 50%;
      width: 55px;
      height: 55px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      text-decoration: none;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .home-icon:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(138,43,226,0.4);
    }
  </style>
</head>
<body>

  <!-- Floating Home Icon -->
  <a href="home.php" class="home-icon" title="Go to Home">
    <i class="fas fa-home"></i>
  </a>

  <div class="profile-container">
    <div class="profile-header">
      <h1><i class="fas fa-user-edit"></i> Edit Profile</h1>
      <p>Only occupation, work location, and place can be updated.</p>
    </div>

    <div class="profile-content">
      <form action="update_profile.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <div class="form-group">
          <label>Full Name</label>
          <input type="text" value="<?php echo htmlspecialchars($user['fullname']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Father's Name</label>
          <input type="text" value="<?php echo htmlspecialchars($user['fathername']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Mother's Name</label>
          <input type="text" value="<?php echo htmlspecialchars($user['mothername']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Age</label>
          <input type="text" value="<?php echo htmlspecialchars($user['age']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Date of Birth</label>
          <input type="text" value="<?php echo htmlspecialchars($user['dob']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
        </div>

        <div class="form-group">
          <label>Gender</label>
          <input type="text" value="<?php echo htmlspecialchars($user['gender']); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="place">Place</label>
          <input type="text" id="place" name="place" value="<?php echo htmlspecialchars($user['place']); ?>" required>
        </div>

        <div class="form-group">
          <label for="occupation">Occupation / Job</label>
          <input type="text" id="occupation" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>" required>
        </div>

        <div class="form-group">
          <label for="work_location">Working Location</label>
          <input type="text" id="work_location" name="work_location" value="<?php echo htmlspecialchars($user['work_location']); ?>" required>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-update"><i class="fas fa-save"></i> Update</button>
          <a href="profile.php" class="btn-cancel"><i class="fas fa-times"></i> Cancel</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

<?php include("footer.php"); ?>
