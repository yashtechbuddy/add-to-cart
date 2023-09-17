<!DOCTYPE html>
<html lang="en-US">

<?php
include 'head.php';

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
                                        Contact Us
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="index.php">Home</a> </li>
                                        <li class="active">Contact Us</li>
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

                <section class="contact-section">
                    <!--===============spacing==============-->
                    <div class="pd_top_90"></div>
                    <!--===============spacing==============-->
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 mb-5 mb-lg-5 mb-xl-0">
                                <div class="contact_form_box_all type_one">
                                    <div class="contact_form_box_inner">
                                        <div class="contact_form_shortcode">
                                           <form method="post" class="wpcf7-form init"  data-status="init" action="send-general-inquiry.php">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label> Your name<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                                    <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" required></span><br>
                                                                <br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Your email<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-email">
                                                                    <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" required></span><br>
                                                               <br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Phone Number<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="tel-922">
                                                                    <input type="number" name="phone_no" value="" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-invalid="false" placeholder="Enter Your Number"  oninput="if(this.value.length > 10) { this.value = this.value.slice(0, 10); }" required></span><br>
                                                                <br>
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
                                                                <span class="wpcf7-form-control-wrap" data-name="your-subject">
                                                                    <input type="text" name="company_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Company(optional)" ></span><br>
                                                              <br>
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="col-lg-12 text_area">
                                                            <label> Your message (optional)<br>
                                                                <span class="wpcf7-form-control-wrap" data-name="your-message">
                                                                    <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Enter Your Message" required></textarea></span><br>
                                                               <br>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="submit" name="general-inquiry" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit">
                                                        </div>
                                                    </div>
                                                </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            
                            $footer_stmt = $db->query("SELECT * FROM `tbl_footer_setting`");
                            $footer = $footer_stmt->fetch();

                            $contact_stmt = $db->query("SELECT * FROM `tbl_contact_us`");
                            $contact = $contact_stmt->fetch();

                            ?>
                            <div class="col-xl-6 col-lg-6 pd_left_30">
                                <div class="title_all_box style_one dark_color">
                                    <div class="title_sections left">
                                        <div class="before_title">Contact Info to</div>
                                        <h2>Reach Our Expert Team</h2>
                                        <p>Send a message through given form, If your enquiry is time sensitive please
                                            use below
                                            contact details.</p>
                                    </div>
                                </div>

                                <div class="contact_box_content style_one">
                                    <div class="contact_box_inner icon_yes">
                                        <div class="icon_bx">
                                            <span class=" icon-placeholder"></span>
                                        </div>
                                        <div class="contnet">
                                            <h3> Post Address </h3>
                                            <p>
                                               <?php echo $contact['address']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                <div class="contact_box_content style_one">
                                    <div class="contact_box_inner icon_yes">
                                        <div class="icon_bx">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="contnet">
                                            <h3> General Enquires </h3>
                                            <p>
                                                Phone:+91 <?php $formate = $contact['phone']; $fromated= formatNumberWithSpaces($formate); echo $fromated; ?> &amp; Email: <?php echo $contact['email']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                <div class="contact_box_content style_one">
                                    <div class="contact_box_inner icon_yes">
                                        <div class="icon_bx">
                                            <span class="fa fa-clock-o"></span>
                                        </div>
                                        <div class="contnet">
                                            <h3> Operation Hours </h3>
                                            <p>
                                                Mon-Satday: 09.00 to 07.00 (Sunday: Closed)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_40"></div>
                                <!--===============spacing==============-->
                                <div class="social_media_v_one style_two">
                                    <ul>
                                        <li class ="<?php if(empty($footer['facebook_link'])){echo "d-none";} ?>">
                                            <a href="#"> <span class="fa fa-facebook"></span>
                                                <small>facebook</small>
                                            </a>
                                        </li>
                                        <li class="<?php if(empty($footer['twitter_link'])){echo "d-none";} ?>">
                                            <a href="#"> <span class="fa fa-twitter"></span>
                                                <small>twitter</small>
                                            </a>
                                        </li>
                                        <li class=" <?php if(empty($footer['youtube_link'])){echo "d-none";} ?>">
                                            <a href="#"> <span class="fa fa-youtube"></span>
                                                <small>youtube</small>
                                            </a>
                                        </li>
                                        <li class="<?php if(empty($footer['instagram_link'])){echo "d-none";} ?>">
                                            <a href="#"> <span class="fa fa-instagram"></span>
                                                <small>instagram</small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_top_70"></div>
                    <!--===============spacing==============-->
                </section>
                <section class="contact-map-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="map-section">
                                    <!--Map Outer-->
                                    <div class="map-outer">
                                        <div class="col-12 google-map" id="" >
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29918.12930911184!2d72.87812757170867!3d20.39252904052265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0d035a3377e53%3A0x68b46ced9811a463!2sChala%2C%20Vapi%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1693804861423!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_top_90"></div>
                    <!--===============spacing==============-->
                </section>
                <!---newsteller--->

                <!---newsteller end--->
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