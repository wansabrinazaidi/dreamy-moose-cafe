<?php
// Only logged-in admins may call this endpoint
session_start();
if (!isset($_SESSION["username_admin"])) {
    http_response_code(403);
    exit;
}

// Validate and sanitize input
if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    
    // Perform database operation to delete order_details based on order_id
    require("../../connection.php"); // Adjust this based on your file structure and connection method
    
    $sql = "DELETE FROM order_details WHERE cust_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $order_id);
        mysqli_stmt_execute($stmt);
        
        // Check if deletion was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Deletion successful
            echo "Order deleted successfully.";
        } else {
            // No rows affected, likely order_id doesn't exist
            echo "Failed to delete order. Order ID not found or already deleted.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing SQL statement
        echo "Failed to prepare statement: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    // No order_id received
    echo "Order ID not provided.";
}
