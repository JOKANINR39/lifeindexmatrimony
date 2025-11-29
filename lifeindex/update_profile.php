<?php
session_start();
include("db.php");

$id = $_POST['id'];
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

// Fetch existing images to retain if not changed
$res = $conn->query("SELECT photo, jathagam FROM users WHERE id=$id");
$row = $res->fetch_assoc();
$photo = $row['photo'];
$jathagam = $row['jathagam'];

// If new photo uploaded
if (!empty($_FILES['photo']['name'])) {
  $photo = "uploads/" . basename($_FILES['photo']['name']);
  move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
}

// If new jathagam uploaded
if (!empty($_FILES['jathagam']['name'])) {
  $jathagam = "jathagam_uploads/" . basename($_FILES['jathagam']['name']);
  move_uploaded_file($_FILES['jathagam']['tmp_name'], $jathagam);
}

$sql = "UPDATE users SET 
fullname='$fullname',
fathername='$fathername',
mothername='$mothername',
age='$age',
dob='$dob',
place='$place',
email='$email',
phone='$phone',
star='$star',
zodiac='$zodiac',
gender='$gender',
occupation='$occupation',
work_location='$work_location',
searching_for='$searching_for',
photo='$photo',
jathagam='$jathagam'
WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Profile updated successfully!');window.location='profile.php';</script>";
} else {
  echo "Error updating record: " . $conn->error;
}
?>
