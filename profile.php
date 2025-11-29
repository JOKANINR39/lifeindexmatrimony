<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}
include("header.php");

$id = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - LifeIndex Matrimonial</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f9f7fe 0%, #f0e6ff 100%);
      min-height: 100vh;
      color: #333;
    }

    .container {
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
    }

    .profile-header {
      background: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
      color: white;
      padding: 40px;
      border-radius: 20px 20px 0 0;
      position: relative;
      overflow: hidden;
    }

    .profile-header::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .profile-header::after {
      content: '';
      position: absolute;
      bottom: -80px;
      left: -80px;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .profile-title {
      font-family: 'Playfair Display', serif;
      font-size: 32px;
      margin-bottom: 10px;
      position: relative;
      z-index: 2;
    }

    .profile-subtitle {
      font-size: 16px;
      opacity: 0.9;
      position: relative;
      z-index: 2;
    }

    .profile-content {
      background: white;
      border-radius: 0 0 20px 20px;
      padding: 40px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 40px;
    }

    .profile-sidebar {
      text-align: center;
    }

    .profile-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid #f0e6ff;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      margin-bottom: 25px;
    }

    .profile-name {
      font-family: 'Playfair Display', serif;
      font-size: 24px;
      color: #4b0082;
      margin-bottom: 10px;
    }

    .profile-age {
      color: #666;
      font-size: 16px;
      margin-bottom: 5px;
    }

    .profile-location {
      color: #888;
      font-size: 14px;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
    }

    .profile-occupation {
      background: #f8f6ff;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 25px;
    }

    .occupation-icon {
      font-size: 20px;
      color: #8a2be2;
      margin-bottom: 8px;
    }

    .occupation-text {
      font-size: 14px;
      color: #666;
    }

    .btn-edit {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 25px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      text-decoration: none;
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(138, 43, 226, 0.3);
    }

    .btn-edit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(138, 43, 226, 0.4);
    }

    .profile-details {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
    }

    .detail-section {
      margin-bottom: 10px;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      color: #4b0082;
      margin-bottom: 20px;
      padding-bottom: 8px;
      border-bottom: 2px solid #f0e6ff;
    }

    .detail-group {
      margin-bottom: 18px;
    }

    .detail-label {
      font-weight: 500;
      color: #555;
      font-size: 14px;
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .detail-label i {
      color: #8a2be2;
      width: 16px;
    }

    .detail-value {
      color: #333;
      font-size: 15px;
      padding-left: 24px;
    }

    .jathagam-section {
      grid-column: 1 / -1;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 2px solid #f0e6ff;
    }

    .jathagam-image {
      max-width: 300px;
      border-radius: 10px;
      border: 2px solid #f0e6ff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      margin-top: 10px;
    }

    .no-jathagam {
      color: #888;
      font-style: italic;
      font-size: 14px;
    }

    .profile-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-top: 30px;
      padding-top: 30px;
      border-top: 2px solid #f0e6ff;
    }

    .stat-item {
      text-align: center;
      padding: 20px;
      background: #f8f6ff;
      border-radius: 10px;
    }

    .stat-number {
      font-size: 24px;
      font-weight: 600;
      color: #4b0082;
      margin-bottom: 5px;
    }

    .stat-label {
      font-size: 12px;
      color: #666;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
      .profile-content {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 30px;
      }

      .profile-details {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .profile-stats {
        grid-template-columns: repeat(2, 1fr);
      }

      .profile-header {
        padding: 30px 25px;
      }

      .profile-image {
        width: 150px;
        height: 150px;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 15px;
        margin: 15px auto;
      }

      .profile-header, .profile-content {
        padding: 25px 20px;
      }

      .profile-title {
        font-size: 26px;
      }

      .profile-stats {
        grid-template-columns: 1fr;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="profile-header">
      <h1 class="profile-title">My Profile</h1>
      <p class="profile-subtitle">View and manage your profile information</p>
    </div>
    
    <div class="profile-content">
      <div class="profile-sidebar">
        <img src="<?php echo htmlspecialchars($row['photo']); ?>" 
             alt="Profile Photo" 
             class="profile-image"
             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjBmNWZmIi8+CjxjaXJjbGUgY3g9IjEwMCIgY3k9IjgwIiByPSI0MCIgZmlsbD0iIzhBMkJFMiIvPjxjaXJjbGUgY3g9IjEwMCIgY3k9IjE4MCIgcj0iNjAiIGZpbGw9IiM4QTJCRTIiLz4KPC9zdmc+'">
        
        <h2 class="profile-name"><?php echo htmlspecialchars($row['fullname']); ?></h2>
        <div class="profile-age"><?php echo htmlspecialchars($row['age']); ?> years</div>
        <div class="profile-location">
          <i class="fas fa-map-marker-alt"></i>
          <?php echo htmlspecialchars($row['place']); ?>
        </div>
        
        <?php if (!empty($row['occupation'])): ?>
        <div class="profile-occupation">
          <div class="occupation-icon">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="occupation-text"><?php echo htmlspecialchars($row['occupation']); ?></div>
          <?php if (!empty($row['work_location'])): ?>
          <div class="occupation-text" style="font-size: 12px; margin-top: 5px;">
            <i class="fas fa-building"></i> <?php echo htmlspecialchars($row['work_location']); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <a href="edit_profile.php" class="btn-edit">
          <i class="fas fa-edit"></i> Edit Profile
        </a>
      </div>
      
      <div class="profile-details">
        <div class="detail-section">
          <h3 class="section-title">Personal Information</h3>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-user"></i> Full Name
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['fullname']); ?></div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-male"></i> Father's Name
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['fathername']); ?></div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-female"></i> Mother's Name
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['mothername']); ?></div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-birthday-cake"></i> Age
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['age']); ?> years</div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-calendar-alt"></i> Date of Birth
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['dob']); ?></div>
          </div>
        </div>
        
        <div class="detail-section">
          <h3 class="section-title">Contact & Professional</h3>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-envelope"></i> Email
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['email']); ?></div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-phone"></i> Phone
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['phone']); ?></div>
          </div>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-map-marker-alt"></i> Place
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['place']); ?></div>
          </div>
          
          <?php if (!empty($row['occupation'])): ?>
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-briefcase"></i> Occupation
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['occupation']); ?></div>
          </div>
          <?php endif; ?>
          
          <?php if (!empty($row['work_location'])): ?>
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-building"></i> Work Location
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['work_location']); ?></div>
          </div>
          <?php endif; ?>
          
          <?php if (!empty($row['searching_for'])): ?>
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-search"></i> Searching For
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['searching_for']); ?></div>
          </div>
          <?php endif; ?>
        </div>
        
        <div class="detail-section">
          <h3 class="section-title">Astrological Details</h3>
          
          <?php if (!empty($row['star'])): ?>
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-star"></i> Star
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['star']); ?></div>
          </div>
          <?php endif; ?>
          
          <?php if (!empty($row['zodiac'])): ?>
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-moon"></i> Zodiac
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['zodiac']); ?></div>
          </div>
          <?php endif; ?>
          
          <div class="detail-group">
            <div class="detail-label">
              <i class="fas fa-venus-mars"></i> Gender
            </div>
            <div class="detail-value"><?php echo htmlspecialchars($row['gender']); ?></div>
          </div>
        </div>
        
        <?php if (!empty($row['jathagam'])): ?>
        <div class="jathagam-section">
          <h3 class="section-title">Jathagam Document</h3>
          <img src="<?php echo htmlspecialchars($row['jathagam']); ?>" 
               alt="Jathagam" 
               class="jathagam-image"
               onerror="this.style.display='none'">
        </div>
        <?php endif; ?>
      </div>
    </div>
    
    <div class="profile-stats">
      <div class="stat-item">
        <div class="stat-number">12</div>
        <div class="stat-label">Profile Views</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">5</div>
        <div class="stat-label">Interests Received</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">3</div>
        <div class="stat-label">Matches Found</div>
      </div>
    </div>
  </div>

  <script>
    // Add animation to profile elements
    document.addEventListener('DOMContentLoaded', function() {
      const profileImage = document.querySelector('.profile-image');
      const detailGroups = document.querySelectorAll('.detail-group');
      const statItems = document.querySelectorAll('.stat-item');
      
      // Animate profile image
      profileImage.style.opacity = '0';
      profileImage.style.transform = 'scale(0.8)';
      
      setTimeout(() => {
        profileImage.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        profileImage.style.opacity = '1';
        profileImage.style.transform = 'scale(1)';
      }, 200);
      
      // Animate detail groups
      detailGroups.forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateX(20px)';
        
        setTimeout(() => {
          group.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          group.style.opacity = '1';
          group.style.transform = 'translateX(0)';
        }, 300 + (index * 100));
      });
      
      // Animate stat items
      statItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          item.style.opacity = '1';
          item.style.transform = 'translateY(0)';
        }, 800 + (index * 200));
      });
    });
  </script>
</body>
</html>
<?php include("footer.php"); ?>