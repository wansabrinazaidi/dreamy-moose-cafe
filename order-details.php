<?php
session_start();
require('connection.php'); 
$cust_id = $_SESSION["cust_id"];
$sql_order = mysqli_query($conn, "SELECT * FROM order_details o JOIN menu m on o.menu_id = m.menu_id WHERE order_status = 'pending' AND cust_id = '$cust_id' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery</title>
  <style>
    body {
      background-image: url('Pictures/Homepage_bg.jpg');
      background-size: cover;
      background-position: center;
      text-align: center;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    #rcorners1 {
      background: #708B7B;
      text-align: center;
      padding: 20px;
      width: 48%;
      height: auto; /* Adjust height to fit content */
      margin: 50px 0 0 20px;
      position: absolute;
      left: -1px;
      display: flex;
      flex-direction: column;
      align-items: center;
      border-radius: 10px;
      top: 24px;
    }
    #rcorners2 {
      background-color: #E3BC9A;
      text-align: center;
      padding: 20px;
      width: 469px;
      height: 173px;
      margin: 0;
      position: absolute;
      right: 70px;
      top: 82px;
      border: 4px solid black; /* Added black border */
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", "monospace";
      font-size: 29px;
    }
    /* Added styles for text shadow */
    #rcorners2 span {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .p {
      background-color: #C5CFCA;
      color: #623628; 
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-size: 18px;
      margin-top: 10px;
      transition: background-color 0.3s ease;
      display: inline-block;
    }
    .logo {
      width: 352px; /* Adjust the width as needed */
      height: 301px;
      margin-bottom: 10px; /* Add space between image and bottom border */
      position: absolute; /* Position the image absolutely inside #rcorners2 */
      bottom: 76px; /* Place it at the bottom */
      left: 1220px; /* Center it horizontally */
      transform: translateX(-50%); /* Adjust horizontal positioning */
    }
  </style>
</head>
<body>
  <div id="rcorners1">
    <p class="p"><b>Order Details</b></p>
    <?php 
    if ($row = mysqli_fetch_assoc($sql_order)) { 
        // Display order ID, date, and time once
    ?>
    <p id="order-id">Order Id: <?= $row["order_id"] ?></p>
    <p id="order-date">Date: <?= $row["order_date"] ?></p>
    <p id="order-time">Time: <?= date('g.i a', strtotime($row["order_placetime"])) ?></p>
    <?php } ?>
    <!-- Display all menu items -->
    <?php 
    $total_price = 0;
    mysqli_data_seek($sql_order, 0); // Reset the pointer to fetch all rows again
    while ($row = mysqli_fetch_assoc($sql_order)) { 
      $total_price += ($row["menu_price"] * $row["quantity"] );
    ?>
    <p><?= $row["quantity"] ?>X <?= $row["menu_name"] ?> RM <?= $row["menu_price"] * $row["quantity"] ?></p>
    <?php } ?>
    <p>Delivery Fee  4.99</p>
    <p>Container/Processing Fee 6.99</p>
    <h1>TOTAL (RM) <?= $total_price + 4.99 + 6.99 ?></h1>
  </div>
  <div id="rcorners2">
    <span style="color:#405D4C">ESTIMATED TIME TO ARRIVE</span> 
    <span id="estimated-time" style="font-size: 30px;">10-20 Mins</span>
    <hr color="white" size="2%" width="100%">
    <span style="color:#405D4C">ORDER STATUS</span> 
    <span style="font-size: 30px;">Preparing</span>
  </div>
  <img src="Pictures/2ndlogo.png" alt="Cafe Logo" width="380" margin-left="90px" height="312" class="logo">
</body>
</html>
