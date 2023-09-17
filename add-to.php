<!DOCTYPE html>
<html lang="en-US">

<?php


    // Step 1: Start the PHP session
    session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Step 3: Process the form data
    $name = $_POST['product_name'];
    $email = $_POST['email'];

    // Step 4: Set the session array
    $_SESSION['user_data'] = array(
        'name' => $name,
        'email' => $email
    );

    // Redirect to another page or do further processing
    header("Location: welcome.php");
    exit;
}

include 'head.php';

$category_id = $_GET['id'];

$stmt = $db->query("SELECT  COUNT(*) AS total , tbl_categories.category_name  AS category_name FROM tbl_product JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id WHERE tbl_product.category_id = $category_id ");
$row = $stmt->fetch(PDO::FETCH_OBJ);





?>

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
            <!-- <div class="preloader-wrap">
                <div class="preloader" style="background-image:url(assets/images/preloader.gif)">
                </div>
                <div class="overlay"></div>
            </div> -->
            <!----preloader end----->
            <!----header----->
            <?php include 'header.php'; ?>
            <!----header end----->
            <div class="page_header_default style_one ">
                <div class="parallax_cover">
                    <img src="assets/images/page-header-default.jpg" alt="bg_image" class="cover-parallax">
                </div>
                <div class="page_header_content">
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner_title_inner">
                                    <div class="title_page">
                                        <?php echo $row->category_name ; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="home1.php">Home</a> </li>
                                        <li><a href="product.php">Product Category</a></li>
                                        <li class="active"> <?php echo $row->category_name ; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===============PAGE CONTENT==============-->
            <!--===============PAGE CONTENT==============-->
            <div id="content" class="site-content">

                <div class="container-lg card shadow mt-5 mb-5 py-3">
                    <div class="row p-2">
                        <div class="col">
                            <h4 class="d-flex text-capitalize"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;
                                <?php echo $row->category_name ;?>
                            </h4>
                            <span class="text-capitalize">(<?php echo $row->total ?> product are available)</span>
                        </div>
                    </div>

                    <div class="row container-card-cart">
                        <div class="col-lg-9 col-md-6">
                            <div class="row">
                                <?php 
                            $stmt2 = $db->query("SELECT tbl_product.* , tbl_product.id as pid, tbl_categories.category_name  AS category_name FROM tbl_product JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id WHERE tbl_product.category_id = $category_id ");
                            $rows = $stmt2->fetchAll(PDO::FETCH_OBJ);
                                foreach($rows as $row){
                            
                                    
                           ?>
                                <form action="add-to.php" method="post" class="col-md-6 col-lg-3 categories-card">

                                    <div class="card shadow p-2 ">

                                        <div class="d-flex justify-content-center align-content-center"
                                            style="background-color:#f0fafa ;">
                                            <img src="../admin/images/products/<?php echo $row->product_image; ?>"
                                                class="card-img-top p-2 img-fluid broder border-3 rounded-2 "
                                                style="height: 150; width: 100px" alt="Image Alt Text">
                                            <input type="hidden" name="img" value="<?php echo $row->product_image; ?>">
                                        </div>
                                        <div class="card-body text-center  p-0 px-4">
                                            <span
                                                class="card-text d-flex product-title justify-content-around text-capitalize"
                                                style="height:30px"><?php echo $row->product_name; ?></span>
                                            <input type="hidden" name="product_name"
                                                value="<?php echo $row->product_name; ?>">
                                        </div>
                                        <!-- ... Your product listing code ... -->
                                        <!-- <a href="#" class="btn text-decoration-none mt-4 text-white mb-2 product-cat"
                                                style="background-color:#078586;width:90%;"
                                                onclick="addToCart(<?php echo $row->pid; ?>, '<?php echo $row->product_name; ?>')">Add
                                                To Cart</a> -->
                                        <!-- ... Rest of your product listing code ... -->
                                        <input type="submit" class="btn text-decoration-none mt-4 text-white mb-2 product-cat"
                                            style="background-color:#078586;width:90%;" value="add to Cart">
                                        <!-- ... add product in cart ... -->

                                    </div>

                                </form>
                                <?php
                           
                           } ?>
                            </div>

                        </div>

                        <div class="col-lg-3 product-cart col-md-6">
                            <div class="row">
                                <div class="col-12 col-lg-12 add-card py-2 px-0 ">
                                    <div
                                        class="card shadow p-2 px-0 product-add-card d-flex justify-content-between flex-column">
                                        <div class="col-12 title p-0">
                                            <span
                                                class="total-added"><?php if(isset($_SESSION['total-product'])){ echo $_SESSION['total-product']; }else{ echo "0"; }  ?></span>
                                            Product Added
                                            <div class="horizontal-line"></div>
                                        </div>
                                        <?php if(isset($_SESSION['add-product'])){ ?>
                                        <div class="allcards flex-grow-1" style="overflow-y: scroll;">
                                            <?php  ?>
                                            <div class="cards d-flex justify-content-between align-items-center" style="padding:5px 12px;
                                                ">
                                                <img src="../admin/images/products/coated-coils.png" alt="product-image"
                                                    style="height:40px;width:40px">
                                                <div class="d-inline title flex-grow-1"
                                                    class=" color: #475569;font-size: 13px;text-overflow: ellipsis; white-space: nowrap; overflow:hidden;flex-grow: 1;">
                                                    title</div>
                                                <span><i class="fa fa-trash"></i></span>

                                            </div>
                                            <div class="horizontal-line mt-0 m-3"></div>
                                            <div class="cards d-flex justify-content-between align-items-center" style="padding:5px 12px;
                                                ">
                                                <img src="../admin/images/products/coated-coils.png" alt="product-image"
                                                    style="height:40px;width:40px">
                                                <div class="d-inline title flex-grow-1"
                                                    class=" color: #475569;font-size: 13px;text-overflow: ellipsis; white-space: nowrap; overflow:hidden;flex-grow: 1;">
                                                    title</div>
                                                <span><i class="fa fa-trash"></i></span>

                                            </div>
                                            <div class="horizontal-line mt-0 m-3"></div>
                                        </div>
                                        <button type="button"
                                            class="qoutation btn text-decoration-none text-white mb-2 mt-1"
                                            style="background-color:#078586;width:90%;">Get Qoutation
                                            &nbsp;&nbsp;></button>
                                        <?php }else{?>
                                        <div class="flex-grow-1 card-info">
                                            <div class="cards d-flex flex-column align-items-center" style="padding:5px 12px;
                                                ">
                                                <i class="fa fa-cart-plus" style="font-size: 40px; color:#e2e8f0;"></i>
                                                <div class="no-card text-center" style="padding:5px 12px ">
                                                    No Products added in the cart.
                                                    Add products to proceed
                                                </div>
                                            </div>

                                        </div>
                                        <?php }?>

                                    </div>
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
                            <input type="search" class="search" placeholder="Search..." value="" name="s"
                                title="Search" />
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


                                <form class="contact-form" method="post"
                                    action="https://themepanthers.com/html/creote-html/sendemail.php">
                                    <p>
                                        <label> Your name<br />
                                            <input type="text" name="name" value="" size="40" aria-required="true"
                                                aria-invalid="false" placeholder="Enter Your Name" />
                                            <br />
                                            <i class="fa fa-user"></i><br />
                                        </label>
                                    </p>
                                    <p><label> Your email<br />
                                            <input type="email" name="email" value="" size="40" aria-required="true"
                                                aria-invalid="false" placeholder="Enter Your Email" />
                                            <br />
                                            <i class="fa fa-envelope"></i><br />
                                        </label>
                                    </p>
                                    <p>
                                        <label> Subject<br />
                                            <input type="text" name="subject" value="" size="40" aria-required="true"
                                                aria-invalid="false" placeholder="Enter Your Subject" />
                                            <br />
                                            <i class="fa fa-folder"></i><br />
                                        </label>
                                    </p>
                                    <p>
                                        <label> Your message (optional)<br />
                                            <textarea name="message" cols="40" rows="10"
                                                class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                                                placeholder="Enter Your Message"></textarea>
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
                                                <img width="852" height="812" src="assets/images/blog/blog-image-9.jpg"
                                                    class="main_img wp-post-image" alt="img" />
                                            </a>
                                        </div>
                                        <div class="modal_post_grid">
                                            <a href="blog-single.html">
                                                <img width="852" height="812" src="assets/images/blog/blog-image-8.jpg"
                                                    class="main_img wp-post-image" alt="img" />
                                            </a>
                                        </div>
                                        <div class="modal_post_grid">
                                            <a href="blog-single.html">
                                                <img width="852" height="812" src="assets/images/blog/blog-image-7.jpg"
                                                    class="main_img wp-post-image" alt="img" />
                                            </a>
                                        </div>
                                        <div class="modal_post_grid">
                                            <a href="blog-single.html">
                                                <img width="852" height="812" src="assets/images/blog/blog-image-6.jpg"
                                                    class="main_img wp-post-image" alt="img" />
                                            </a>
                                        </div>
                                        <div class="modal_post_grid">
                                            <a href="blog-single.html">
                                                <img width="852" height="812" src="assets/images/blog/blog-image-5.jpg"
                                                    class="main_img wp-post-image" alt="img" />
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
    <!---========================== javascript ==========================-->
</body>


</html>