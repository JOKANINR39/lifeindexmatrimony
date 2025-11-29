<?php
include("db.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  if (password_verify($password, $row['password'])) {

    // ✅ Check approval status before allowing login
    if ($row['status'] == 'pending') {
      echo "<script>alert('Your profile is under admin review. Please wait for approval.');window.location='index.html';</script>";
      exit();
    } elseif ($row['status'] == 'rejected') {
      echo "<script>alert('Your profile has been rejected by the admin. Please contact support.');window.location='index.html';</script>";
      exit();
    }

    // ✅ Approved — allow login
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['fullname'];
    header("Location: home.php");
    exit();

  } else {
    echo "<script>alert('Invalid password!');window.location='index.html';</script>";
  }

} else {
  echo "<script>alert('No user found!');window.location='index.html';</script>";
}
?>

