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
      <b
        ><i><h3 class="mt-4 ">Cart Details</h3></i></b
      >
    </div>
    <div class="card justify-content-center align-items-center m-5 p-5 text-center d-flex">
    <?php
      include ("authguard.php");
      include ("menu.html");
      include ("../Shared/connection.php");

      $sql_res=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userid]");
      $cartItems = []; // Array to hold cart items for order processing
      while ($row=mysqli_fetch_array($sql_res)) {
          $cartItems[] = [
              'product_id' => $row['pid'],
              'quantity' => 1 // Assuming quantity is 1 for simplicity
          ];
          echo "<div class='card m-2'>
            <div class='name'>{$row['name']}</div> 
            <div class='price'>{$row['price']}</div> 
            <div class='details'>{$row['details']}</div> 
            <img src='{$row['impath']}'/>
            <div>{$row['detail']}</div>
            <div>
              <div>
                <a href='addtocart.php?pid={$row['pid']}'>
                  <button class='btn btn-warning'>Remove from cart</button>
                </a>
              </div>
            </div>
          </div>"; 
        }
      ?>
      <form method="POST" action="place_order.php">
        <input type="hidden" name="cartItems" 
        value='<?php 
          echo json_encode($cartItems); ?>' 
        />
        <button type="submit" class="btn btn-success mt-4">
          Place Order
        </button>
      </form>
    </div>
  </body>
</html>