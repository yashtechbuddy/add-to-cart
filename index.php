<!DOCTYPE html>
<html lang="en-US">

<?php 
include 'head.php';
?>

<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <!-- <div class="style-switcher">
            <a href="#" id="switcher-toggler"><i class="fa fa-cog"></i></a>
            <h3>Color Skins</h3>
            <ul id="colorschemeOptions" title="Switch Color" data-css-path="assets/css/scss/elements/color-switcher/">
                <li>
                    <a href="#" data-theme="color" style="background-color: #078586;"> </a>
                </li>
                <li>
                    <a href="#" data-theme="color1" style="background-color: #e5102a;"> </a>
                </li>
                <li>
                    <a href="#" data-theme="color2" style="background-color: #3ead3c;"> </a>
                </li>
                <li>
                    <a href="#" data-theme="color3" style="background-color: #fed000;"> </a>
                </li>
                <li>
                    <a href="#" data-theme="color4" style="background-color: #ff5538;"> </a>
                </li>
                <li>
                    <a href="#" data-theme="color5" style="background-color: #246af4;"> </a>
                </li>
            </ul>
        </div> -->
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
            <div id="content" class="site-content ">

                <!---sliders-->
                <!--<div class="banner_section_hm_16 pd_left_100 pd_right_100 md_pd_left_15 md_pd_right_15">-->

                <!--    <div class="inner_section bg_op_1" style="background: url(assets/images/sliders/banner-16-bg.jpg);">-->
                <!--        <div class="default-container">-->
                <!--            <div class="row gutter_30px">-->
                <!--                <div class="col-lg-12 pd_zero">-->
                <!--                    <div class="team_intro_box">-->
                <!--                        <div class="team_intro_inner">-->
                <!--                            <div class="team_intro_start">-->
                <!--                                <div class="row">-->
                <!--                                    <div class="col-lg-8">-->
                <!--                                        <div class="left_content">-->
                <!--                                            <div class="title">-->
                <!--                                                <h6>Strong Team</h6>-->
                <!--                                                <h1>Foundation of Business</h1>-->
                <!--                                            </div>-->
                <!--                                            <div class="quotes">-->
                <!--                                                <span class="icon-quote"></span>-->
                <!--                                                <h5>Teamwork is the secret that makes common <br> people-->
                <!--                                                    achieve-->
                <!--                                                    uncommon results.</h5>-->
                <!--                                            </div>-->
                <!--                                            <div class="authour_dtls">-->

                <!--                                                <img src="assets/images/sign-d.png" class="sign"-->
                <!--                                                    alt="image">-->
                <!--                                                <h4>-->
                <!--                                                    Liam Oliver , <span>Founder & CEO of Qetus</span>-->
                <!--                                                </h4>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                    <div class="col-lg-4">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->

                <!--                        <div class="image_right">-->
                <!--                            <img src="assets/images/sliders/banner-16.png" class="img-fluid" alt="image">-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                    
                    

                <!--</div>-->
                <!---sliders-->
                <section class="slider style_four ">
                        <div class="owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
                           data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
             <?php 
                             $home_banner = $db->query("SELECT * FROM tbl_banner limit 1");
                            while ($hb = $home_banner->fetch()) {
                    ?>
                           <div class="slide-item-content">
                              <div class="slide-item content_left">
                                 <div class="image-layer"
                                    style="background-image:url(admin/images/banner/<?php echo $hb['banner_image']; ?>)">
                                 </div>
                                 <div class="auto-container">
                                    <div class="row">
                                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                          <div class="slider_content pd_top_180 pd_bottom_200">
                                             <h6 class="animate_up d-inline-block">  <?php echo $hb['small_title']; ?></h6>
                                             <h1 class="animate_left"> <?php echo $hb['title']; ?></h1>
                                             <p class="description animate_right">  <?php echo $hb['short_desc']; ?></p>
                                             <div class="button_all animate_down">
                                                <a href="<?php echo $hb['btn_link']; ?>" target="_blank" rel="nofollow"
                                                   class="theme-btn one  animated"><?php echo $hb['btn_name']; ?> </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <?php } ?>
                        </div>
                     </section>
                 
                    
                <!--feature-->
                <!---feature end-->
                <!--about-->

                <!---about end-->
                <!--service post-->
                  <div class="pd_top_80"></div>
                <section class="service-section-two pd_left_100 pd_right_100 md_pd_left_15 md_pd_right_15">

                    <div class="inner_section bg_light_1 rounded_radius">
                        <!--===============spacing==============-->
                        <div class="pd_top_80"></div>
                        <!--===============spacing==============-->
                        <div class="default-container">
                            <div class="row">
                                <div class="col-lg-6 m-auto">
                                    <div class="title_all_box style_one text-center">
                                        <div class="title_sections">

                                            <div class="title">Blogs</div>
                                            <p>
                                                Our power of choice is untrammelled and when nothing prevents
                                                being able to do what we like best every pleasure.
                                            </p>
                                        </div>
                                        <!--===============spacing==============-->
                                        <div class="pd_bottom_20"></div>
                                        <!--===============spacing==============-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="service_all_styles carousel owl_new_one">
                                        <div class="owl_nav_none owl_dots_none owl_type_two theme_carousel owl-theme owl-carousel"
                                            data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "3" }}}'>

                                         <?php 
                             $home_blog = $db->query("SELECT * FROM tbl_blog ");
                            while ($hblog = $home_blog->fetch()) {
                             ?>
                                            <div class="service_box  type_one clearfix">
                                                <div class="image_box">
                                                    <img src="admin/images/blog/<?php echo $hblog['image'];  ?>" class="img-fluid"
                                                        alt="img" />
                                                    <div class="overlay"></div>
                                                </div>
                                                <div class="content_box">
                                                    
                                                    <h2 class="entry-title">
                                                        <a href="blogs/<?php echo $hblog['page_name'];  ?>"><?php echo $hblog['title'];  ?></a>
                                                    </h2>
                                                    <p><?php echo $hblog['short_desc'];  ?>
                                                    </p>
                                                    <a href="blogs/<?php echo $hblog['page_name'];  ?>" class="read_more type_one">
                                                        <span class="icon-arrow-right"></span>
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
<?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_60"></div>
                        <!--===============spacing==============-->
                    </div>

                </section>
                <!--===============spacing==============-->
                        <div class="pd_bottom_60"></div>
                        <!--===============spacing==============-->
            
        
               <div id="content" class="site-content ">

                <div class="container card shadow mt-5 mb-5 py-3 " style="border-top:2px solid #078586 ;">
                    <div class="row p-2">
                        <div class="col">
                            <h4 class="text-start text-capitalize"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Product Category</h4>
                        </div>
                    </div>

                    <div class="row">

                        <?php

                            $stmt = $db->query("SELECT * FROM tbl_categories WHERE visibility=1");
                            while ($row = $stmt->fetch()) {
                              
                            
                        ?>
                        <div class="col-md-6 col-lg-3 categories-card">
                            <div class="card shadow p-2 ">
                                <div class="d-flex justify-content-center align-content-center">
                                <img src="admin/images/categories/<?php echo $row['category_image'] ?>"  class="card-img-top p-2 img-fluid broder border-3 rounded-2 " style="height:108px ;width: 108px;"
                                     alt="Category-image">
                                </div>
                                
                                <div class="card-body text-center  p-0 px-4">
                                    <h6 class="card-text d-flex product-title justify-content-around text-capitalize"
                                        style="height:30px"><?php  echo $row['category_name'] ?></h6>
                                </div>
                                <a href="products.php?id=<?php echo $row['id']; ?>" class="btn text-decoration-none mt-4 text-white mb-2 product-cat"
                                    style="background-color:#078586;width:90%;">View Product</a>
                            </div>
                        </div>
                        <?php } ?>


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
                              <input type="text" name="name" value="" size="40"   aria-required="true" aria-invalid="false" placeholder="Enter Your Name" /> 
                              <br />
                               <i class="fa fa-user"></i><br />
                            </label>
                         </p>
                         <p><label> Your email<br />
                             <input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false"  placeholder="Enter Your Email" />
                             <br />
                            <i class="fa fa-envelope"></i><br />
                            </label>
                         </p>
                         <p>
                            <label> Subject<br />
                              <input type="text" name="subject" value="" size="40" aria-required="true" aria-invalid="false"  placeholder="Enter Your Subject" /> 
                              <br />
                               <i class="fa fa-folder"></i><br />
                            </label>
                         </p>
                         <p>
                            <label> Your message (optional)<br />
                               <textarea name="message"  cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"  aria-invalid="false" placeholder="Enter Your Message"></textarea> 
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