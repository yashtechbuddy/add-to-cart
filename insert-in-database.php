<?php
// Step 1: Establish a PDO connection
// Step 2: Start the session (if not already started)
session_start();
include './is_user_set.php';
include 'function.php';
include 'config.php';
// Step 3: Retrieve and sanitize session array values
if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Prepare the INSERT query
    $sql = "INSERT INTO tbl_inquiry(autogenrated_id,customer_id, 
    product_id,quantity,volume_name) VALUES ";
    $values = array();
    $autogenrated_id = generateUniqueID();
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $customer_id = (int)$_SESSION['login-customer']['id'];
        $transection_id = $autogenrated_id;
        $product_id = (int)$product_id;
        $category_id = (int)$item['category'];
        $volume = $db->quote($item['volume']);
        $quantity = (int)$item['quantity'];
        $values[] = "('$transection_id',$customer_id,$product_id, $quantity, $volume)";
    }

    echo $_SESSION['login-customer']['id'];
    // Execute the INSERT query
    try {
        $db->beginTransaction();
        $db->exec($sql . implode(", ", $values));
        $db->commit();
        echo '<script>alert("Your request for a quotation has been successfully submitted");</script>';
        echo '<script>window.location.href = "inquiry-status.php";</script>';
        echo '<script>';
        echo 'console.log("Your request for a quotation has been successfully submitted");';
        echo '</script>';
        unset($_SESSION['cart']);
    } catch (PDOException $e) {
        $db->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Cart is empty. Nothing to insert.";
}

// Close the database connection
