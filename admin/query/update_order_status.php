<?php
// Only logged-in admins may call this endpoint
session_start();
if (!isset($_SESSION["username_admin"])) {
    http_response_code(403);
    exit;
}

require("../../connection.php");

if (isset($_GET['order_id'])) {
    $cust_id = $_GET['order_id'];
    
    // Update query
    $update_query = "UPDATE order_details SET order_status = 'confirm' WHERE cust_id = ? AND order_status = 'pending'";
    
    // Prepare and bind parameter
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "i", $cust_id);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Check the number of affected rows
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows > 0) {
            echo json_encode(array("status" => "success", "message" => "$affected_rows orders updated to 'confirm'."));
        } else {
            echo json_encode(array("status" => "error", "message" => "No pending orders found for this customer."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to update order status."));
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(array("status" => "error", "message" => "No customer ID provided."));
}
?>
