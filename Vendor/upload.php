
<?php

  session_start();
  $source = $_FILES['pdtimg']['tmp_name'];
  $target = "../Shared/images/" . $_FILES['pdtimg']['name'];

  if (move_uploaded_file($source, $target)) {
    include ('../Shared/connection.php');

    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $pprice = mysqli_real_escape_string($con, $_POST['pprice']);
    $pdetail = mysqli_real_escape_string($con, $_POST['pdetail']);
    $userid = mysqli_real_escape_string($con, $_SESSION['userid']);

    $query = "INSERT INTO product (name, price, detail, impath, owner) VALUES ('$pname', '$pprice', '$pdetail', '$target', '$userid')";
    if (!mysqli_query($con, $query)) {
      die ('Error: ' . mysqli_error($con));
    }
  } else {
    die ('Error: Unable to upload file');
  }
?>