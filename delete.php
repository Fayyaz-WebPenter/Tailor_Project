<?php
include 'config/config.php';

// Sanitize and validate the ID
$id = intval($_GET['order_delete']); // Convert to integer to prevent SQL injection

// Check if the ID is valid
if ($id > 0) {
    // Correct SQL query with the table name (replace 'your_table_name' with the actual table name)
    $order = "DELETE FROM tbl_orders WHERE user_id = $id";

    // Execute the query
    $orders = mysqli_query($conn, $order);

    // Check if the query was successful
    if ($orders) {
        // Check if any rows were affected
        if (mysqli_affected_rows($conn) > 0) {
          header('location:http://localhost/whatsAppTailorproject/orders.php') ;
        } else {
            echo 'no'; // No rows matched the WHERE condition
        }
    } else {
        // Output the error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo 'Invalid ID';
}
?>
