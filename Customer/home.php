<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
      name="keywords"
      content="ecommerce , online shopping, shopping cart, checkout, payment gateway"
    />
    <title>Signup</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Poiret+One&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Niconne&family=Play:wght@400;700&family=Poiret+One&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        background-color: rgba(255, 238, 255, 0.35);
        background-image:
         radial-gradient(
            at 47% 33%,
            hsla(67, 100.00%, 50.00%, 0.12) 0,
            transparent 50%
          ),
          radial-gradient(
            at 82% 65%,
            hsla(267, 100%, 50%, 0.386) 0,
            transparent 55%
          ),
          radial-gradient(
            at 47% 33%,
            hsla(162, 100%, 50%, 0.177) 0,
            transparent 50%
          );
        background-size: cover;
        background-repeat: no-repeat;
        padding-top: 10rem;
        font-family: "Play";
      }

      .card {
        -webkit-backdrop-filter: blur(20px) saturate(200%);
        backdrop-filter: blur(20px) saturate(200%);
        background-color: rgba(0, 0, 0, 0.32);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.125);
        width: auto;
        margin-left: 50em;
      }

      .brandname {
        font-weight: 900;
        justify-content: center;
        text-align: center;
        font-family: "Poiret One", serif;
      }
    </style>
  </head>
  <body>
    <div class="brandname">
      <b
        ><i><h1 style="font-size: 50px">LuxLane</h1></i></b
      >
    </div>
    <div
      class="card justify-content-center align-items-center m-5 p-5 text-center d-flex"
    >
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3 class="text-center">Add Product</h3>
        <input
          class="form-control mt-3"
          type="text"
          name="username"
          placeholder="Enter Product name"
          required
        />
        <input
          class="form-control mt-2"
          type="number"
          name="pprice"
          placeholder="Enter Price"
          required
        />
        <textarea class="form-control mt-3 " name="pdetail" cols="30" rows="10" placeholder="Product desciption"></textarea>
        <input 
          type="file"   
          accept=".jpg,.png" 
          class="form-control mt-2">
        <div class="text-center">
          <button 
            type="submit" class="mt-3 btn btn-success" data-mdb-ripple-init>Add</button>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
  include("authguard.php");
  include "menu.html";
  include("../Shared/connection.php");

  $sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");
  mysqli_fetch_assoc($sql_result);

  while($dbrow=mysqli_fetch_assoc($sql_result)){
    echo "<div class='card m-2'>
        <div class="name">$dbrow[name]</div> 
        <div class="price">$dbrow[price]</div> 
        <div class="details">$dbrow[details]</div> 
        <img src=$dbrow[impath]/>
        <div>$dbrow[detail]</div>
        <div>
          <div>
            <a href="addtocart.php?pid=$dbrow[pid]">
              <button class="btn btn-warning">Add to cart</button>
            </a>
          </div>
        </div>
      </div>";
?>