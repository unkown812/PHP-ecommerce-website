<?php
session_start(); // Start session to store login state
$conn = new mysqli("localhost", "root", "", "ecommerce", 3306);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();

  // Store user data in session
  $_SESSION['username'] = $username;
  $_SESSION['usertype'] = $data['usertype'];
  $_SESSION['userid'] = $data['userid'];

  // Redirect based on user type
  switch ($data['usertype']) {
    case 'Customer':
      header("Location: ../Customer/home.php");
      break;
    case 'Vendor':
      header("Location: ../Vendor/home.php");
      break;
    case 'Admin':
      header("Location: ../Admin/home.php");
      break;
    default:
      die("Invalid user type");
  }
  exit(); // Ensure script stops after redirect
} else {
  echo "Login Failed - Invalid username or password";
}

// Close connections
$stmt->close();
$conn->close();
?>