<?php

include 'includes/header.php';

  if (isset($_POST['add-request'])) {
     $inquiry_id = $_POST['inquiry_id'];
     $customer_id = $_POST['customer_id'];
     $product_id = $_POST['product_id'];
     $quantity = $_POST['quantity'];
     $volume_name = $_POST['volume_name'];
     $assign_id = $_POST['assign_employee'];
     print_r($_POST['supplier']);
    foreach ($_POST['supplier'] as $supplierId) {
        echo $supplierId."<br>";
        // $insertSupplierQuery = "INSERT INTO `tbl_manage_inquiry`(`customer_id`, `supplier_id`, `inquiry_id`, `assign_id`, `product_id`, `quantity`, `volume_name`) VALUES 
        // ($customer_id, $supplierId, '$inquiry_id', $assign_id, $product_id, $quantity, '$volume_name')";
        // $result = mysqli_query($conn, $insertSupplierQuery);
    }
    
    if($result){
        
        echo "<script>
                   alert('The request as been send successfully');
                    window.location.href = 'destination-page.php'; 
              </script>";
    }
}

?>