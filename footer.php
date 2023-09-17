 
<!---==============footer start =================-->
 <?php 

$footer_stmt = $db->query("SELECT * FROM `tbl_footer_setting`");
$footer = $footer_stmt->fetch();
?>
 <div class="footer_area sixteen position-relative pd_left_100 pd_right_100  md_pd_left_15 md_pd_right_15"
     id="footer_contents">

     <div class="inner_section">
         <div class="footer_widgets_wrap bg_op_1 rounded_radius"
             style="background: url(<?php echo $path;?>admin/images/footer/<?php echo $footer['background_image']; ?>);">
             <!--===============spacing==============-->
             <div class="pd_top_90"></div>
             <!--===============spacing==============-->
             <div class="default-container">
                 <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-12">
                         <div class="footer_widgets wid_tit style_one">
                             <div class="fo_wid_title light_color">
                                 <h2>About Company</h2>
                             </div>
                         </div>
                         <!--===============spacing==============-->
                         <div class="pd_bottom_20"></div>
                         <!--===============spacing==============-->
                         <div class="footer_widgets about_company light_color">
                             <div class="about_company_inner">
                                 <div class="content_box">
                                     <p class="color_white">
                                        <?php echo $footer['about_us_des']; ?>
                                     </p>
                                     <div class="consulting">
                                         <div class="image">
                                             <img src="<?php echo $path;?>assets/images/testi-1.png" class="img-fluid" alt="need help">
                                         </div>
                                         <div class="help_con">
                                             <h6 class="color_white">Need Help?</h6>
                                             <h2>
                                                 <a href="#" class="color_white">Free Consultation </a>
                                             </h2>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12">
                         <div class="footer_widgets wid_tit style_one">
                             <div class="fo_wid_title light_color">
                                 <h2>Contact Through</h2>
                             </div>
                         </div>
                         <!--===============spacing==============-->
                         <div class="pd_bottom_20"></div>
                         <!--===============spacing==============-->
                         <div class="footer_widgets get_in_touch_foo light_color">
                             <div class="get_intouch_inrfo">
                                 <div class="foo_cont_inner">
                                     <div class="top">
                                         <h6> Location</h6>
                                         <p class="color_white">
                                            
                                                 <?php echo $contact['address']; ?>
                                           
                                             
                                         </p>
                                     </div>
                                     <div class="bottom">
                                         <h6> Contact</h6>
                                         <div class="con_content">
                                             <h5> Phone :</h5>
                                             <a href="tel:+91 <?php echo $contact['phone']; ?>" class="color_white">
                                                 <?php echo $contact['phone']; ?></a>
                                         </div>
                                         <div class="con_content">
                                             <h5> Mail Us :</h5>
                                             <a href="<?php echo $contact['email']; ?>" class="color_white">
                                                 <?php echo $contact['email']; ?></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-12">
                         <div class="footer_widgets wid_tit style_two">
                             <div class="fo_wid_title light_color">
                                 <h2>Links</h2>
                             </div>
                         </div>
                         <!--===============spacing==============-->
                         <div class="pd_bottom_20"></div>
                         <!--===============spacing==============-->
                         <div class="footer_widgets clearfix">
                             <div class="list_item_box style_one light_color">
                                 <ul>
                                     <li><a href="<?php echo $path;?>about-us.php">About us</a> </li>
                                     <li><a href="<?php echo $path;?>blogs.php">Blogs</a> </li>
                                     <li><a href="<?php echo $path;?>contact.php">Contact us</a> </li>
                                 </ul>
                             </div>
                         </div>
                     </div>


                     <div class="col-lg-3 col-md-4 col-sm-12">
                         <div class="footer_widgets wid_tit style_two">
                             <div class="fo_wid_title light_color">
                                 <h2>Newsletter</h2>
                             </div>
                         </div>
                         <!--===============spacing==============-->
                         <div class="pd_bottom_20"></div>
                         <!--===============spacing==============-->
                         <div class="footer_widgets foo_subscribe light_color style_one">
                             <div class="item_subscribe with_text">
                                 <p class="color_white">Subscribe Us & Recive Our Offers and Updates on your
                                     Inbox Directly.</p>
                                 <div class="shortcodes">
                                     <form class="mc4wp-form" method="post" data-name="Subscibe">
                                         <div class="mc4wp-form-fields">
                                             <input type="email" name="EMAIL" placeholder="Your email address"
                                                 required="">
                                             <input type="submit" value="Sign up">
                                         </div>
                                     </form>
                                 </div>
                                 <p class="color_white">* We do not share your email id</p>
                             </div>
                         </div>
                     </div>
                 </div>


             </div>
             <!--===============spacing==============-->
             <div class="pd_bottom_50"></div>
             <!--===============spacing==============-->
         </div>
         <div class="footer-copyright">
             <!--===============spacing==============-->
             <div class="pd_top_20"></div>
             <!--===============spacing==============-->
             <div class="default-container">
                 <div class="row align-items-center">
                     <div class="col-lg-2 col-md-12">
                         <div class="footer_logo">
                             <a href="<?php echo $path;?>index.php" class="logo navbar-brand">
                                 <img decoding="async" src="<?php echo $path ?>admin/images/logo/<?php echo $setting['app_logo']; ?>" alt="<?php echo $setting['app_name']; ?>"
                                     class="logo_default" />
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                         <div>
                             © 2023 Trading.  Designed and Developed by <a href="https://www.rndtechnosoft.com/">RndTechnosoft.</a> 
                            
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-12 text-md-end">
                         <div class="social_media_v_one style_two">
                             <ul>
                                 <li class=" <?php if(empty($footer['facebook_link'])){echo "d-none";} ?>">
                                     <a href="<?php $footer['facebook_link'] ?>"> <span
                                             class="fa fa-facebook"></span>
                                         <small>facebook</small>
                                     </a>
                                 </li>
                                 <li class="<?php if(empty($footer['twitter_link'])){echo "d-none";} ?>">
                                     <a href="<?php $footer['twitter_link'] ?>"> <span class="fa fa-twitter "></span>
                                         <small>twitter</small>
                                     </a>
                                 </li>
                                 <li class="<?php if(empty($footer['instagram_link'])){echo "d-none";} ?>">
                                     <a href="<?php $footer['instagram_link'] ?>"> <span class="fa fa-instagram "></span>
                                         <small>instagram</small>
                                     </a>
                                 </li>
                                 <li class="<?php if(empty($footer['youtube_link'])){echo "d-none";} ?>">
                                     <a href="<?php $footer['youtube_link'] ?>"> <span class="fa fa-youtube "></span>
                                         <small>youtube</small>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
             <!--===============spacing==============-->
             <div class="pd_bottom_20"></div>
             <!--===============spacing==============-->
         </div>
     </div>
 </div>
 <!---==============footer end =================-->
 