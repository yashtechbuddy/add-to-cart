<?php
include 'config.php';
session_start();
// echo $product_id = $_POST['product_id'];
// echo $category_id = $_POST['category']; // Corrected the variable name
// echo $product_name = $_POST['product_name'];
// echo $product_image = $_POST['img'];
// var_dump($_SESSION['cart']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
   
}

$_SESSION['count'] = COUNT($_SESSION['cart']);
// Assuming you have a product ID and name coming from the request, you can add them to the cart like this:
if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['img'])) {
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

if(!isset($_SESSION['cart'][$product_id])){

$_SESSION['cart'][$product_id] = 

array(
    'name' => $product_name,
    'image' => $product_image,
    'category' =>$category_id,
    'volume' => $type,
    'quantity' =>0
);
}

// var_dump($_SESSION['cart']);
// Redirect back to the product listing page
// header("Location: products.php?id=" . $category_id);
}

if(isset($_POST['addToCart'])){

}
if (isset($_POST['remove-from-cart']) && isset($_POST['product_id'])) 
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category']; // Corrected the variable name

// Check if the product exists in the cart
if (isset($_SESSION['cart'][$product_id])) {

    // Remove the product from the cart
    unset($_SESSION['cart'][$product_id]);
}

// Redirect back to the product listing page
header("Location: products.php?id=" . $category_id);

}

if(isset($_GET['id']) && isset($_GET['category'])){

$product_id = $_GET['id'];
$category_id = $_GET['category'];

if (isset($_SESSION['cart'][$product_id])) {
// Remove the product from the cart
unset($_SESSION['cart'][$product_id]);
}

header("Location: products.php?id=".$category_id);

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
