<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - LifeIndex Matrimonial</title>
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
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      color: #333;
    }

    .container {
      display: flex;
      max-width: 1200px;
      width: 100%;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .left-panel {
      flex: 1;
      background: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
      color: white;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .left-panel::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .left-panel::after {
      content: '';
      position: absolute;
      bottom: -80px;
      left: -80px;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .logo i {
      margin-right: 10px;
      font-size: 32px;
    }

    .left-panel h1 {
      font-family: 'Playfair Display', serif;
      font-size: 36px;
      margin-bottom: 15px;
      line-height: 1.3;
    }

    .left-panel p {
      font-size: 16px;
      line-height: 1.6;
      opacity: 0.9;
      margin-bottom: 10px;
    }

    .features {
      margin-top: 30px;
    }

    .feature {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .feature i {
      margin-right: 12px;
      font-size: 18px;
      color: #e6d9ff;
    }

    .right-panel {
      flex: 1.2;
      padding: 40px;
      max-height: 90vh;
      overflow-y: auto;
    }

    .form-header {
      margin-bottom: 30px;
      text-align: center;
    }

    .form-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 32px;
      color: #4b0082;
      margin-bottom: 10px;
    }

    .form-header p {
      color: #666;
      font-size: 15px;
    }

    .registration-form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-section {
      margin-bottom: 10px;
    }

    .form-section-title {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      color: #4b0082;
      margin-bottom: 15px;
      padding-bottom: 8px;
      border-bottom: 2px solid #f0e6ff;
      grid-column: 1 / -1;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .full-width {
      grid-column: 1 / -1;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #555;
      font-size: 14px;
    }

    .required::after {
      content: ' *';
      color: #e74c3c;
    }

    input, select {
      width: 100%;
      padding: 14px 15px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.3s;
      background-color: #f9f9f9;
      font-family: 'Poppins', sans-serif;
    }

    input:focus, select:focus {
      outline: none;
      border-color: #8a2be2;
      background-color: white;
      box-shadow: 0 0 0 3px rgba(138, 43, 226, 0.1);
    }

    .file-input-container {
      position: relative;
    }

    .file-input {
      padding: 12px;
      background: #f9f9f9;
      border: 1px dashed #8a2be2;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .file-input:hover {
      background: #f0e6ff;
    }

    .file-input::file-selector-button {
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 6px;
      margin-right: 10px;
      cursor: pointer;
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s;
    }

    .file-input::file-selector-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(138, 43, 226, 0.3);
    }

    .password-container {
      position: relative;
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 42px;
      cursor: pointer;
      color: #888;
    }

    .password-toggle:hover {
      color: #4b0082;
    }

    .form-actions {
      grid-column: 1 / -1;
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 2px solid #f0e6ff;
    }

    .btn-submit {
      padding: 16px 50px;
      background: linear-gradient(to right, #8a2be2, #4b0082);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(138, 43, 226, 0.3);
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(138, 43, 226, 0.4);
    }

    .login-link {
      text-align: center;
      margin-top: 25px;
      font-size: 15px;
      color: #666;
    }

    .login-link a {
      color: #8a2be2;
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .file-requirements {
      font-size: 12px;
      color: #888;
      margin-top: 5px;
    }

    @media (max-width: 968px) {
      .registration-form {
        grid-template-columns: 1fr;
      }
      
      .container {
        flex-direction: column;
        max-height: none;
      }
      
      .left-panel {
        padding: 30px;
        text-align: center;
      }
      
      .right-panel {
        padding: 30px;
        max-height: none;
      }
    }

    @media (max-width: 480px) {
      .left-panel, .right-panel {
        padding: 20px;
      }
      
      .left-panel h1 {
        font-size: 28px;
      }
      
      .form-header h2 {
        font-size: 26px;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <div class="logo">
        <i class="fas fa-heart"></i> LifeIndex
      </div>
      <h1>Begin Your Journey to Forever</h1>
      <p>Join our trusted matrimonial platform and find your perfect life partner from thousands of verified profiles.</p>
      
      <div class="features">
        <div class="feature">
          <i class="fas fa-shield-alt"></i>
          <span>100% Verified Profiles</span>
        </div>
        <div class="feature">
          <i class="fas fa-users"></i>
          <span>Thousands of Success Stories</span>
        </div>
        <div class="feature">
          <i class="fas fa-lock"></i>
          <span>Complete Privacy Protection</span>
        </div>
        <div class="feature">
          <i class="fas fa-star"></i>
          <span>Advanced Matching Algorithm</span>
        </div>
      </div>
    </div>
    
    <div class="right-panel">
      <div class="form-header">
        <h2>Create Your Account</h2>
        <p>Fill in your details to start your journey to finding the perfect match</p>
      </div>
      
      <form action="register_process.php" method="POST" enctype="multipart/form-data" class="registration-form">
        <h3 class="form-section-title">Personal Information</h3>
        
        <div class="form-group">
          <label for="fullname" class="required">Full Name</label>
          <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
        </div>
        
        <div class="form-group">
          <label for="fathername" class="required">Father's Name</label>
          <input type="text" id="fathername" name="fathername" placeholder="Enter father's name" required>
        </div>
        
        <div class="form-group">
          <label for="mothername" class="required">Mother's Name</label>
          <input type="text" id="mothername" name="mothername" placeholder="Enter mother's name" required>
        </div>
        
        <div class="form-group">
          <label for="age" class="required">Age</label>
          <input type="number" id="age" name="age" placeholder="Enter age" min="18" max="100" required>
        </div>
        
        <div class="form-group">
          <label for="dob" class="required">Date of Birth</label>
          <input type="date" id="dob" name="dob" required>
        </div>
        
        <div class="form-group">
          <label for="place" class="required">Place</label>
          <input type="text" id="place" name="place" placeholder="Enter your city/town" required>
        </div>
        
        <div class="form-group">
          <label for="gender" class="required">Gender</label>
          <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        
        <h3 class="form-section-title">Contact Information</h3>
        
        <div class="form-group">
          <label for="email" class="required">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        
        <div class="form-group">
          <label for="phone" class="required">Phone Number</label>
          <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
        </div>
        
        <h3 class="form-section-title">Astrological Information</h3>
        
        <div class="form-group">
          <label for="star">Star</label>
          <input type="text" id="star" name="star" placeholder="Enter your star">
        </div>
        
        <div class="form-group">
          <label for="zodiac">Zodiac Sign</label>
          <input type="text" id="zodiac" name="zodiac" placeholder="Enter zodiac sign">
        </div>
        
        <h3 class="form-section-title">Professional Information</h3>
        
        <div class="form-group">
          <label for="occupation">Occupation / Job</label>
          <input type="text" id="occupation" name="occupation" placeholder="Enter your occupation">
        </div>
        
        <div class="form-group">
          <label for="work_location">Working Location</label>
          <input type="text" id="work_location" name="work_location" placeholder="Enter work location">
        </div>
        
        <div class="form-group">
          <label for="searching_for">Searching For</label>
          <input type="text" id="searching_for" name="searching_for" placeholder="E.g., Bride, Groom, etc.">
        </div>
        
        <h3 class="form-section-title">Upload Documents</h3>
        
        <div class="form-group">
          <label for="photo" class="required">Upload Photo</label>
          <input type="file" id="photo" name="photo" class="file-input" accept="image/*" required>
          <div class="file-requirements">Accepted formats: JPG, PNG, JPEG | Max size: 5MB</div>
        </div>
        
        <div class="form-group">
          <label for="jathagam" class="required">Upload Jathagam Photo</label>
          <input type="file" id="jathagam" name="jathagam" class="file-input" accept="image/*" required>
          <div class="file-requirements">Accepted formats: JPG, PNG, JPEG | Max size: 5MB</div>
        </div>
        
        <h3 class="form-section-title">Security</h3>
        
        <div class="form-group full-width">
          <label for="password" class="required">Password</label>
          <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Create a strong password" required>
            <span class="password-toggle" id="togglePassword">
              <i class="far fa-eye"></i>
            </span>
          </div>
        </div>
        
        <div class="form-actions">
          <button type="submit" class="btn-submit">
            <i class="fas fa-user-plus"></i> Create Account
          </button>
        </div>
      </form>
      
      <p class="login-link">Already have an account? <a href="index.html">Sign in here</a></p>
    </div>
  </div>

  <script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    
    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      
      // Toggle eye icon
      this.innerHTML = type === 'password' ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>';
    });
    
    // Add subtle animation to form elements on load
    document.addEventListener('DOMContentLoaded', function() {
      const formGroups = document.querySelectorAll('.form-group');
      formGroups.forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          group.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          group.style.opacity = '1';
          group.style.transform = 'translateY(0)';
        }, 100 * index);
      });
    });

    // Age validation
    const ageInput = document.getElementById('age');
    ageInput.addEventListener('change', function() {
      if (this.value < 18) {
        alert('You must be at least 18 years old to register.');
        this.value = '';
        this.focus();
      }
    });

    // File input preview (basic implementation)
    const fileInputs = document.querySelectorAll('.file-input');
    fileInputs.forEach(input => {
      input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          const fileSize = file.size / 1024 / 1024; // MB
          if (fileSize > 5) {
            alert('File size must be less than 5MB');
            this.value = '';
          }
        }
      });
    });
  </script>
</body>

</html>
