<!DOCTYPE html>
<html lang="en-US">

<?php
require 'admin/smtp/PHPMailerAutoload.php';
include 'head.php';
include 'is_user_set.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $autogenrated_id = $_POST['autogenrated_id'];
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $_FILES['attach-po'];
        if ($_FILES['attach-po']['size'] > 0) {
        $file = $_FILES['attach-po'];
        $imageName = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $fileSize = $file['size'];
        $targetDirectory = 'admin/images/customerpo/';
        
        
        $customer_po ="po_" . uniqid().$imageName;
        $targetPath = $targetDirectory . $imageName;
        move_uploaded_file($fileTmpPath, $targetPath);

        // Update the database record where autogenrated_id, product_id, and customer_id match
        $sql = "UPDATE tbl_inquiry  
                SET  cust_po = :image ,inquiry_status_id = 5
                WHERE autogenrated_id = :autogenrated_id AND product_id = :product_id AND customer_id = :customer_id ";

        $stmt = $db->prepare($sql);

        // Bind parameters
     
        $stmt->bindParam(':image', $imageName, PDO::PARAM_STR);
        $stmt->bindParam(':autogenrated_id', $autogenrated_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

        // Execute the query
        
        $stmt->execute();
        
        $sql = "UPDATE tbl_manage_inquiry  
                SET  cust_po = :image , status_id = 5
                WHERE inquiry_id = :autogenrated_id AND product_id = :product_id AND customer_id = :customer_id AND status_id NOT IN (6,7,8) ";

        $stmt = $db->prepare($sql);

        // Bind parameters
     
        $stmt->bindParam(':image', $imageName, PDO::PARAM_STR);
        $stmt->bindParam(':autogenrated_id', $autogenrated_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();
        
        $detail_query = $db->prepare("SELECT * FROM tbl_manage_inquiry WHERE inquiry_id = :autogenrated_id AND status_id  IN (3,5,4)");
        $detail_query->bindParam(':autogenrated_id', $autogenrated_id, PDO::PARAM_STR);
        $detail_query->execute();

        // Fetch the first row
        $inquiryDetails = $detail_query->fetch(PDO::FETCH_ASSOC);
        
        $imageName = $file['name'];
        $inquiry_id = $inquiryDetails['id'];
        $sup_id =  $inquiryDetails['supplier_id'];
        $cust_id =  $inquiryDetails['customer_id'];
        $assign_id =  $inquiryDetails['assign_id'];
        $product_id = $inquiryDetails['product_id'];
        $quantity = $inquiryDetails['quantity'];
        $volume_name = $inquiryDetails['volume_name'];
        $cust_amount = $inquiryDetails['cust_amount'];
        $sup_amount = $inquiryDetails['sup_amount'];
        // order insert query 
       $sqlorder = "INSERT INTO tbl_order (transection_id, sup_id, cust_id, assign_id, product_id, quantity, cust_amount, sup_amount, volume_name, cust_po) 
             VALUES (:transection_id, :sup_id, :cust_id, :assign_id, :product_id, :quantity, :cust_amount, :sup_amount, :volume_name, :cust_po)";

        $stmtu = $db->prepare($sqlorder);

        // Bind parameters
        $stmtu->bindParam(':transection_id', $autogenrated_id, PDO::PARAM_STR);
        $stmtu->bindParam(':sup_id', $sup_id, PDO::PARAM_INT);
        $stmtu->bindParam(':cust_id', $cust_id, PDO::PARAM_INT);
        $stmtu->bindParam(':assign_id', $assign_id, PDO::PARAM_INT);
        $stmtu->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmtu->bindParam(':quantity', $volume_name, PDO::PARAM_STR); // Assuming  quantity should be a string
        $stmtu->bindParam(':cust_amount', $cust_amount, PDO::PARAM_INT);
        $stmtu->bindParam(':sup_amount', $sup_amount, PDO::PARAM_INT);
        $stmtu->bindParam(':volume_name', $volume_name, PDO::PARAM_STR);
         $stmtu->bindParam(':cust_po', $imageName, PDO::PARAM_STR);
        $stmtu->execute(); 
         
        echo "<script type='text/javascript'>alert('Record updated successfully!')</script>";
    } else {
        echo "No file uploaded.";
    }
   
}
?>
<style>
    .account:hover {
        background: #025e5e !important;
        color: white !important;
        padding: 5px 10px;
    }

    /* table tr {
    padding: 10px;
} */

    /* Other styles for .account element */
    /* .account {
    padding: 10px;
    border: 1px solid #ccc;
    display: inline-block;
} */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    /* Additional styles for mobile view */
    @media (max-width: 768px) {

        /* Hide table headers on mobile */
        table thead {
            display: none;
        }

        .account-active{
                background: #025e5e !important;
                color: white !important;
                padding: 5px 10px ;
        }
        
        /* Display table rows as blocks for better mobile layout */
        table tbody,
        table tr,
        table td {
            display: block;
        }

        /* Add some spacing between each table row on mobile */
        table tr {
            margin-bottom: 1rem;
        }

        /* Set the background color and padding for the table cells */
        table td {
            background: #f9f9f9;
            padding: 10px;
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
          <!--<div class="preloader-wrap">-->
          <!--  <div class="preloader" style="background-image:url(assets/images/preloader.gif)"></div>-->
          <!--  <div class="overlay"></div>-->
          <!--</div>-->
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
                                        My Account
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="index.php">Home</a> </li>
                                        <li class="active">My Inquiry</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===============PAGE CONTENT==============-->
            <!--===============PAGE CONTENT==============-->
            <div id="content" class="site-content my-5">
                <div class="row px-5">
                    <div class="col-12">
                        <div class="row">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/images/user/user.png" alt="Admin Image" class="rounded-circle me-3" style="width: 90px; height: 90px;">
                                <span>Admin</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 border-1 my-5" style="padding-left:0px;">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column justify-content-center align-content-center p-4">
                                            <a href="account-setting.php" class="text-center p-2 account">Account Setting</a>
                                            <a href="inquiry-status.php" class="text-center p-2 account" style="background: #025e5e !important;color: white !important;padding: 5px 10px ;">Inquiry Status</a>
                                             <a href="order.php" class="text-center p-2 account">Your Orders</a>
                                            <a href="logout.php" class="text-center p-2 account">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 border border-2 my-5 px-0">
                                <table class="table">
                                      <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                    <tbody>
                                    <?php
                                // Retrieve inquiryId from URL parameter
                                $inquiryId = $_GET['inquiryId'];
                                
                                // Prepare the query
                              $detail_query = $db->prepare("SELECT tbl_inquiry.*,tbl_customer.company_name, tbl_product.product_name, tbl_categories.category_name, tbl_inquiry_status.status  
                                FROM tbl_inquiry 
                                JOIN tbl_product ON tbl_inquiry.product_id = tbl_product.id 
                                JOIN tbl_customer ON tbl_inquiry.customer_id = tbl_customer.id
                                JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id 
                                JOIN tbl_inquiry_status ON tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id 
                                WHERE tbl_inquiry.autogenrated_id = :inquiryId");
                                
                                // Bind the parameter
                                $detail_query->bindParam(':inquiryId', $inquiryId, PDO::PARAM_STR);
                                
                                // Execute the query
                                $detail_query->execute();
                                
                                // Fetch all rows related to the inquiry
                                $inquiryDetails = $detail_query->fetchAll();
                                ?>
                                
                                <?php 
                                $pn = 1;
                                foreach ($inquiryDetails as $inquiryDetail) 
                                { ?>
                                    <tr class="" style="margin-bottom: 1rem; padding: 15px;">
                                        <th scope="row" class=""><?php echo $pn; ?></th>
                                        <td><?php echo $inquiryDetail['category_name']; ?></td>
                                        <td><?php echo $inquiryDetail['product_name']; ?></td>
                                        <td><?php echo $inquiryDetail['quantity']." ".$inquiryDetail['volume_name']; ?></td>
                                        <td><?php echo $inquiryDetail['amount']; ?></td>
                                        <td><?php  if($inquiryDetail['inquiry_status_id'] == 1 ){ echo "processing";} elseif ($inquiryDetail['inquiry_status_id'] == 3 && empty($inquiryDetail['cust_po'])  ){ echo "Done"; }elseif (!empty($inquiryDetail['cust_po'])){ echo "Place order"; }else{ echo "processing";} ?></td>
                                        <td>
                                            <?php if($inquiryDetail['inquiry_status_id'] == 3 && empty($inquiryDetail['cust_po']) ) {?>
                                            <button class="btn btn-primary contact-toggler"  onclick="ChangeStarus('<?php echo $inquiryDetail['customer_id']; ?>',
                                                                                  '<?php echo $inquiryDetail['autogenrated_id']; ?>',
                                                                                  '<?php echo $inquiryDetail['product_id']; ?>',
                                                                                  );" >Add PO</button>
                                            <?php }elseif(!empty($inquiryDetail['cust_po']))
                                                      { 
                                                          echo "<a class='' href='admin/images/customerpo/".$inquiryDetail['cust_po']."' target='_blank'>View</a>";
                                                          
                                                      }else{
                                                        echo "...";
                                                    }
                                            ?>
                                            
                                        </td>
                                    </tr>
                                <?php 
                                $pn++;
                                } ?>
                                <!--<div id="myModal" class="modal">-->
                                <!--    <div class="modal-content">-->
                                <!--        <span class="close" onclick="closeModal()">&times;</span>-->
                                <!--        <h2>Upload File</h2>-->
                                <!--        <form id="fileUploadForm" enctype="multipart/form-data">-->
                                <!--            <input type="file" name="fileToUpload" id="fileToUpload">-->
                                <!--            <button type="button" onclick="uploadFile()">Upload</button>-->
                                <!--        </form>-->
                                <!--    </div>-->
                                <!--</div>-->
    
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <script>
    function ChangeStarus(customer_id, autogenrated_id, product_id) {
    document.getElementById("customer_id").value = customer_id;
    document.getElementById("autogenrated_id").value = autogenrated_id;
    document.getElementById("product_id").value = product_id;
   
    // document.getElementById("description").textContent = description;
    // console.log(customer_id,autogenrated_id,product_id);
}
</script>
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
        <!---==============modal popup for attach file=================-->
        <div class="modal_popup one">
            <div class="modal-popup-inner">
                <div class="close-modal"><i class="fa fa-times"></i></div>
                <div class="modal_box">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 form_inner">
                            <div class="form_content">
                                <form class="contact-form" method="post" action="" enctype="multipart/form-data">
                                    <p>
                                        <label>Attach File<br />
                                            <input type="hidden" name="autogenrated_id" value="" id="autogenrated_id" />
                                            <input type="hidden" name="product_id" value="" id="product_id" />
                                            <input type="hidden" name="customer_id" value="" id="customer_id" />
                                            <input type="file" name="attach-po" value="" size="40"  aria-required="true" aria-invalid="false" required />
                                            <br />
                                            <i class="fa fa-folder"></i><br />
                                        </label>
                                    </p>
                              
                                    <p><input type="submit" value="Submit" /></p>

                                </form>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="modal_popup one">-->
        <!--    <div class="modal-popup-inner">-->
        <!--        <div class="close-modal"><i class="fa fa-times"></i></div>-->
        <!--        <div class="modal_box">-->
        <!--            <div class="row">-->
        <!--                <div class="col-lg-5 col-md-12 form_inner">-->
        <!--                    <div class="form_content">-->


        <!--                        <form class="contact-form" method="post" action="https://themepanthers.com/html/creote-html/sendemail.php">-->
        <!--                            <p>-->
        <!--                                <label> Your name<br />-->
        <!--                                    <input type="text" name="name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" />-->
        <!--                                    <br />-->
        <!--                                    <i class="fa fa-user"></i><br />-->
        <!--                                </label>-->
        <!--                            </p>-->
        <!--                            <p><label> Your email<br />-->
        <!--                                    <input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" />-->
        <!--                                    <br />-->
        <!--                                    <i class="fa fa-envelope"></i><br />-->
        <!--                                </label>-->
        <!--                            </p>-->
        <!--                            <p>-->
        <!--                                <label> Subject<br />-->
        <!--                                    <input type="text" name="subject" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Subject" />-->
        <!--                                    <br />-->
        <!--                                    <i class="fa fa-folder"></i><br />-->
        <!--                                </label>-->
        <!--                            </p>-->
        <!--                            <p>-->
        <!--                                <label> Your message (optional)<br />-->
        <!--                                    <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Enter Your Message"></textarea>-->
        <!--                                    <br />-->
        <!--                                    <i class="fa fa-comments"></i><br />-->
        <!--                                </label>-->
        <!--                            </p>-->
        <!--                            <p><input type="submit" value="Submit" /></p>-->

        <!--                        </form>-->

        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-7 col-md-12 about_company_inner">-->
        <!--                    <div class="abt_content">-->
        <!--                        <div class="logo">-->
        <!--                            <img src="assets/images/logo-default.png" alt="img" class="company_logo_modal">-->
        <!--                        </div>-->
        <!--                        <div class="text">-->
        <!--                            <p> The great explorer of the truth, the master-builder of human happiness no-->
        <!--                                one-->
        <!--                                rejects-->
        <!--                                dislikes avoids pleasure itself because it is pleasure but because know who-->
        <!--                                do-->
        <!--                                not those-->
        <!--                                how to pursue pleasures rationally encounter consequences that are extremely-->
        <!--                                painful-->
        <!--                                desires to obtain.</p>-->
        <!--                            <a href="#">Read More</a>-->
        <!--                        </div>-->
        <!--                        <div class="post_contet_modal">-->
        <!--                            <h2> Latest News</h2>-->
        <!--                            <div class="post_enable">-->
        <!--                                <div class="modal_post_grid">-->
        <!--                                    <a href="blog-single.html">-->
        <!--                                        <img width="852" height="812" src="assets/images/blog/blog-image-9.jpg" class="main_img wp-post-image" alt="img" />-->
        <!--                                    </a>-->
        <!--                                </div>-->
        <!--                                <div class="modal_post_grid">-->
        <!--                                    <a href="blog-single.html">-->
        <!--                                        <img width="852" height="812" src="assets/images/blog/blog-image-8.jpg" class="main_img wp-post-image" alt="img" />-->
        <!--                                    </a>-->
        <!--                                </div>-->
        <!--                                <div class="modal_post_grid">-->
        <!--                                    <a href="blog-single.html">-->
        <!--                                        <img width="852" height="812" src="assets/images/blog/blog-image-7.jpg" class="main_img wp-post-image" alt="img" />-->
        <!--                                    </a>-->
        <!--                                </div>-->
        <!--                                <div class="modal_post_grid">-->
        <!--                                    <a href="blog-single.html">-->
        <!--                                        <img width="852" height="812" src="assets/images/blog/blog-image-6.jpg" class="main_img wp-post-image" alt="img" />-->
        <!--                                    </a>-->
        <!--                                </div>-->
        <!--                                <div class="modal_post_grid">-->
        <!--                                    <a href="blog-single.html">-->
        <!--                                        <img width="852" height="812" src="assets/images/blog/blog-image-5.jpg" class="main_img wp-post-image" alt="img" />-->
        <!--                                    </a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="copright">-->
        <!--                            © 2023 Creote. All Rights Reserved.-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
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
    <script></script>
    <!---========================== javascript ==========================-->
    <?php include 'scripts.php' ?>
    <!---========================== javascript ==========================-->
</body>


</html>