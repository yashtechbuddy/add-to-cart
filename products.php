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
            
                       
           
            <div id="content" class="site-content" style="width: 100%;
                                                         max-width: 1220px;
                                                         padding: 0 20px;
                                                         margin: 0 auto;">
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
                <div class="container-lg card shadow  mb-5 sub-container" >
                    <div class="row ">
                        <div class="col" style="margin-bottom:20px;padding:0px;">
                            <h1 class="" style="font-size: 20px;line-height: 27px;  font-weight: 600; font-family: Arial, sans-serif;">
                                <?php echo $row->category_name ?> For Quotation
                            </h1>
                            <span class="text-capitalize">(<?php echo $row->total; ?> product are available)</span>
                        </div>
                    </div>

                    <div class="productsContent">
                        <div class="grid-container">
                            <?php
                            $stmt2 = $db->query("SELECT tbl_product.* , tbl_product.id as pid, tbl_categories.category_name  AS category_name FROM tbl_product JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id WHERE tbl_product.category_id = $category_id AND visibility_id = 1  ");
                            $rows = $stmt2->fetchAll(PDO::FETCH_OBJ);
                            foreach ($rows as $row) {


                            ?>
                                <form action="add-to-cart.php" method="post" class="card shadow p-2 ">


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
                                        $maxLength = 25;
                                        // if (strlen($text) > $maxLength) {
                                        //     $text = substr($text, 0, $maxLength - 3) . '...';
                                        // }

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
                                   
                                        <input type="submit" name="<?php if (isset($_SESSION['cart'][$row->pid])) { echo "remove-from-cart";  } else { echo "add-to-cart"; }  ?>" class="btn text-decoration-none  text-white mb-2 <?php if (isset($_SESSION['cart'][$row->pid])) { echo "product-cat-remove";  } else { echo "product-cat"; }  ?>" style="background-color:transparent !important;height:30px; line-height: 2px !important; font-size: 13px !important;cursor: pointer;" value="<?php if (isset($_SESSION['cart'][$row->pid])) { echo "Remove";  } else { echo "Add to Cart"; }  ?>">
                                    
                                        <!-- <input type="submit" name="add-to-cart" class="btn text-decoration-none text-white mb-2 product-cat" style="background-color:transparent !important; height:30px; line-height: 2px !important; font-size: 13px !important;" value="Add to Cart"> -->
                                    

                                    <!-- ... add product in cart ... -->



                                </form>

                            <?php

                            } ?>
                        </div>




                        <div class="cartProductsOverlay ">
                            <div class="cartProducts">

                                <?php if (isset($count) and $count > 0) {  ?>
                                    <div class="cartItems">
                                        <div class="title">
                                            <span class="total-added"><?php if (isset($count) and $count > 0) {
                                                                            echo $count;
                                                                        } else {
                                                                            echo "0";
                                                                        }  ?></span>
                                            Product Added
                                            <div class="horizontal-line"></div>
                                        </div>

                                        <div class="allcards flex-grow-1" style="overflow-y: scroll;">
                                            <?php foreach ($_SESSION['cart'] as $product_id => $product_details) : ?>


                                                <div class="cards d-flex justify-content-between align-items-center" style="padding:5px 12px;
                                                ">
                                                    <img src="admin/images/products/<?php echo $product_details['image'] ?>" alt="product-image" style="height:40px;width:40px">
                                                    <div class="d-inline title flex-grow-1" class=" color: #475569;font-size: 13px;text-overflow: ellipsis; white-space: nowrap; overflow:hidden;flex-grow: 1;">
                                                        <?php echo $product_details['name'] ?></div>
                                                    <span><a href="add-to-cart.php?id=<?php echo $product_id; ?>&category=<?php echo $category_id ?>" class="text-decoration-none" style="color:#b9bdba"><i class="fa fa-trash"></i></a></span>
                                                </div>
                                                <div class="horizontal-line mt-0 m-3"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <a href="cart.php" class="qoutation btn text-decoration-none text-white mb-2 mt-1" style="background-color:#078586;width:90%;">Get Quotation
                                            &nbsp;&nbsp;></a>

                                    </div>
                                <?php } else { ?>
                                    <div class="cartItems noData">
                                        <div class="title">
                                            <span class="total-added"><?php if (isset($count) and $count > 0) {
                                                                            echo $count;
                                                                        } else {
                                                                            echo "0";
                                                                        }  ?></span>
                                            Product Added
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
    <script type="text/javascript">
        // function addToCart(productId, productName) {
        //     // AJAX request
        //     var xhr = new XMLHttpRequest();
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === 4) {
        //             if (xhr.status === 200) {
        //                 // Cart update successful, update the cart count
        //                 var cartCount = document.querySelector('.mini-cart-count');
        //                 cartCount.innerHTML = xhr.responseText;
        //             } else {
        //                 // Handle error
        //                 console.error('Error adding product to cart.');
        //                 console.log(<?php print_r($_SESSION['cart']) ?>)
        //             }
        //         }
        //     };

        //     xhr.open('POST', 'add-to-cart.php', true);
        //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     xhr.send('product_id=' + encodeURIComponent(productId) + '&product_name=' + encodeURIComponent(productName));
        // }
    </script>

    <!---========================== javascript ==========================-->
    <script>
    // jQuery AJAX to add product to cart
    $(".add-to-cart-btn").click(function() {
        var productId = $(this).data("product-id");
        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                product_id: productId,
                action: "add-to-cart"
            },
            success: function(data) {
                // Handle the response (e.g., update cart overlay)
            }
        });
    });

    // jQuery AJAX to remove product from cart
    $(".remove-from-cart-btn").click(function() {
        var productId = $(this).data("product-id");
        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                product_id: productId,
                action: "remove-from-cart"
            },
            success: function(data) {
                // Handle the response (e.g., update cart overlay)
            }
        });
    });
</script>
</body>


</html>