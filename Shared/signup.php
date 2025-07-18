<?php
  print_r($_POST);
  $conn=new mysqli("localhost","root","","ecommerce",3306);
  $sql="insert into signup(username,password,usertype) values('$_POST[username]','$_POST[password1]','$_POST[usertype]')";
  mysqli_query($conn,"insert into user(username,password,usertype) values('$_POST[username]','$_POST[password1]','$_POST[usertype]')");
?>