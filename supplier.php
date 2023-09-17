<?php
include 'head.php';
?>

<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supplier_request'])) {


//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phoneNo = $_POST['phone_no'];
//     $companyName = $_POST['company_name'];
//     $supplierMessage = $_POST['supplier_message'];

   
//     $query = "INSERT INTO tbl_supplier_request (name, email, phone_no, company_name, supplier_message) 
//               VALUES (:name, :email, :phone, :company, :message)";
//     $stmt = $db->prepare($query);

//     $stmt->bindParam(':name', $name);
//     $stmt->bindParam(':email', $email);
//     $stmt->bindParam(':phone', $phoneNo);
//     $stmt->bindParam(':company', $companyName);
//     $stmt->bindParam(':message', $supplierMessage);

//     try {
//         $stmt->execute();
//          echo "<script type='text/javascript'>window.location.href='thank-you.php';</script>";
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }
// ?>
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
                                        Suppliers Menu
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="index.php">Home</a> </li>
                                        <li class="active">Supplier</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===============PAGE CONTENT==============-->
            <!--===============PAGE CONTENT==============-->
            <div id="content" class="site-content ">

                <?php 
                    $supplier_benefite = $db->query("SELECT * FROM tbl_supplier_benefite where id=1");
    			    $s_benefite =  $supplier_benefite->fetch();
                ?>
                <!----process---->
                <section class="process-section">
                    <!--===============spacing==============-->
                    <div class="pd_top_80"></div>
                    <!--===============spacing==============-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb-3 ">
                                <div class="title_all_box style_one text-center dark_color">
                                    <div class="title_sections">
                                        <h6 class="color-title" style="color:#078586;"><?php echo  $s_benefite['title']; ?></h6>
                                        <div class="before_title description_buyer" style="color:#282f3b;text-decoration:none;padding:2px 15px;"><?php echo $s_benefite['description']; ?>
                                        </div>
                                    </div>
                                    <!--===============spacing==============-->
                                    <div class="mr_bottom_25"></div>
                                    <!--===============spacing==============-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="process_box style_four dark_color">
                                    <div class="process_box_outer_four ">
                                        <div class="icon">
                                            <img src="admin/images/supplier/<?php echo $s_benefite['image_b1']; ?>" class="img-fluid svg_image" alt="<?php echo $s_benefite['alt_tag1']; ?>">
                                            <h6> 01</h6>
                                        </div>
                                        <div class="content_box">
                                            <h5><?php echo  $s_benefite['benefite1_title']; ?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <!--===============spacing==============-->
                                <div class="mr_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="process_box style_four dark_color">
                                    <div class="process_box_outer_four ">
                                        <div class="icon">
                                            <img src="admin/images/supplier/<?php echo $s_benefite['image_b2']; ?>" class="img-fluid svg_image" alt="<?php echo $s_benefite['alt_tag2']; ?>">
                                            <h6>02</h6>
                                        </div>
                                        <div class="content_box">
                                            <h5><?php echo  $s_benefite['benefite2_title']; ?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="process_box style_four dark_color">
                                    <div class="process_box_outer_four ">
                                        <div class="icon">
                                            <img src="admin/images/supplier/<?php echo $s_benefite['image_b3']; ?>" class="img-fluid svg_image" alt="<?php echo $s_benefite['alt_tag3']; ?>">
                                            <h6> 03</h6>
                                        </div>
                                        <div class="content_box">
                                            <h5><?php echo  $s_benefite['benefite3_title']; ?>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <!--===============spacing==============-->
                                <div class="mr_bottom_35"></div>
                                <!--===============spacing==============-->
                                <div class="process_box style_four dark_color">
                                    <div class="process_box_outer_four ">
                                        <div class="icon">
                                            <img src="admin/images/supplier/<?php echo $s_benefite['image_b4']; ?>" class="img-fluid svg_image" alt="<?php echo $s_benefite['alt_tag4']; ?>">
                                            <h6> 04</h6>
                                        </div>
                                        <div class="content_box">
                                            <h5><?php echo  $s_benefite['benefite4_title']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_60"></div>
                    <!--===============spacing==============-->
                </section>
                <!----process end---->

                <?php 
                 $title_second = $db->query("SELECT * FROM tbl_buyer_whychoose WHERE id=1");
                 $t_benefite = $title_second->fetch();
			     //print_r( $t_benefite);
                ?>
                <!----contact---->
                <section class="contact-section bg_op_1" style="background: url(admin/images/supplier/<?PHP echo $t_benefite['background_image']; ?>);">
                    <!--===============spacing==============-->
                    <div class="pd_top_80"></div>
                    <!--===============spacing==============-->
                    <div class="medium-container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
                                <!--===============spacing==============-->
                                <div class="pd_top_30"></div>
                                <!--===============spacing==============-->
                                <div class="title_all_box style_five  dark_color">
                                    <div class="title_sections five left">

                                        <h2><?PHP echo $t_benefite['title']; ?></h2>

                                    </div>
                                </div>
                               
                                  <?php 
                                     $benefite_second = $db->query("SELECT * FROM tbl_supplier_whychooseb");
                                     $W_benefite = $benefite_second->fetchAll();
                                   ?>
                                <!--===============spacing==============-->
                                <?php 
                                        
                                   foreach($W_benefite as $b){ ?>
                                       
                                        <div class="pd_bottom_20"></div>
                                <!--===============spacing==============-->
                                        <div class="content_box_cn style_one">
                                            <div class="txt_content">
                                                <h5><?php echo $b['benefite']; ?></h3>
                                            </div>
                                        </div>
                                <?php   }
                                        
                                ?>
                               

                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="contact_form_box_all type_two">
                                    <div class="contact_form_box_inner">
                                        <img src="admin/images/supplier/<?PHP echo $t_benefite['background_image1']; ?>" alt="image">
                                        <div class="contact_form_shortcode">
                                            <div class="heading">
                                                <h2>Schedule a <span>call back To be Partnering With Us</span></h2> 
                                            </div>
                                            <div class="_form">
                                                <div role="form" class="wpcf7" id="wpcf7-f2367-p2076-o1" lang="en-US" dir="ltr">
                                                  <form method="post" class="wpcf7-form init"  data-status="init" action="send_mail.php">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label> Your name<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" required></span><br>
                                                                <i class="fa fa-user"></i><br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Your email<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" required></span><br>
                                                                <i class="fa fa-envelope"></i><br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Phone Number<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="tel-922"><input type="number" name="phone_no" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-invalid="false" placeholder="Enter Your Number" min="0" oninput="if(this.value.length > 10) { this.value = this.value.slice(0, 10); }" required></span><br>
                                                                <i class="fa fa-phone"></i><br>
                                                            </label>
                                                            <style>
                                                                /* Hide the increase and decrease arrows for number input */
                                                                input[type="number"]::-webkit-inner-spin-button,
                                                                input[type="number"]::-webkit-outer-spin-button {
                                                                    -webkit-appearance: none;
                                                                    appearance: none;
                                                                    margin: 0;
                                                                }
                                                            </style>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Company Name<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-subject"><input type="text" name="company_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Enter Your Company"></span><br>
                                                                <i class="fa fa-folder"></i><br>
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="col-lg-12 text_area">
                                                            <label> Your message<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-message"><textarea name="supplier_message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Enter Your Message" required></textarea></span><br>
                                                                <i class="fa fa-comments"></i><br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="submit" name="supplier_request" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit">
                                                        </div>
                                                    </div>
                                                </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_90"></div>
                                    <!--===============spacing==============-->
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!----contact end---->
                <!----contact end---->
                <!--- faqs --->
                <section class="faqs-section">
                    <!--===============spacing==============-->
                    <div class="pd_top_80"></div>
                    <!--===============spacing==============-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title_all_box style_two text-center dark_color">
                                    <div class="title_sections two">
                                        <h2>FAQs</h2>
                                    </div>
                                    <!--===============spacing==============-->
                                    <div class="mr_bottom_30"></div>
                                    <!--===============spacing==============-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 mb-5 mb-lg-5 mb-xl-0">
                                <div class="simple_image_boxes height_360px parallax_cover">
                                    <img src="assets/images/blog/blog-image-11.jpg" class="simp_img cover-parallax" alt="image">
                                </div>
                                <!--===============spacing==============-->
                                <div class="mr_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="progress_bar">
                                    <h2>Our Growth <span>99%</span></h2>
                                    <div class="bar">
                                        <div class="bar-inner count-bar counted" data-percent="99%" style="width: 99%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 mb-5 mb-lg-5 mb-xl-0">
                                <div class="simple_image_boxes height_360px parallax_cover">
                                    <img src="assets/images/blog/blog-image-10.jpg" class="simp_img cover-parallax" alt="image">
                                </div>
                                <!--===============spacing==============-->
                                <div class="mr_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="progress_bar">
                                    <h2>Income Statement <span>80%</span></h2>
                                    <div class="bar">
                                        <div class="bar-inner count-bar counted" data-percent="80%" style="width: 80%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="faq_section type_one">
                                    <div class="block_faq">
                                        <div class="accordion">
                                            <dl>
                                                <?php 
                                                      $stmt = $db->query("SELECT * FROM tbl_faqs_supplier LIMIT 5");
                                                       while ($row = $stmt->fetch()) {
                                                ?>
                                                <dt class="faq_header">
                                                    <span class="icon-play"></span> <?php echo $row['question']; ?>
                                                </dt>
                                                <dd class="accordion-content hide">
                                                    <p>
                                                        <?php echo $row['answer']; ?>
                                                    </p>
                                                </dd>
                                                <?php } ?>

                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_60"></div>
                    <!--===============spacing==============-->
                </section>
                <!--- faqs end--->

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
                                    <p> The great explorer of the truth, the master-builder of human happiness no one rejects
                                        dislikes avoids pleasure itself because it is pleasure but because know who do not those
                                        how to pursue pleasures rationally encounter consequences that are extremely painful
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
    <!---========================== javascript ==========================-->
</body>


</html>