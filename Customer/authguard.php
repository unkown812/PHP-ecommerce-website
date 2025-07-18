<?php
  session_start(); 
  if(!isset($_SESSION['user_id'])) {
    header("Location: ../Shared/login.php");
    exit();
  }
  if($_SESSION["login_status"] !== false) {
    echo "Illegal attempt";
    die;
  }
  if($_SESSION["usertype"] !== "vendor") {
    echo "Forbidden Access";
    die;
  }  
?>