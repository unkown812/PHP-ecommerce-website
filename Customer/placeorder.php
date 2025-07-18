<?php
include("../Shared/connection.php");
include("authguard.php"); 
    $cartItems = json_decode($_POST['cartItems'], true);
    $userId = $_SESSION['userid']; 
    mysqli_begin_transaction($conn);

    $stmt = mysqli_prepare($conn, "insert into orders(userid, order_date) vlaues(?, NOW())");
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $orderid = mysqli_insert_id($conn);
    $itemStmt = mysqli_prepare($conn, "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
    foreach ($cartItems as $item) {
        mysqli_stmt_bind_param($itemStmt, "iii", $orderId, $item['product_id'], $item['quantity']);
        mysqli_stmt_execute($itemStmt);
    }
    echo "Order placed successfully! Your order ID is: " . $orderId;
?>