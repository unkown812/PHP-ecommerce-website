<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View products</title>
  <style>
    .pdt{
      background-color: aqua;
      display: inline-block;
      margin: 10px;
      padding: 10px;
      width: 300px;
      height: fit-content;
      vertical-align: top;
    }
    .pdt-img{
      height: 100%;
      width: 80%;
    }
    .name{
      font-size: 20px;
      font-weight: bold;
      color: rgba(159, 255, 255, 0.618);
    }
    .price{
      font-size: 25px;
      font-weight: bolder;
    }
    .price::after{
      content: "Rs";
      font-size: 12px;
    }
  </style>
</head>
<body>
<?php
  include("authguard.php");
  include "menu.html";
  include("../Shared/connection.php");

  $sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");
  mysqli_fetch_assoc($sql_result);
  while($dbrow=mysqli_fetch_assoc($sql_result)){
    echo "
      <div>
        <div class="name">$dbrow[name]</div> 
        <div class="price">$dbrow[price]</div> 
        <div>$dbrow[details]</div> 
        <img src="$dbrow[impath]"/>
        <div>$dbrow[detail]</div>
        <div>
          <div>
            <a href="edit.php?pid=$dbrow[pid]">
              <button>Edit</button>
            </a>
            <a href="delete.php?pid=$dbrow[pid]">
              <button>Delete</button>
            </a>
          </div>
        </div>
      </div>";
}
?>

</body>
</html>
