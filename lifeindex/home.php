<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - LifeIndex Matrimonial</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
      max-width: 1200px;
      margin: 0 auto;
      padding: 30px 20px;
    }

    .welcome-section {
      text-align: center;
      margin-bottom: 40px;
      padding: 50px 30px;
      background: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
      border-radius: 20px;
      color: white;
      position: relative;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .welcome-section::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .welcome-section::after {
      content: '';
      position: absolute;
      bottom: -80px;
      left: -80px;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .welcome-section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 36px;
      margin-bottom: 15px;
      position: relative;
      z-index: 2;
    }

    .welcome-section p {
      font-size: 18px;
      opacity: 0.9;
      position: relative;
      z-index: 2;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .search-section {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      margin-bottom: 50px;
      position: relative;
      overflow: hidden;
    }

    .search-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
    }

    .search-title {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      color: #4b0082;
      margin-bottom: 25px;
      text-align: center;
    }

    .search-form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      align-items: end;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      font-weight: 500;
      margin-bottom: 10px;
      color: #555;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .search-form input {
      padding: 15px 20px;
      border: 2px solid #e0e0e0;
      border-radius: 12px;
      font-size: 15px;
      transition: all 0.3s;
      background-color: #fafafa;
      font-family: 'Poppins', sans-serif;
    }

    .search-form input:focus {
      outline: none;
      border-color: #8a2be2;
      background-color: white;
      box-shadow: 0 0 0 4px rgba(138, 43, 226, 0.1);
      transform: translateY(-2px);
    }

    .search-btn {
      padding: 15px 30px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(138, 43, 226, 0.3);
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .search-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(138, 43, 226, 0.4);
      background: linear-gradient(to right, #7a1bd2, #3a0072);
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 32px;
      color: #4b0082;
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -12px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      border-radius: 2px;
    }

    .profiles-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }

    .profile-card {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      position: relative;
      border: 1px solid #f0f0f0;
    }

    .profile-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .profile-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
    }

    .profile-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-bottom: 3px solid #f0e6ff;
      transition: transform 0.3s ease;
    }

    .profile-card:hover .profile-image {
      transform: scale(1.05);
    }

    .profile-content {
      padding: 25px;
    }

    .profile-name {
      font-family: 'Playfair Display', serif;
      font-size: 22px;
      color: #4b0082;
      margin-bottom: 12px;
      font-weight: 600;
    }

    .profile-details {
      color: #666;
      font-size: 14px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .profile-details i {
      color: #8a2be2;
      width: 16px;
    }

    .profile-occupation {
      color: #888;
      font-size: 14px;
      font-style: italic;
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid #f0f0f0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .profile-actions {
      display: flex;
      gap: 12px;
      margin-top: 20px;
    }

    .btn-view {
      flex: 1;
      padding: 12px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      font-weight: 500;
    }

    .btn-view:hover {
      background: linear-gradient(to right, #7a1bd2, #3a0072);
      transform: translateY(-2px);
    }

    .btn-interest {
      flex: 1;
      padding: 12px;
      background: #f8f6ff;
      color: #8a2be2;
      border: 2px solid #e0d6ff;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      font-weight: 500;
    }

    .btn-interest:hover {
      background: #8a2be2;
      color: white;
      transform: translateY(-2px);
      border-color: #8a2be2;
    }

    .no-profiles {
      text-align: center;
      padding: 80px 20px;
      color: #666;
      font-size: 18px;
      grid-column: 1 / -1;
      background: white;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .no-profiles i {
      font-size: 64px;
      color: #ddd;
      margin-bottom: 20px;
    }

    .no-profiles h3 {
      font-family: 'Playfair Display', serif;
      color: #4b0082;
      margin-bottom: 15px;
      font-size: 24px;
    }

    .no-profiles p {
      color: #888;
      font-size: 16px;
      max-width: 400px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Loading animation for cards */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .profile-card {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .welcome-section h2 {
        font-size: 28px;
      }

      .welcome-section p {
        font-size: 16px;
      }

      .search-form {
        grid-template-columns: 1fr;
      }

      .profiles-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
      }

      .search-section {
        padding: 30px 25px;
      }

      .container {
        padding: 20px 15px;
      }
    }

    @media (max-width: 480px) {
      .welcome-section {
        padding: 40px 20px;
      }

      .search-section {
        padding: 25px 20px;
      }

      .profiles-grid {
        grid-template-columns: 1fr;
      }

      .profile-actions {
        flex-direction: column;
      }

      .section-title {
        font-size: 26px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="welcome-section">
      <h2>Welcome to LifeIndex Matrimonial</h2>
      <p>Find your perfect life partner from thousands of verified profiles. Your journey to lifelong happiness begins here.</p>
    </div>

    <div class="search-section">
      <h3 class="search-title">Find Your Perfect Match</h3>
      <form method="GET" class="search-form">
        <div class="form-group">
          <label for="search"><i class="fas fa-search"></i> Search by Name</label>
          <input type="text" id="search" name="search" placeholder="Enter name..." 
                 value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        </div>
        
        <div class="form-group">
          <label for="age"><i class="fas fa-birthday-cake"></i> Age</label>
          <input type="number" id="age" name="age" placeholder="Enter age..." 
                 value="<?php echo isset($_GET['age']) ? htmlspecialchars($_GET['age']) : ''; ?>">
        </div>
        
        <div class="form-group">
          <label for="location"><i class="fas fa-map-marker-alt"></i> Location</label>
          <input type="text" id="location" name="location" placeholder="Enter location..." 
                 value="<?php echo isset($_GET['location']) ? htmlspecialchars($_GET['location']) : ''; ?>">
        </div>
        
        <button type="submit" class="search-btn">
          <i class="fas fa-search"></i> Search Profiles
        </button>
      </form>
    </div>

    <h3 class="section-title">Suggested Profiles</h3>
    
    <div class="profiles-grid">
      <?php
      // ✅ Only show approved profiles
      $query = "SELECT * FROM users WHERE id != {$_SESSION['user_id']} AND status='approved'";

      if (!empty($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $query .= " AND fullname LIKE '%$search%'";
      }
      
      if (!empty($_GET['age'])) {
        $age = intval($_GET['age']);
        $query .= " AND age = $age";
      }
      
      if (!empty($_GET['location'])) {
        $location = $conn->real_escape_string($_GET['location']);
        $query .= " AND place LIKE '%$location%'";
      }
      
      $query .= " ORDER BY id DESC LIMIT 12";
      
      $res = $conn->query($query);
      
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $photo = !empty($row['photo']) ? $row['photo'] : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjZjBmNWZmIi8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEyMCIgcj0iNjAiIGZpbGw9IiM4QTJCRTIiLz48Y2lyY2xlIGN4PSIxNTAiIGN5PSIyNzAiIHI9IjkwIiBmaWxsPSIjOEEyQkUyIi8+Cjwvc3ZnPg==';
          echo "
          <div class='profile-card'>
            <img src='{$photo}' alt='{$row['fullname']}' class='profile-image' onerror=\"this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjZjBmNWZmIi8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEyMCIgcj0iNjAiIGZpbGw9IiM4QTJCRTIiLz48Y2lyY2xlIGN4PSIxNTAiIGN5PSIyNzAiIHI9IjkwIiBmaWxsPSIjOEEyQkUyIi8+Cjwvc3ZnPg=='\">
            <div class='profile-content'>
              <h4 class='profile-name'>{$row['fullname']}</h4>
              <div class='profile-details'>
                <i class='fas fa-birthday-cake'></i>
                <span>{$row['age']} years</span>
              </div>
              <div class='profile-details'>
                <i class='fas fa-map-marker-alt'></i>
                <span>{$row['place']}</span>
              </div>
              <div class='profile-occupation'>
                <i class='fas fa-briefcase'></i> " . (!empty($row['occupation']) ? $row['occupation'] : 'Not specified') . "
              </div>
              <div class='profile-actions'>
                <button class='btn-view' onclick=\"viewProfile({$row['id']})\">
                  <i class='fas fa-eye'></i> View Profile
                </button>
                <button class='btn-interest' onclick=\"expressInterest({$row['id']})\">
                  <i class='fas fa-heart'></i> Interest
                </button>
              </div>
            </div>
          </div>";
        }
      } else {
        echo "
        <div class='no-profiles'>
          <i class='fas fa-user-slash'></i>
          <h3>No Profiles Found</h3>
          <p>Try adjusting your search criteria or check back later for new profiles.</p>
        </div>";
      }
      ?>
    </div>
  </div>

  <script>
    // Add animation to profile cards
    document.addEventListener('DOMContentLoaded', function() {
      const profileCards = document.querySelectorAll('.profile-card');
      profileCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
      });
    });

    function viewProfile(userId) {
      window.location.href = `view_profile.php?id=${userId}`;
    }

    function expressInterest(userId) {
      // Create a more elegant interest expression
      const button = event.target.closest('.btn-interest');
      const originalHTML = button.innerHTML;
      
      button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
      button.disabled = true;
      
      // Simulate API call
      setTimeout(() => {
        button.innerHTML = '<i class="fas fa-check"></i> Interest Sent!';
        button.style.background = '#4CAF50';
        button.style.borderColor = '#4CAF50';
        button.style.color = 'white';
        
        // Show success message
        showNotification('Interest successfully sent!', 'success');
        
        // Reset button after 3 seconds
        setTimeout(() => {
          button.innerHTML = originalHTML;
          button.disabled = false;
          button.style.background = '';
          button.style.borderColor = '';
          button.style.color = '';
        }, 3000);
      }, 1500);
    }

    function showNotification(message, type) {
      const notification = document.createElement('div');
      notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background: ${type === 'success' ? '#4CAF50' : '#8a2be2'};
        color: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        z-index: 1000;
        font-weight: 500;
        transform: translateX(100%);
        transition: transform 0.3s ease;
      `;
      notification.textContent = message;
      document.body.appendChild(notification);
      
      setTimeout(() => notification.style.transform = 'translateX(0)', 100);
      setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
      }, 3000);
    }

    // Search form enhancement
    const searchForm = document.querySelector('.search-form');
    searchForm.addEventListener('submit', function(e) {
      const inputs = this.querySelectorAll('input');
      let hasValue = false;
      
      inputs.forEach(input => {
        if (input.value.trim() !== '') {
          hasValue = true;
        }
      });
      
      if (!hasValue) {
        e.preventDefault();
        showNotification('Please enter at least one search criteria', 'error');
      }
    });
  </script>
</body>
</html>
<?php include("footer.php"); ?>