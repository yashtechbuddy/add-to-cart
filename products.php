<!DOCTYPE html>
<html lang="en-US">

<?php

if (!isset($_GET['id'])) {

    echo '<script type="text/javascript">window.location.href = "product.php";</script>';
}

include 'head.php';


$category_id = $_GET['id'];

$stmt = $db->query("SELECT  COUNT(*) AS total , tbl_categories.category_name  AS category_name FROM tbl_product JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id WHERE tbl_product.category_id = $category_id AND visibility_id=1 ");
$row = $stmt->fetch(PDO::FETCH_OBJ);



if (isset($_SESSION['cart'])) {
    $count = COUNT($_SESSION['cart']);
}

?>

<style>
    @media (min-width: 992px) {
        .product {
            flex: 0 0 20%;
            /* Set to 20% width */
            max-width: 20%;
            /* Set to 20% width */
            padding-right: 0px;

        }
    }
</style>

<style>

@media (max-width: 767px){
.homeCardWrapper {
    padding: 20px 14px;
}
}
.homeCardWrapper {
    position: relative;
    height: 100%;
    padding: 20px;
    border: 1px solid #f1f5f9;
    border-radius: 4px;
    margin-bottom: 20px;
}
.crumbList .backBtn, .homeCardWrapper {
    background: var(--white);
    box-shadow: 0 1px 2px rgba(16,24,40,.05);
}
    .grid-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        height: fit-content;
        flex-grow: 1;
        gap: 16px 10px;
    }
    .cartItems.noData .text span{
        padding-left:20px;
    }
    .productsContent .cartProducts .title {
        padding-top: 6px;
        color: #334155;
        font-size: 16px;
        font-weight: 600;
        line-height: 19px;

    }

    /* .grid-item {
  padding: 0 3px;
  text-align: center;
} */
    @media (max-width: 767px) {
        .grid-container {
            grid-template-columns: 1fr 1fr;
        }
    }

@media (max-width: 767px){
.ProductsDetail__titleBlock--tI6Qp h1 {
    font-size: 18px;
}
    }

    .catSubCount {
        position: absolute;
        top: -10px;
        left: 0;
        display: flex;
        width: 65px;
        height: 24px;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        padding: 3px 8px;
        border-radius: 14px;
        background-color: #06963c;
        color: #fff;
        font-size: 12px;
        font-weight: 500;
    }

    .productCard {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        /* height: 108px; */
    }

    .sub-container {
        padding: 20px;
    }

    .productsContent {
        display: flex;
        margin:  15px auto;
        gap: 25px;
    }

    .cartProductsOverlay {
        min-width: 235px;
    }

    .cartProducts {
        position: sticky;
        top: 80px;
        border: 1px solid lightgray;
        border-radius: 8px;
        background: white;
        box-shadow: 0 1px 2px rgba(16, 24, 40, .05);
    }

    /* var(--neutral-light4) */
    .cartItems {
        display: flex;
        max-width: 230px;
        height: calc(60vh - 35px);
        flex-direction: column;
        justify-content: space-between;
        border-radius: 6px;
    }

    .cartItems.noData {
        min-height: 230px;
        justify-content: flex-start;
    }

    .cartItemInfo {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 90px;
        color: #e2e8f0;
    }
    .cartItems.noData .text {
    max-width: 80%;
    margin-top: 20px;
    color: #94a3b8;
    font-size: 12px;
    font-weight: 400;
}

.allcards{
    flex-grow: 1;
  padding: 0 0 20px;
  overflow-x: hidden;
  overflow-y: scroll;
}
.cart-product{
    display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px;
  background: #fff;
  gap: 12px;
}

.cart-product-image{
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid #f1f5f9;
  border-radius: 50px;
  background: #f1f5f9;
}
.cart-product-name{
    overflow: hidden;
  flex-grow: 1;
  color: #475569;
  font-size: 13px;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.hr-line{
    border-top: 1px solid #e2e8f0;
  margin: 0 10px;
}

@media (max-width: 767px){
.productsContent .cartProductsOverlay .cartProducts {
    z-index: 3;
    bottom: 0px;
    left: 0;
    width: 100%;
    padding-bottom: 20px;
    border-color:#e2e8f0;
    background: #fff;
}
}
@media (max-width: 767px){
.productsContent .cartProducts {
    position: fixed;
    z-index: 2;
    top: auto;
    bottom: 90px;
    left: 4px;
    width: calc(100% - 8px);
}
}

@media (max-width: 767px){
.productsContent .cartProductsOverlay .cartProducts .cartItems .title {
    margin-bottom: 10px;
}
}
@media (max-width: 767px){
.ProductsDetail__title {
    font-size: 18px !important;
}
}

.main-container{
    width: 100% !important;
    max-width: 1220px !important;
    padding: 0 20px !important;
    margin: 0 auto !important;
}
.ProductsDetail__title  {
    margin: 0 !important;
    color: black !important;
    font-size: 20px ;
    font-weight: 600 !important;
    line-height: 27px !important;   
    font-family: Arial, sans-serif !important;
    text-transform: capitalize;
}


@media (max-width: 767px){
 .ProductsDetail__subHeading {
    font-size: 12px;
}
}
@media (max-width: 767px){
.main-container {
    padding: 0 12px !important;
}
}

@media (max-width: 767px){
    .mobile-hide,.cartItems.noData{
 display: none;
}
}



</style>

<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">


        <div id="wrapper_full" class="content_all_warpper">
            <!----page-header----->
            <!-- <div class="mini_cart_togglers fixed_cart">
                <div class="mini-cart-count">
                    0
                </div>
                <i class="icon-shopping-cart"></i>
            </div> -->
            <!----preloader----->
            <div class="preloader-wrap">
                <div class="preloader" style="background-image:url(assets/images/preloader.gif)">
                </div>
                <div class="overlay"></div>
            </div>
            <!----preloader end----->
            <!----header----->
            <?php include 'header.php'; ?>
            <!----header end----->
            
            <!--===============PAGE CONTENT==============-->
            <!--===============PAGE CONTENT==============-->
            
                       
           
            <div id="" class="main-container" >
                 <div class="row">
                            <div class="">
                                <div class="">
                                    <ul class="">
                                        <a href="index.php" style="color:#64748b">Home</a><span>/<span>
                                        <a href="product.php" style="color:#64748b">Products</a><span>/<span>
                                        <?php echo $row->category_name ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <div class="container-lg card shadow  mb-5 sub-container homeCardWrapper " >
                    <div class="row ">
                        <div class="col" style="margin-bottom:10px;padding:0px;">
                            <h1 class="ProductsDetail__title">
                                <?php echo $row->category_name ?> For Quotation
                            </h1>
                            <span class="text-capitalize ProductsDetail__subHeading">(<?php echo $row->total; ?> product are available)</span>
                        </div>
                    </div>

                    <div class="productsContent">
                        <div class="grid-container">
                            <?php
                            
                            $stmt2 = $db->query("SELECT tbl_product.* , tbl_product.id as pid, tbl_categories.category_name  AS category_name FROM tbl_product JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id WHERE tbl_product.category_id = $category_id AND visibility_id = 1  ");
                            $rows = $stmt2->fetchAll(PDO::FETCH_OBJ);
                            foreach ($rows as $row) {


                            ?>
                                <div class="card shadow p-2 " id="product">

                                  <input type="hidden" name="ajax_request" value="1">
                                    <div class="catSubCount <?php if (!isset($_SESSION['cart'][$row->pid])) {
                                                                echo "d-none";
                                                            } ?> ">Added</div>
                                    <div class="d-flex justify-content-center align-content-center" style="background-color:#f0fafa ;margin-bottom: 8px;">

                                        <img src="admin/images/products/<?php echo $row->product_image; ?>" class="card-img-top p-2 img-fluid broder border-3 rounded-2 " style=" width: 100px" alt="Image Alt Text">
                                        <input type="hidden" name="img" value="<?php echo $row->product_image; ?>">
                                        <input type="hidden" name="volume" value="<?php echo $row->volume_id; ?>">
                                        <input type="hidden" name="product_id" value="<?php $product_id =  $row->pid;
                                                                                        echo $product_id; ?>">
                                        <input type="hidden" name="category" value="<?php echo $row->category_id; ?>">
                                    </div>

                                    <span class="card-text d-flex product-title justify-content-around text-capitalize" style="flex-grow: 1;
                                                                padding: 10px 5px;
                                                                color: #334155;
                                                                font-size: 14px;
                                                                font-weight: 500;
                                                                line-height: 16px;
                                                                text-align: center;">

                                        <?php
                                        $text = $row->product_name;
                                      
                                        echo $text;
                                        ?>
                                    </span>
                                    <input type="hidden" name="product_name" value="<?php echo $row->product_name; ?>">


                                    <!-- ... Your product listing code ... -->
                                    <!-- <a href="#" class="btn text-decoration-none mt-4 text-white mb-2 product-cat"
                                                style="background-color:#078586;width:90%;"
                                                onclick="addToCart(<?php $row->pid; ?>, '<?php echo $row->product_name; ?>')">Add
                                                To Cart</a> -->
                                    <!-- ... Rest of your product listing code ... -->
                                   
                                        <input type="button" 
                                        name="<?php if (isset($_SESSION['cart'][$row->pid])) { echo "remove-from-cart";  } else { echo "add-to-cart"; }  ?>" 
                                        class="btn text-decoration-none  text-white mb-2 <?php if (isset($_SESSION['cart'][$row->pid])) { echo "product-cat-remove";  } else { echo "product-cat"; }  ?>" 
                                        style="background-color:transparent !important;height:30px; line-height: 2px !important; font-size: 13px !important;cursor: pointer;" 
                                        value="<?php if (isset($_SESSION['cart'][$row->pid])) { echo "Remove";  } else { echo "Add to Cart"; }  ?>">
                                    
                                        <!-- <input type="submit" name="add-to-cart" class="btn text-decoration-none text-white mb-2 product-cat" style="background-color:transparent !important; height:30px; line-height: 2px !important; font-size: 13px !important;" value="Add to Cart"> -->
                                    

                                    <!-- ... add product in cart ... -->



                                </div>
                                  
                            <?php

                            } ?>
                        </div>

                        <div class="cartProductsOverlay ">
                            <div class="cartProducts  <?php if ($count == 0) { echo "mobile-hide"; }?>" id="cartProducts">
                            <!-- mob-view -->
                                <div class="launchBtn">
                                    <button class="btn cartBtn">
                                        <?php echo $count ?> Product Added   
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"></path>
                                        </svg>                     
                                    </button>
                                    <button type="button" class="btn mobquotation "  style="background-color: #078586; font-size: 14px;">Ask Quotation </button>
                              
                                </div>
                                <?php if (isset($count) and $count > 0) {  ?>
                                    <div class="cartItems" id="cartItems">
                                        <div class="title">
                                            <span class="total-added"><?php if (isset($count) and $count > 0){
                                                                            echo $count;
                                                                        } else {
                                                                            echo "0";
                                                                        }  ?></span>Product Added
                                            <div class="horizontal-line"></div>
                                        </div>

                                        <div class="allcards">
                                           
                                            <div class="totalProductsAdded">
                                            <button type="button" class="btn-base">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                                </svg>
                                            </button>                                                                  
                                            </div>
                                            <?php foreach ($_SESSION['cart'] as $product_id => $product_details) : ?>


                                                <div class="cart-product">
                                                    <div class="cart-product-image">
                                                       <img src="admin/images/products/<?php echo $product_details['image'] ?>" alt="product-image" style="height:24px;width:24px">
                                                    </div>
                                                    <div class="cart-product-name">
                                                        <?php echo $product_details['name'] ?>
                                                    </div>
                                                    <span>
                                                        <a href="javascript:void(0);" onclick="deleteProduct(<?php echo $product_id; ?>, <?php echo $category_id; ?>);"class="delete-product" style="color:#94a3bb" data-product-id="<?php echo $product_id; ?>" data-category-id="<?php echo $category_id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="hr-line"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <a href="cart.php" class="qoutation btn text-decoration-none text-white mb-2 mt-1" style="background-color:#078586;width:90%;">Get Quotation
                                            &nbsp;&nbsp;></a>

                                    </div>
                                <?php } else { ?>
                                    <div class="cartItems noData">
                                        <div class="title">
                                            <span class="total-added">0</span>Product Added
                                            <div class="horizontal-line"></div>
                                        </div>
                                        <div class="cartItemInfo">
                                                <i class="fa fa-cart-plus" style="font-size: 30px; color:#e2e8f0;"></i>
                                                <div class="text">
                                                No Products added in the cart.
                                                <br>
                                                    <span>Add products to proceed</span>
                                                </div>
                                          

                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
        <!--===============PAGE CONTENT==============-->
        <!--===============PAGE CONTENT==============-->
    </div>
    <!---==============footer start =================-->
    <?php include 'footer.php'; ?>
    <!---==============footer end =================-->
    <!---==============mobile menu =================-->
    <div class="crt_mobile_menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="close-btn"><i class="icon-close"></i></div>
            <!-- <form role="search" method="get" action="#">
                        <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
                        <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
                    </form> -->
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div>
    <!---==============mobile menu end =================-->
    <!---==============search popup =================-->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><i class="fa fa-times"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <fieldset>
                    <form role="search" method="get" action="#">
                        <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
                        <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <!---==============search popup end =================-->
    <!---==============modal popup =================-->
    <div class="modal_popup one">
        <div class="modal-popup-inner">
            <div class="close-modal"><i class="fa fa-times"></i></div>
            <div class="modal_box">
                <div class="row">
                    <div class="col-lg-5 col-md-12 form_inner">
                        <div class="form_content">


                            <form class="contact-form" method="post" action="https://themepanthers.com/html/creote-html/sendemail.php">
                                <p>
                                    <label> Your name<br />
                                        <input type="text" name="name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" />
                                        <br />
                                        <i class="fa fa-user"></i><br />
                                    </label>
                                </p>
                                <p><label> Your email<br />
                                        <input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" />
                                        <br />
                                        <i class="fa fa-envelope"></i><br />
                                    </label>
                                </p>
                                <p>
                                    <label> Subject<br />
                                        <input type="text" name="subject" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Subject" />
                                        <br />
                                        <i class="fa fa-folder"></i><br />
                                    </label>
                                </p>
                                <p>
                                    <label> Your message (optional)<br />
                                        <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Enter Your Message"></textarea>
                                        <br />
                                        <i class="fa fa-comments"></i><br />
                                    </label>
                                </p>
                                <p><input type="submit" value="Submit" /></p>

                            </form>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 about_company_inner">
                        <div class="abt_content">
                            <div class="logo">
                                <img src="assets/images/logo-default.png" alt="img" class="company_logo_modal">
                            </div>
                            <div class="text">
                                <p> The great explorer of the truth, the master-builder of human happiness no
                                    one
                                    rejects
                                    dislikes avoids pleasure itself because it is pleasure but because know who
                                    do
                                    not those
                                    how to pursue pleasures rationally encounter consequences that are extremely
                                    painful
                                    desires to obtain.</p>
                                <a href="#">Read More</a>
                            </div>
                            <div class="post_contet_modal">
                                <h2> Latest News</h2>
                                <div class="post_enable">
                                    <div class="modal_post_grid">
                                        <a href="blog-single.html">
                                            <img width="852" height="812" src="assets/images/blog/blog-image-9.jpg" class="main_img wp-post-image" alt="img" />
                                        </a>
                                    </div>
                                    <div class="modal_post_grid">
                                        <a href="blog-single.html">
                                            <img width="852" height="812" src="assets/images/blog/blog-image-8.jpg" class="main_img wp-post-image" alt="img" />
                                        </a>
                                    </div>
                                    <div class="modal_post_grid">
                                        <a href="blog-single.html">
                                            <img width="852" height="812" src="assets/images/blog/blog-image-7.jpg" class="main_img wp-post-image" alt="img" />
                                        </a>
                                    </div>
                                    <div class="modal_post_grid">
                                        <a href="blog-single.html">
                                            <img width="852" height="812" src="assets/images/blog/blog-image-6.jpg" class="main_img wp-post-image" alt="img" />
                                        </a>
                                    </div>
                                    <div class="modal_post_grid">
                                        <a href="blog-single.html">
                                            <img width="852" height="812" src="assets/images/blog/blog-image-5.jpg" class="main_img wp-post-image" alt="img" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="copright">
                                © 2023 Creote. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---==============modal popup end=================-->
    <!---==============cart=================-->
    <div class="side_bar_cart" id="mini_cart">
        <div class="cart_overlay"></div>
        <div class="cart_right_conten">
            <div class="close">
                <div class="close_btn_mini"><i class="icon-close"></i></div>
            </div>
            <div class="cart_content_box">
                <div class="contnet_cart_box">
                    <div class="widget_shopping_cart_content">
                        <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---==============cart=================-->

    </div>
    <!-- Back to top with progress indicator-->
    <div class="prgoress_indicator">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!---========================== javascript ==========================-->
    <?php include 'scripts.php' ?>
    
    <!-- ajax -->
<script>
        $(document).ready(function () {
            $(".btn-base").on("click",  function () {
                $(".cartItems").removeClass("show");
                $(".launchBtn").removeClass("d-none")
            });
            
            $(".cartBtn").on("click", function () {
                
                $(".cartItems").addClass("show");
                $(".launchBtn").addClass("d-none");
            });

            // Add click event to delete-product links
            // function(){}
            // $(".allcards").on("click", ".delete-product", function () {
            //     var productId = $(this).data("product-id");
            //     var categoryId = $(this).data("category-id");
            //     var deleteLink = $(this);
            //         console.log(productId,categoryId);
            //         console.log("Event binding for delete-product is active.");

            //     // Send an AJAX request to delete the product
            //     $.ajax({
            //         type: "POST", // or "GET" depending on your backend implementation
            //         url: "add-to-cart.php", // Change this to the URL that handles deletion
            //         data: {
            //             id: productId,
            //             category: categoryId,
            //             action: "delete"
            //         },
            //         success: function (response) {
            //             // Handle success response here, e.g., remove the deleted product from the DOM
            //             if (response === "success") {
            //                 // Assuming you want to remove the entire cart-product div
            //                 deleteLink.closest(".cart-product").remove();
            //                 // Update the cart total or any other relevant UI updates
            //             } else {
            //                 alert("Failed to delete the product.");
            //             }
            //         },
            //         error: function () {
            //             alert("An error occurred while processing your request.");
            //         }
            //     });
            // });
            $(".product-cat, .product-cat-remove,.delete-product,.fa ,.fa-trash").on("click", function () {
                
                var clickedClass = $(this).attr("class");
                console.log(clickedClass);

                if (clickedClass.includes("product-cat") || clickedClass.includes("product-cat-remove") ) {
                        // The "product-cat" class is selected
                        console.log("Product Category Selected");
                        var card = $(this).closest(".card");
                        var productId = $(this).closest(".card").find('input[name="product_id"]').val();
                        var category = $(this).closest(".card").find('input[name="category"]').val();
                        var img = $(this).closest(".card").find('input[name="img"]').val();
                        var volume = $(this).closest(".card").find('input[name="volume"]').val();
                        var volume = $(this).closest(".card").find('input[name="volume"]').val();
                        var product_name = $(this).closest(".card").find('input[name="product_name"]').val();
                        var action = $(this).attr("name");

                        // console.log("Product ID:", productId);
                        // console.log("Product Name:", product_name);
                        // console.log("Category:", category);
                        // console.log("Image:", img);
                        // console.log("volume:", volume);
                        // console.log("Action:", action);

                        $.ajax({
                    type: "POST",
                    url: "add-to-cart.php",
                    data: {
                        ajax_request: 1,
                        product_id: productId,
                        product_name: product_name,
                        category: category,
                        img : img,
                        volume : volume,
                        action: action
                    },
                    success: function (response) {
                        // Handle the AJAX response here
                        // console.log("AJAX Response:", response); // Log the response for debugging
                        if (action === "add-to-cart") {
                        // Product added to cart successfully
                        // alert("Product added to cart!");
                        var responseData = JSON.parse(response);
                        // Change button text and show the "Added" label
                        card.find('.btn').val("Remove");
                        card.find('.catSubCount').removeClass("d-none");
                        // For example, you can display a success message
                        card.find('.btn').attr("name","remove-from-cart")
                        card.find('.btn').addClass("product-cat-remove");  
                        card.find('.btn').removeClass("product-cat");      
                        // Optionally, you can update the cart count on the page
                        // Assuming you have an element with id "cart-count"
                        $(".total-added").text(responseData.cart_count);
                        // if (responseData.cart_count === 0) {
                        //         $(".cartProducts").html('<div class="cartItems noData">' +
                        //             '<div class="title">' +
                        //             '<span class="total-added">0</span>' +
                        //             'Product Added' +
                        //             '<div class="horizontal-line"></div>' +
                        //             '</div>' +
                        //             '<div class="cartItemInfo">' +
                        //             '<i class="fa fa-cart-plus" style="font-size: 30px; color:#e2e8f0;"></i>' +
                        //             '<div class="text">' +
                        //             'No Products added in the cart.' +
                        //             '<br/>' +
                        //             '<span>Add products to proceed</span>' +
                        //             '</div>' +
                        //             '</div>' +
                        //             '</div>');
                        //     }
                            
                            if (responseData.cart_count > 0) {
                                $(".cartProducts").html(responseData.cartsproducts);
                                $(".cartProducts").removeClass("mobile-hide");
                            
                            }
                            $(".total-added").text(responseData.cart_count);
                            $(".cartBtn").text(responseData.cart_count+" Product Added")
                        // console.log(responseData.cart_count);

                        }else{
                            // alert("Product remove from  cart!");
                            var responseData = JSON.parse(response);    
                            // Change button text and show the "Added" label
                            card.find('.btn').val("Add to Cart");
                            card.find('.btn').removeClass("product-cat-remove");
                            card.find('.btn').addClass("product-cat");
                            card.find('.catSubCount').addClass("d-none");

                            card.find('.catSubCount').addClass("d-none");
                            // For example, you can display a success message
                            card.find('.btn').attr("name","add-to-cart");
                            if (responseData.cart_count === 0) {
                                $(".cartProducts").removeClass("mobile-hide");
                                $(".cartProducts").addClass("mobile-hide");
                                $(".cartProducts").html('<div class="cartItems noData">' +
                                    '<div class="title">' +
                                    '<span class="total-added">0</span>' +
                                    'Product Added' +
                                    '<div class="horizontal-line"></div>' +
                                    '</div>' +
                                    '<div class="cartItemInfo">' +
                                    '<i class="fa fa-cart-plus" style="font-size: 30px; color:#e2e8f0;"></i>' +
                                    '<div class="text">' +
                                    'No Products added in the cart.' +
                                    '<br/>' +
                                    '<span>Add products to proceed</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');
                            }
                            
                            if (responseData.cart_count > 0) {
                                $(".cartProducts").html(responseData.cartsproducts);
                                $(".cartProducts").removeClass("mobile-hide");
                                

                            }
                            // Optionally, you can update the cart count on the page
                            // Assuming you have an element with id "cart-count"
                            $(".total-added").text(responseData.cart_count);
                            $(".cartBtn").text(responseData.cart_count+" Product Added")
                            // console.log(responseData.cart_count);
                                                }
                    },
                    error: function (error) {
                        // Handle any errors here
                        console.error("AJAX Error:", error);
                    }
                        });
                    } 
                    // else if (clickedClass.includes("delete-product")) {
                        // The "product-cat-remove" class is selected
                        
                        // console.log("Product Category Remove Selected");
                        // var productId = $(this).data("product-id");
                        // var categoryId = $(this).data("category-id");
                        // var deleteLink = $(this);
                        //     console.log(productId,categoryId);
                        //     console.log("Event binding for delete-product is active.");

                        // Send an AJAX request to delete the product
                        // $.ajax({
                        //         type: "POST", // or "GET" depending on your backend implementation
                        //         url: "add-to-cart.php", // Change this to the URL that handles deletion
                        //         data: {
                        //             id: productId,
                        //             category: categoryId,
                        //             action: "delete"
                        //         },
                        //         success: function (response) {
                        //             var responseDatas = JSON.parse(response);
                        //             // Handle success response here, e.g., remove the deleted product from the DOM
                        //             if (action == "delete") {

                        //                 var responseDatas = JSON.parse(response);  
                        //                 // Assuming you want to remove the entire cart-product div
                        //                 deleteLink.closest(".cart-product").remove();
                        //                 product_id = deleteLink.data("product-id");
                        //                 var closestCard = $('input[name="product_id"][value="' + productId + '"]').closest('.card');
                        //                 closestCard.find('.btn').val("Add to Cart");
                        //                 console.log(productId);
                        //                 closestCard.find('.btn').removeClass("product-cat-remove");
                        //                 closestCard.find('.btn').addClass("product-cat");
                        //                 closestCard.find('.catSubCount').addClass("d-none");

                        //                 closestCard.find('.catSubCount').addClass("d-none");
                        //                 // For example, you can display a success message
                        //                 closestCard.find('.btn').attr("name","add-to-cart");
                        //     if (responseDatas.cart_count === 0) {
                        //         $(".cartProducts").removeClass("mobile-hide");
                        //         $(".cartProducts").addClass("mobile-hide");
                        //         $(".cartProducts").html('<div class="cartItems noData">' +
                        //             '<div class="title">' +
                        //             '<span class="total-added">0</span>' +
                        //             'Product Added' +
                        //             '<div class="horizontal-line"></div>' +
                        //             '</div>' +
                        //             '<div class="cartItemInfo">' +
                        //             '<i class="fa fa-cart-plus" style="font-size: 30px; color:#e2e8f0;"></i>' +
                        //             '<div class="text">' +
                        //             'No Products added in the cart.' +
                        //             '<br/>' +
                        //             '<span>Add products to proceed</span>' +
                        //             '</div>' +
                        //             '</div>' +
                        //             '</div>');
                        //     }
                            
                        //     if (responseDatas.cart_count > 0) {
                        //         $(".cartProducts").html(responseDatas.cartsproducts);
                        //         $(".cartProducts").removeClass("mobile-hide");
                                

                        //     }
                        //     // Optionally, you can update the cart count on the page
                        //     // Assuming you have an element with id "cart-count"
                        //     $(".total-added").text(responseData.cart_count);
                        //     // console.log(responseData.cart_count);
                        //                 // Update the cart total or any other relevant UI updates
                        //             } else {
                        //                 alert("Failed to delete the product.");
                        //             }
                        //         },
                        //         error: function () {
                        //             alert("An error occurred while processing your request.");
                        //         }
                        // });
                    // }
                
              
            });
        });
function deleteProduct(productId, categoryId) {
    // Send an AJAX request to delete the product
    
    console.log("hello world");
    // var anchorTagLink = $(a["data-product-id="'+ productId+']["data-category-id"='+categoryId+']);
    var anchorTagLink = $('a[data-product-id="' + productId + '"][data-category-id="' + categoryId + '"]');

    console.log(anchorTagLink);
    $('input[name="product_id"][value="' + productId + '"]').closest('.card');
        //Send an AJAX request to delete the product
        action = "delete";
        $.ajax({
                                type: "POST", // or "GET" depending on your backend implementation
                                url: "add-to-cart.php", // Change this to the URL that handles deletion
                                data: {
                                    id: productId,
                                    category: categoryId,
                                    action: action
                                },
                                success: function (response) {
                                    var responseDatas = JSON.parse(response);
                                    // Handle success response here, e.g., remove the deleted product from the DOM
                                    if (action == "delete") {

                                        var responseDatas = JSON.parse(response);  
                                        console.log(responseDatas)
                                        // Assuming you want to remove the entire cart-product div
                                        anchorTagLink.closest(".cart-product").remove();
                                        product_id = anchorTagLink.data("product-id");
                                        var closestCard = $('input[name="product_id"][value="' + productId + '"]').closest('.card');
                                        closestCard.find('.btn').val("Add to Cart");
                                        console.log(productId);
                                        closestCard.find('.btn').removeClass("product-cat-remove");
                                        closestCard.find('.btn').addClass("product-cat");
                                        closestCard.find('.catSubCount').addClass("d-none");

                                        closestCard.find('.catSubCount').addClass("d-none");
                                        // For example, you can display a success message
                                        closestCard.find('.btn').attr("name","add-to-cart");
                            if (responseDatas.cart_count === 0) {
                                $(".cartProducts").removeClass("mobile-hide");
                                $(".cartProducts").addClass("mobile-hide");
                                $(".cartProducts").html('<div class="cartItems noData">' +
                                    '<div class="title">' +
                                    '<span class="total-added">0</span>' +
                                    'Product Added' +
                                    '<div class="horizontal-line"></div>' +
                                    '</div>' +
                                    '<div class="cartItemInfo">' +
                                    '<i class="fa fa-cart-plus" style="font-size: 30px; color:#e2e8f0;"></i>' +
                                    '<div class="text">' +
                                    'No Products added in the cart.' +
                                    '<br/>' +
                                    '<span>Add products to proceed</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');
                            }
                            
                            if (responseDatas.cart_count > 0) {
                                $(".cartProducts").html(responseDatas.cartsproducts);
                                $(".cartProducts").removeClass("mobile-hide");
                                

                            }
                            // Optionally, you can update the cart count on the page
                            // Assuming you have an element with id "cart-count"
                            $(".total-added").text(responseDatas.cart_count);
                            // console.log(responseData.cart_count);
                                        // Update the cart total or any other relevant UI updates
                                    } else {
                                        alert("Failed to delete the product.");
                                    }
                                },
                                error: function () {
                                    alert("An error occurred while processing your request.");
                                }
        });
}
    </script>

<script>
    // onclose click

    // Check the viewport width and add content if needed
    if (window.innerWidth >= 768 ) {
      var conditionalDiv = document.getElementById('cartProducts');
     var childElements = conditionalDiv.children;

        // Hide all child elements
        for (var i = 0; i < childElements.length; i++) {
            childElements[i].style.display = 'none';
        }
      var paragraph = document.createElement('p')
      paragraph.classList.add('actionBtns');
      paragraph.textContent = 'This content is added dynamically for screens wider than 768px.';
      conditionalDiv.appendChild(paragraph);
    }
  </script>

</body>


</html>