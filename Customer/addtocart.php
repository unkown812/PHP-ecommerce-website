<?php
  $pid=$_GET['pid'];

  include'authguard.php';
  include'../Shared/connection.php';
  mysqli_query($conn,'insert into cart(userid,pid values ($_SESSION['userid'],$pid)');
  header('location:viewcart.php');
?>