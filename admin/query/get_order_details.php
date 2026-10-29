<?php
// Only logged-in admins may call this endpoint
session_start();
if (!isset($_SESSION["username_admin"])) {
    http_response_code(403);
    exit;
}

// Include your database connection file
require("../../connection.php");

// Check if cust_id is provided via GET request
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];

    // Query to fetch all order details for a specific customer based on cust_id
    $sql = "SELECT o.*, c.*, m.* FROM order_details o 
            JOIN customer c ON o.cust_id = c.cust_id 
            JOIN menu m ON o.menu_id = m.menu_id 
            WHERE o.cust_id = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the cust_id parameter
        mysqli_stmt_bind_param($stmt, "i", $cust_id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Fetch all order details
            $order_details = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $order_details[] = $row;
            }

            // Return JSON response with all orders for the customer
            header('Content-Type: application/json');
            echo json_encode($order_details);
        } else {
            // If no orders found for the given cust_id
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array("error" => "No orders found for this customer"));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // If preparing the statement fails
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode(array("error" => "Failed to prepare statement"));
    }
} else {
    // If cust_id parameter is not provided
    header("HTTP/1.0 400 Bad Request");
    echo json_encode(array("error" => "Missing cust_id parameter"));
}

// Close the database connection
mysqli_close($conn);
?>
