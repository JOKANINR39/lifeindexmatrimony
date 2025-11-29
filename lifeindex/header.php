<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeIndex Matrimonial</title>
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
    }

    header {
      background: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
      color: white;
      padding: 0;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    header::after {
      content: '';
      position: absolute;
      bottom: -30px;
      left: -30px;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      z-index: 2;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.05);
      border-color: rgba(255, 255, 255, 0.6);
    }

    .site-title {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 600;
      background: linear-gradient(45deg, #ffffff, #e6d9ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 10px 20px;
      border-radius: 25px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
      position: relative;
      overflow: hidden;
    }

    .nav-links a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .nav-links a:hover::before {
      left: 100%;
    }

    .nav-links a:hover {
      background: rgba(255, 255, 255, 0.15);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .home-link {
      background: rgba(255, 255, 255, 0.1);
    }

    .profile-link {
      background: rgba(255, 255, 255, 0.08);
    }

    .logout-link {
      background: rgba(255, 107, 107, 0.2);
    }

    .logout-link:hover {
      background: rgba(255, 107, 107, 0.3);
    }

    .nav-icon {
      font-size: 18px;
    }

    .header-divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
      border: none;
      margin: 0;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
        padding: 15px;
      }

      .site-title {
        font-size: 24px;
      }

      .nav-links {
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
      }

      .nav-links a {
        padding: 8px 16px;
        font-size: 14px;
      }
    }

    @media (max-width: 480px) {
      .nav-links {
        gap: 10px;
      }

      .nav-links a {
        padding: 6px 12px;
        font-size: 13px;
      }

      .site-title {
        font-size: 20px;
      }

      .logo {
        width: 40px;
        height: 40px;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <header>
    <div class="header-content">
      <div class="logo-container">
        <img src="logo.png" alt="LifeIndex Matrimonial Logo" class="logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTI1IDBDMTEuMTkyOSAwIDAgMTEuMTkyOSAwIDI1QzAgMzguODA3MSAxMS4xOTI5IDUwIDI1IDUwQzM4LjgwNzEgNTAgNTAgMzguODA3MSA1MCAyNUM1MCAxMS4xOTI5IDM4LjgwNzEgMCAyNSAwWk0yNSA0NEMxMy45NTQzIDQ0IDUgMzUuMDQ1NyA1IDI0QzUgMTIuOTU0MyAxMy45NTQzIDQgMjUgNEMzNi4wNDU3IDQgNDUgMTIuOTU0MyA0NSAyNEM0NSAzNS4wNDU3IDM2LjA0NTcgNDQgMjUgNDRaIiBmaWxsPSIjZmZmZmZmIi8+CjxwYXRoIGQ9Ik0zMiAyMEMzMiAyMi4yMDkxIDMwLjIwOTEgMjQgMjggMjRDMjUuNzkwOSAyNCAyNCAyMi4yMDkxIDI0IDIwQzI0IDE3Ljc5MDkgMjUuNzkwOSAxNiAyOCAxNkMzMC4yMDkxIDE2IDMyIDE3Ljc5MDkgMzIgMjBaIiBmaWxsPSIjZmZmZmZmIi8+CjxwYXRoIGQ9Ik0yMiAyMEMyMiAyMi4yMDkxIDIwLjIwOTEgMjQgMTggMjRDMTUuNzkwOSAyNCAxNCAyMi4yMDkxIDE0IDIwQzE0IDE3Ljc5MDkgMTUuNzkwOSAxNiAxOCAxNkMyMC4yMDkxIDE2IDIyIDE3Ljc5MDkgMjIgMjBaIiBmaWxsPSIjZmZmZmZmIi8+CjxwYXRoIGQ9Ik0zNSAzMEMzNSAzMS42NTY5IDMzLjY1NjkgMzMgMzIgMzNIMThDMTYuMzQzMSAzMyAxNSAzMS42NTY5IDE1IDMwVjI5QzE1IDI3LjM0MzEgMTYuMzQzMSAyNiAxOCAyNkgzMkMzMy42NTY5IDI2IDM1IDI3LjM0MzEgMzUgMjlWMzBaIiBmaWxsPSIjZmZmZmZmIi8+Cjwvc3ZnPgo='">
        <h1 class="site-title">LifeIndex Matrimonial</h1>
      </div>

      <div class="nav-links">
        <a href="home.php" class="home-link">
          <i class="fas fa-home nav-icon"></i>
          <span>Home</span>
        </a>
        <a href="profile.php" class="profile-link">
          <i class="fas fa-user nav-icon"></i>
          <span>My Profile</span>
        </a>
        <a href="logout.php" class="logout-link">
          <i class="fas fa-sign-out-alt nav-icon"></i>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <hr class="header-divider">
  </header>

  <script>
    // Add subtle animation to header elements
    document.addEventListener('DOMContentLoaded', function() {
      const headerContent = document.querySelector('.header-content');
      headerContent.style.opacity = '0';
      headerContent.style.transform = 'translateY(-20px)';
      
      setTimeout(() => {
        headerContent.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        headerContent.style.opacity = '1';
        headerContent.style.transform = 'translateY(0)';
      }, 100);

      // Add click effect to navigation links
      const navLinks = document.querySelectorAll('.nav-links a');
      navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          // Create ripple effect
          const ripple = document.createElement('span');
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.style.position = 'absolute';
          ripple.style.borderRadius = '50%';
          ripple.style.background = 'rgba(255, 255, 255, 0.3)';
          ripple.style.transform = 'scale(0)';
          ripple.style.animation = 'ripple 0.6s linear';
          ripple.style.pointerEvents = 'none';
          
          this.style.position = 'relative';
          this.style.overflow = 'hidden';
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });
    });

    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes ripple {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>