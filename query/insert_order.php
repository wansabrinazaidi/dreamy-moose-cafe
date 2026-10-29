<?php
session_start();
require("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $cartItems = $data['cartItems'];
    $cust_id = $_SESSION['cust_id'];
    date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia
    $order_date = date('Y-m-d');
    $order_placetime = date('H:i:s');
    $order_status = 'pending';
    $delivery_id = 0;

    foreach ($cartItems as $item) {
        $menu_id = (int) $item['menu_id']; // cast to int to prevent SQL injection
        $quantity = (int) $item['quantity'];
        
        $sql = "INSERT INTO order_details (quantity, order_placetime, order_date, order_status, cust_id, menu_id, delivery_id) 
                VALUES ('$quantity', '$order_placetime', '$order_date', '$order_status', '$cust_id', '$menu_id', '$delivery_id')";

        if (!mysqli_query($conn, $sql)) {
            echo json_encode(['success' => false]);
            exit;
        }
    }

    echo json_encode(['success' => true]);
}
