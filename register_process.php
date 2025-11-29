<?php
include("db.php");

// Collect form data
$fullname = $_POST['fullname'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$place = $_POST['place'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$star = $_POST['star'];
$zodiac = $_POST['zodiac'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$work_location = $_POST['work_location'];
$searching_for = $_POST['searching_for'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Create upload directories if missing
$photoDir = "uploads/";
$jathaDir = "jathagam_uploads/";
if (!is_dir($photoDir)) mkdir($photoDir, 0777, true);
if (!is_dir($jathaDir)) mkdir($jathaDir, 0777, true);

// Handle file uploads safely
$photoName = time() . "_" . basename($_FILES["photo"]["name"]);
$jathaName = time() . "_" . basename($_FILES["jathagam"]["name"]);

$photoPath = $photoDir . $photoName;
$jathaPath = $jathaDir . $jathaName;

if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath)) {
    die("Error uploading photo. Please try again.");
}
if (!move_uploaded_file($_FILES["jathagam"]["tmp_name"], $jathaPath)) {
    die("Error uploading jathagam. Please try again.");
}

// Default status = pending (for admin approval)
$status = 'pending';

// Insert into DB
$sql = "INSERT INTO users 
(fullname, fathername, mothername, age, dob, place, email, phone, star, zodiac, gender, photo, jathagam, occupation, work_location, searching_for, password, status)
VALUES 
('$fullname','$fathername','$mothername','$age','$dob','$place','$email','$phone','$star','$zodiac','$gender','$photoPath','$jathaPath','$occupation','$work_location','$searching_for','$password','$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registration successful! Your profile is under admin review. It will appear after approval.');
        window.location='login.php';
    </script>";
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>
