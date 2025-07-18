<?php
  session_start();
  if(!isset($_SESSION['user_id'])) {
    header("Location: ../Shared/login.php");
    exit();
  }
  if($_SESSION["login_status"]) {
    echo "Illegal attempt";
    die;
  }
  if($_SESSION["login_status"]==false) {
    echo "Unauthorised access";
    die;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxlane</title>
</head>
<body>
  <h1>Admin Home</h1>
  <?php if(isset($_SESSION['username'])): ?>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
  <?php endif; ?>
</body>
</html>