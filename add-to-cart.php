<?php
include 'config.php';
session_start();
// echo $product_id = $_POST['product_id'];
// echo $category_id = $_POST['category']; // Corrected the variable name
// echo $product_name = $_POST['product_name'];
// echo $product_image = $_POST['img'];
// var_dump($_SESSION['cart']);
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();

}

if (!isset($_SESSION['productids']) ) {
    $_SESSION['productids'] = array();
  
}
$_SESSION['count'] = count($_SESSION['cart']); 
$_SESSION['count'] = COUNT($_SESSION['cart']);
// Assuming you have a product ID and name coming from the request, you can add them to the cart like this:
if ( isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['img'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category']; 
    $product_name = $_POST['product_name'];
    $product_image = $_POST['img'];
    $volume = $_POST['volume'] ;
    
    $selectvol = "SELECT tbl_volume.volume_name From tbl_product join tbl_volume on tbl_product.volume_id = tbl_volume.id   WHERE tbl_product.id =$product_id";
    $result = $db->query($selectvol);
    $row = $result->fetch();
    $list_type = $row['volume_name'];
    $options = explode(' ', $list_type);
    $type = $options[0];
    $_SESSION['productids'][] = $product_id;
if(!isset($_SESSION['cart'][$product_id])){

 $_SESSION['cart'][$product_id] = array(
    'name' => $product_name,
    'image' => $product_image,
    'category' =>$category_id,
    'volume' => $type,
    'quantity' =>0
 );
//  $productIds = array();
//  $productIdsArray = explode(",", $productIdsString);
//  foreach ($_SESSION['cart'] as $product_id => $product_details) {
//     $productIds = $product_id;
//  }

//  foreach ($productIds as $productId) {
//     echo "Product ID: $productId<br>";
    
// }
$cartsproducts = '<div class="cartItems" id="cartItems">
 <div class="title">
     <span class="total-added">';
$cartsproducts .='</span>Product Added
 <div class="horizontal-line"></div>
 </div>
 
 <div class="allcards">';
 foreach ($_SESSION['cart'] as $product_id => $product_details) {
    $cartsproducts .= '<div class="cart-product" >
        <div class="cart-product-image">
            <img src="admin/images/products/' . $product_details['image'] . '" alt="product-image" style="height:24px;width:24px">
        </div>
        <div class="cart-product-name">' . $product_details['name'] . '</div>
        <span><a href="javascript:void(0);" onclick="deleteProduct(' . $product_id . ', ' . $product_details['category'] . ')" class="delete-product" style="color:#94a3bb" data-product-id="' . $product_id . '" data-category-id="' . $product_details['category'] . '"><i class="fa fa-trash"></i></a></span>
    </div>
    <div class="hr-line"></div>';
   
 }
 $cartsproducts .= '</div>
 <a href="cart.php" class="qoutation btn text-decoration-none text-white mb-2 mt-1" style="background-color:#078586;width:90%;">Get Quotation
     &nbsp;&nbsp;></a>
 </div>';

$responseData = array(
    'status' => 'success',
    'message' => 'Product added to cart successfully',
    'cart_count' => count($_SESSION['cart']),
    'cartsproducts' => $cartsproducts
);
// Send the JSON-encoded response
echo json_encode($responseData);
}

// var_dump($_SESSION['cart']);
// Redirect back to the product listing page
// header("Location: products.php?id=" . $category_id);

}

if (isset($_POST['action'])&& $_POST['action']=="remove-from-cart" && isset($_POST['product_id'])) 
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category']; // Corrected the variable name

// Check if the product exists in the cart
if (isset($_SESSION['cart'][$product_id])) {

    // Remove the product from the cart
    unset($_SESSION['cart'][$product_id]);
}


$cartsproducts = '<div class="cartItems" id="cartItems">
 <div class="title">
     <span class="total-added">';

    
 
 $cartsproducts .= '</span>Product Added
     <div class="horizontal-line"></div>
 </div>
 
 <div class="allcards">';
 foreach ($_SESSION['cart'] as $product_id => $product_details) {
     $cartsproducts .= '<div class="cart-product" >
         <div class="cart-product-image">
             <img src="admin/images/products/' . $product_details['image'] . '" alt="product-image" style="height:24px;width:24px">
         </div>
         <div class="cart-product-name">' . $product_details['name'] . '</div>
         <span><a href="javascript:void(0);" onclick="deleteProduct(<?php echo $product_id; ?>, <?php echo $category_id; ?>);" class="delete-product" style="color:#94a3bb" data-product-id="' . $product_id . '" data-category-id="' . $category_id . '"><i class="fa fa-trash"></i></a></span>
     </div>
     <div class="hr-line"></div>';
 }
 $cartsproducts .= '</div>
 <a href="cart.php" class="qoutation btn text-decoration-none text-white mb-2 mt-1" style="background-color:#078586;width:90%;">Get Quotation
     &nbsp;&nbsp;></a>
 </div>';

$responseData = array(
    'status' => 'success',
    'message' => 'Product added to cart successfully',
    'cart_count' => count($_SESSION['cart']),
    'cartsproducts' => $cartsproducts
);

// Send the JSON-encoded response
echo json_encode($responseData);
// Redirect back to the product listing page


}

if (isset($_POST['action']) && $_POST['action'] == "delete" && isset($_POST['id']) && isset($_POST['category'])) {
    $product_id = $_POST['id'];
    $category_id = $_POST['category'];

    if (isset($_SESSION['cart'][$product_id])) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$product_id]);
       
        $responseData = array(
            'status' => 'success',
            'message' => 'Product deleted from cart successfully',
            'cart_count' => count($_SESSION['cart']),
        );
        // Send the JSON-encoded response
        echo json_encode($responseData);
    } else {
        echo "error"; // Return an error message if the product is not found in the cart
    }
}
if(isset($_GET['del-id'])){
$product_id = $_GET['del-id'];


if (isset($_SESSION['cart'][$product_id])) {
// Remove the product from the cart
unset($_SESSION['cart'][$product_id]);
}

header("Location: cart.php");
}

if(isset($_POST['mod_qty'])){
echo $_POST['mod_qty'];

    foreach($_SESSION['cart'] as $product_id => $product_details){
        if($product_details['name'] == $_POST['product_name']){
        $_SESSION['cart'][$product_id]['quantity'] = $_POST['mod_qty'];
        }

        header("Location: cart.php");
}
}

if(isset($_POST['mod_type'])){
    echo $_POST['mod_type'];
    
        foreach($_SESSION['cart'] as $product_id => $product_details){
            if($product_details['name'] == $_POST['product_name']){
            $_SESSION['cart'][$product_id]['volume'] = $_POST['mod_type'];
            }
    
    }
    
    header("Location: cart.php");

}
?>