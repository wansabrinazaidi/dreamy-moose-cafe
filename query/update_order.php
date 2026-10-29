<?php
session_start();
require("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $paymentMethod = in_array($data['paymentMethod'], ['online banking', 'cash'], true) ? $data['paymentMethod'] : 'cash'; // only allow known values
    $cust_id = $_SESSION['cust_id'];
    $cartItems = $data['cartItems'];
    date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia
    $order_date = date('Y-m-d');
    $order_placetime = date('H:i:s');
    $order_status = 'pending';
    // Determine the delivery_id based on the payment method
    $delivery_id = ($paymentMethod === 'online') ? 1 : 2;

    $total = 0;

    foreach ($cartItems as $item) {
        $menu_id = (int) $item['menu_id']; // cast to int to prevent SQL injection
        $quantity = (int) $item['quantity'];
        
        $sql = "INSERT INTO order_details (quantity, order_placetime, order_date, order_status, cust_id, menu_id, delivery_id) 
                VALUES ('$quantity', '$order_placetime', '$order_date', '$order_status', '$cust_id', '$menu_id', '$delivery_id')";

$total += $quantity * (float) $item["price"];

      
if (!mysqli_query($conn, $sql)) {
    echo json_encode(['success' => false]);
}
    }
    
    $sql_pay = "INSERT INTO `payment`(`total`, `pay_method`, `pay_status`, `pay_date`, `cust_id`, `order_id`) VALUES ('$total','$paymentMethod','success','$order_date','$cust_id','0')";
    $query = mysqli_query($conn,$sql_pay);

    echo json_encode(['success' => true]);
}
