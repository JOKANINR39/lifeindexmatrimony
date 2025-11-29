<?php
session_start();
include("db.php");

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

include("header.php");

// Check if ID is passed
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo "<p style='text-align:center; margin-top:50px;'>Invalid profile ID.</p>";
  exit();
}

$profile_id = intval($_GET['id']);

// ✅ Fetch profile only if approved (except the owner viewing their own profile)
$query = "SELECT * FROM users WHERE id = $profile_id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
  echo "<p style='text-align:center; margin-top:50px;'>Profile not found.</p>";
  exit();
}

$row = $result->fetch_assoc();

// ✅ Restrict viewing if not approved and not the profile owner
if ($row['status'] !== 'approved' && $_SESSION['user_id'] != $row['id']) {
  echo "<p style='text-align:center; margin-top:50px; color:red;'>This profile is not yet approved by the admin.</p>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($row['fullname']); ?> - Profile Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f9f7fe 0%, #f0e6ff 100%);
      margin: 0;
      padding: 0;
      color: #333;
    }

    .profile-container {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
    }

    .profile-image {
      flex: 1 1 300px;
      background: #f0f0ff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-right: 3px solid #f0e6ff;
    }

    .profile-details {
      flex: 2 1 500px;
      padding: 30px 40px;
    }

    h2 {
      font-family: 'Playfair Display', serif;
      color: #4b0082;
      margin-bottom: 15px;
    }

    .info {
      margin-bottom: 12px;
      font-size: 16px;
      color: #555;
    }

    .info i {
      color: #8a2be2;
      margin-right: 10px;
      width: 20px;
    }

    .action-buttons {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .btn {
      padding: 12px 20px;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    .btn-interest {
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
    }

    .btn-interest:hover {
      background: linear-gradient(to right, #7a1bd2, #3a0072);
    }

    .btn-back {
      background: #f8f6ff;
      color: #8a2be2;
      border: 1px solid #e0d6ff;
    }

    .btn-back:hover {
      background: #8a2be2;
      color: white;
    }

    .btn-download {
      background: #f0e6ff;
      color: #4b0082;
      border: 1px solid #d2b8ff;
    }

    .btn-download:hover {
      background: #8a2be2;
      color: white;
    }

    /* Floating Home Button */
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
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-decoration: none;
      transition: transform 0.3s, box-shadow 0.3s;
      z-index: 1000;
    }

    .home-icon:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(138,43,226,0.5);
    }

    @media (max-width: 768px) {
      .profile-container {
        flex-direction: column;
      }

      .profile-image img {
        border-right: none;
        border-bottom: 3px solid #f0e6ff;
      }

      .profile-details {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Floating Home Icon -->
  <a href="home.php" class="home-icon" title="Go to Home">
    <i class="fas fa-home"></i>
  </a>

  <div class="profile-container">
    <div class="profile-image">
      <img src="<?php echo !empty($row['photo']) ? htmlspecialchars($row['photo']) : 'https://via.placeholder.com/300x300?text=No+Image'; ?>" alt="Profile Photo">
    </div>
    <div class="profile-details">
      <h2><?php echo htmlspecialchars($row['fullname']); ?></h2>
      <p class="info"><i class="fas fa-birthday-cake"></i> Age: <?php echo htmlspecialchars($row['age']); ?></p>
      <p class="info"><i class="fas fa-venus-mars"></i> Gender: <?php echo htmlspecialchars($row['gender']); ?></p>
      <p class="info"><i class="fas fa-map-marker-alt"></i> Location: <?php echo htmlspecialchars($row['place']); ?></p>
      <p class="info"><i class="fas fa-briefcase"></i> Occupation: <?php echo htmlspecialchars($row['occupation']); ?></p>
      <p class="info"><i class="fas fa-phone"></i> Phone: <?php echo htmlspecialchars($row['phone']); ?></p>
      <p class="info"><i class="fas fa-envelope"></i> Email: <?php echo htmlspecialchars($row['email']); ?></p>

      <div class="action-buttons">
        <button class="btn btn-interest" onclick="expressInterest(<?php echo $row['id']; ?>)">
          <i class="fas fa-heart"></i> Express Interest
        </button>
        <a href="home.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Home</a>
        <?php if (!empty($row['jathagam'])): ?>
          <a href="<?php echo htmlspecialchars($row['jathagam']); ?>" download class="btn btn-download">
            <i class="fas fa-download"></i> Download Jathagam
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
    function expressInterest(userId) {
      alert("Interest expressed for profile " + userId);
      // Add AJAX request here later if needed
    }
  </script>

</body>
</html>

<?php include("footer.php"); ?>
