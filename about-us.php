<!DOCTYPE html>
<html lang="en-US">


<!-- Mirrored from themepanthers.com/html/creote-html/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jul 2023 11:27:55 GMT -->

<?php include 'head.php' ?>

<body class="theme-creote">
    <div id="page" class="page_wapper hfeed site">
        
        <!---============== wrapper_full =================-->
        <div id="wrapper_full" class="content_all_warpper">
            <!----mini cart----->
            <!-- <div class="mini_cart_togglers fixed_cart">
                <div class="mini-cart-count">
                    0
                </div>
                <i class="icon-shopping-cart"></i>
            </div> -->
            <!----mini cart----->
            <!----preloader----->
            <div class="preloader-wrap">
                <div class="preloader" style="background-image:url(assets/images/preloader.gif)">
                </div>
                <div class="overlay"></div>
            </div>
            <!----preloader----->
            <!----header----->
           <?php include 'header.php' ?>
            <!----header end----->
            <!----page header----->
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
                                        About Us
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="breadcrumbs creote">
                                    <ul class="breadcrumb m-auto">
                                        <li><a href="index.php">Home</a> </li>
                                        <li class="active">About Us</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----page header----->
            <!--===============PAGE CONTENT==============-->
            <!--===============PAGE CONTENT==============-->
            <div id="content" class="site-content ">
                <!---about--->
                <section class="about-section">
                    
                    <div class="pd_top_90"></div>
                     <?php 
                                    $about_us_stmt = $db->query("SELECT * FROM tbl_about_us");
                                     $singleRow = $about_us_stmt->fetch();
                                    
                                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 ">
                                <div class="about_content position-relative z_99">
                                    <div class="title_all_box style_one text-left  dark_color">
                                        <div class="title_sections">
                                            <div class="before_title"><?php echo $singleRow['title']; ?></div>
                                            <h2><?php echo $singleRow['small_title']; ?></h2>
                                        </div>
                                    </div>
                                    
                                    <div class="pd_bottom_15"></div>
                                    
                                    <!--<div class="extra_content image_with_content dark_color">-->
                                    <!--    <div class="simple_image">-->
                                    <!--        <img src="assets/images/cuntry-1.png" alt="img">-->
                                    <!--        <h2> Since 1998, <br> Operating in Birmingham.</h2>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <div class="pd_bottom_20"></div>
                                    
                                    <div class="description_box">
                                        <p><?php echo $singleRow['description']; ?></p>
                                    </div>
                                    
                                    <div class="pd_bottom_25"></div>
                                    
                                    <div class="row gutter_15px">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="icon_box_all  style_two">
                                                <div class="icon_content  icon_imgs ">
                                                    <div class="icon">
                                                        <img src="assets/images/icon-img-n-1.png" class="img-fluid svg_image" alt="icon png">
                                                    </div>
                                                    <div class="txt_content">
                                                        <h3><a href="#" target="_blank" rel="nofollow">Tailored Advice &amp; Support</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                
                                                <div class="pd_bottom_25"></div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="icon_box_all  style_two">
                                                <div class="icon_content  icon_imgs ">
                                                    <div class="icon">
                                                        <img src="assets/images/icon-img-n-2.png" class="img-fluid svg_image" alt="icon png">
                                                    </div>
                                                    <div class="txt_content">
                                                        <h3><a href="#" target="_blank" rel="nofollow">Flexible Company Policies</a></h3>
                                                    </div>
                                                </div>
                                                
                                                <div class="pd_bottom_25"></div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="theme_btn_all color_one">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn five">Contact us<i class="icon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="image_boxes style_two">
                                    <img src="assets/images/shape-1.png" class="background_image" alt="image">
                                    <div class="image one">
                                        <img src="assets/images/about/about-6.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="image two">
                                        <img src="assets/images/about/about-7.png" class="img-fluid" alt="image">
                                        <div class="video_box">
                                            <a href="#" class="lightbox-image"><i class="icon-play"></i></a>
                                        </div>
                                    </div>
                                    <div class="authour_quotes">
                                        <i class="icon-quote"></i>
                                        <h6>Making What’s Possible in Human Resource</h6>
                                        <p>/ Liam Oliver</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pd_bottom_70"></div>
                    
                </section>
                <!---about end--->
                <!---service--->
                <section class="service-icon-section bg_light_1">
                    
                    <div class="pd_top_90"></div>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title_all_box style_one text-center dark_color">
                                    <div class="title_sections">
                                        <div class="before_title">Our Business</div>
                                        <h2 class="title">Stand Out From The Rest</h2>
                                    </div>
                                    
                                    <div class="pd_bottom_20"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-3">
                                <div class="icon_box_all style_three">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <span class="<?php echo $singleRow['mission_icon']; ?>"></span>
                                        </div>
                                        <div class="txt_content">
                                            <h3><a href="#" target="_blank" rel="nofollow"><?php echo $singleRow['mission_title']; ?></a></h3>
                                            <p><?php echo $singleRow['mission_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-3">
                                <div class="icon_box_all style_three">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <span class="<?php echo $singleRow['goals_icon']; ?>"></span>
                                        </div>
                                        <div class="txt_content">
                                            <h3><a href="#" target="_blank" rel="nofollow"><?php echo $singleRow['goals_title']; ?></a></h3>
                                            <p><?php echo $singleRow['goals_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-3">
                                <div class="icon_box_all style_three">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <span class="<?php echo $singleRow['vission_icon']; ?>"></span>
                                        </div>
                                        <div class="txt_content">
                                            <h3><a href="#" target="_blank" rel="nofollow"><?php echo $singleRow['vission_title']; ?></a></h3>
                                            <p><?php echo $singleRow['vission_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="pd_top_90"></div>
                    
                </section>
              <!---service end--->
              <!--feature-->
              <!--<section class="process-section">-->
                   
              <!--      <div class="pd_top_60"></div>-->
                    
              <!--      <div class="auto-container">-->
              <!--          <div class="row gutter_30px">-->
              <!--              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd_right_30">-->
              <!--                  <div class="title_all_box style_one  dark_color">-->
              <!--                      <div class="title_sections ">-->
              <!--                          <div class="title"> Create Meaningful Experiences for Customer</div>-->
              <!--                          <p> To create meaningful experiences for customers, -->
              <!--                              it is important to focus on understanding their emotions and perspectives at all touch points. -->
              <!--                              By gaining insights into their needs, preferences, and pain points, -->
              <!--                              you can take action and tailor experiences that truly matter to your customers. Here's how you can achieve</p>-->
              <!--                      </div>-->
                                    
              <!--                      <div class="pd_bottom_20"></div>-->
                                    
              <!--                  </div>-->

              <!--                  <div class="icon_box_all  style_five">-->
              <!--                      <div class="icon_content">-->
              <!--                          <div class="icon">-->
              <!--                              <span class=" icon-support"></span>-->
              <!--                          </div>-->
              <!--                          <small>01</small>-->
              <!--                          <div class="text_box">-->
              <!--                              <h2> 24/7 Customer support</h2>-->
              <!--                              <p> The less water you use, the less runoff and wastewater that eventually-->
              <!--                                  end up in the ocean.</p>-->
              <!--                          </div>-->
              <!--                          <div class="hover_content">-->
              <!--                              <div class="content">-->
              <!--                                  <div class="inner">-->
              <!--                                      <p> The less water you use, the less runoff and wastewater that-->
              <!--                                          eventually end up in the ocean.</p>-->
              <!--                                      <a href="#" class="read_more"> Read More <span-->
              <!--                                              class="icon-right-arrow-long"></span></a> -->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                          </div>-->
              <!--                      </div>-->

              <!--                  </div>-->
              <!--              </div>-->
              <!--              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd_left_30">-->
              <!--                  <div class="icon_box_all  style_five">-->
              <!--                      <div class="icon_content">-->
              <!--                          <div class="icon">-->
              <!--                              <span class=" icon-united"></span>-->
              <!--                          </div>-->
              <!--                          <small>02</small>-->
              <!--                          <div class="text_box">-->
              <!--                              <h2> Experience Team</h2>-->
              <!--                              <p> The less water you use, the less runoff and wastewater that eventually-->
              <!--                                  end up in the ocean.</p>-->
              <!--                          </div>-->
              <!--                          <div class="hover_content">-->
              <!--                              <div class="content">-->
              <!--                                  <div class="inner">-->
              <!--                                      <p> The less water you use, the less runoff and wastewater that-->
              <!--                                          eventually end up in the ocean.</p>-->
              <!--                                       <a href="#" class="read_more"> Read More <span-->
              <!--                                              class="icon-right-arrow-long"></span></a> -->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                          </div>-->
              <!--                      </div>-->

              <!--                  </div>-->
                                
              <!--                  <div class="pd_bottom_50"></div>-->
                                
              <!--                  <div class="icon_box_all  style_five">-->
              <!--                      <div class="icon_content">-->
              <!--                          <div class="icon">-->
              <!--                              <span class=" icon-solution"></span>-->
              <!--                          </div>-->
              <!--                          <small>03</small>-->
              <!--                          <div class="text_box">-->
              <!--                              <h2> Smart solutions</h2>-->
              <!--                              <p> The less water you use, the less runoff and wastewater that eventually-->
              <!--                                  end up in the ocean.</p>-->
              <!--                          </div>-->
              <!--                          <div class="hover_content">-->
              <!--                              <div class="content">-->
              <!--                                  <div class="inner">-->
              <!--                                      <p> The less water you use, the less runoff and wastewater that-->
              <!--                                          eventually end up in the ocean.</p>-->
              <!--                                      <a href="#" class="read_more"> Read More <span-->
              <!--                                              class="icon-right-arrow-long"></span></a> -->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                          </div>-->
              <!--                      </div>-->

              <!--                  </div>-->
              <!--              </div>-->

              <!--          </div>-->
              <!--      </div>-->
                    
                <!--    <div class="pd_bottom_80"></div>-->
                    
                <!--</section>-->
                <!---feature end-->
                <!---tab---->
                <!--<section class="tab-section bg_op_1" style="background-image:url(assets/images/tab-sec-bg.jpg);">-->
                    
                <!--    <div class="pd_top_100"></div>-->
                    
                <!--    <div class="container">-->
                <!--        <div class="row">-->
                <!--            <div class="tabs_all_box  tabs_all_box_start type_one">-->
                <!--                <div class="tab_over_all_box">-->
                <!--                    <div class="tabs_header clearfix">-->
                <!--                        <ul class="showcase_tabs_btns nav-pills nav   clearfix">-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="s_tab_btn nav-link active" data-tab="#tabtabone">01. Affordable</a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">02. Knowledge</a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="s_tab_btn nav-link" data-tab="#tabtabthree">03. Saves Time</a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="s_tab_btn nav-link" data-tab="#tabtabtfour">04. Fast &amp; Quality</a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="s_tab_btn nav-link" data-tab="#tabtabfive">05. Experienced</a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                        <div class="toll_free">-->
                <!--                            <a href="tel:180667586677"> <i class="icon-phone-call"></i>Call For Free-->
                <!--                                Consultation</a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="s_tab_wrapper">-->
                <!--                        <div class="s_tabs_content">-->
                <!--                            <div class="s_tab fade active-tab show" id="tabtabone">-->
                <!--                                <div class="tab_content one" style="background-image:url(assets/images/tab-image.jpg)">-->
                <!--                                    <div class="content_image">-->
                <!--                                        <h6>Why Creote</h6>-->

                <!--                                        <h2>Affordable &amp; Flexible</h2>-->

                <!--                                        <p>Must explain too you how all this mistaken idea of denouncing pleasures-->
                <!--                                            praising pain was born and we will give you complete account of the system-->
                <!--                                            the actual teachings of the great explorer.</p>-->

                <!--                                        <a href="#" target="_blank" rel="nofollow" class="rd_more">Read More <i class="icon-right-arrow"></i></a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="s_tab fade" id="tabtabthree">-->
                <!--                                <div class="tab_content one" style="background-image:url(assets/images/blog/blog-image-8.jpg)">-->
                <!--                                    <div class="content_image">-->
                <!--                                        <h6>Why Creote</h6>-->

                <!--                                        <h2>Affordable &amp; Flexible</h2>-->

                <!--                                        <p>Must explain too you how all this mistaken idea of denouncing pleasures-->
                <!--                                            praising pain was born and we will give you complete account of the system-->
                <!--                                            the actual teachings of the great explorer.</p>-->

                <!--                                        <a href="#" target="_blank" rel="nofollow" class="rd_more">Read More <i class="icon-right-arrow"></i></a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="s_tab fade" id="tabtabthree">-->
                <!--                                <div class="tab_content one" style="background-image:url(assets/images/banner-five-bg.jpg)">-->
                <!--                                    <div class="content_image">-->
                <!--                                        <h6>Why Creote</h6>-->

                <!--                                        <h2>Affordable &amp; Flexible</h2>-->

                <!--                                        <p>Must explain too you how all this mistaken idea of denouncing pleasures-->
                <!--                                            praising pain was born and we will give you complete account of the system-->
                <!--                                            the actual teachings of the great explorer.</p>-->

                <!--                                        <a href="#" target="_blank" rel="nofollow" class="rd_more">Read More <i class="icon-right-arrow"></i></a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="s_tab fade" id="tabtabfour">-->
                <!--                                <div class="tab_content one" style="background-image:url(assets/images/home-4-about-1.html)">-->
                <!--                                    <div class="content_image">-->
                <!--                                        <h6>Why Creote</h6>-->

                <!--                                        <h2>Affordable &amp; Flexible</h2>-->

                <!--                                        <p>Must explain too you how all this mistaken idea of denouncing pleasures-->
                <!--                                            praising pain was born and we will give you complete account of the system-->
                <!--                                            the actual teachings of the great explorer.</p>-->

                <!--                                        <a href="#" target="_blank" rel="nofollow" class="rd_more">Read More <i class="icon-right-arrow"></i></a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="s_tab fade" id="tabtabfive">-->
                <!--                                <div class="tab_content one" style="background-image:url(assets/images/image-about-ls.html)">-->
                <!--                                    <div class="content_image">-->
                <!--                                        <h6>Why Creote</h6>-->

                <!--                                        <h2>Affordable &amp; Flexible</h2>-->

                <!--                                        <p>Must explain too you how all this mistaken idea of denouncing pleasures-->
                <!--                                            praising pain was born and we will give you complete account of the system-->
                <!--                                            the actual teachings of the great explorer.</p>-->

                <!--                                        <a href="#" target="_blank" rel="nofollow" class="rd_more">Read More <i class="icon-right-arrow"></i></a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                    
                <!--    <div class="pd_bottom_90"></div>-->
                    
                <!--</section>-->
                <!---tab-end--->
                <!---team--->
                <div class="pd_bottom_80"></div>
                     
                     <section class="team-section">
                      <div class="container">
                         <div class="row align-items-end">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="title_all_box style_one  dark_color">
                                    <div class="title_sections">
                                        <div class="before_title"> Dedicated Team</div>
                                        <h2>Professional Individuals</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="description_box">
                                    <p>Our power of choice is untrammelled and when nothing prevents being able to do what we
                                        like best every pleasure.</p>
                                    
                                    <div class="mr_bottom_20"></div>
                                    
                                </div>
                            </div>
                            
                            <div class="mr_bottom_30"></div>
                            
                        </div>
                        
                        <div class="row">
                             <?php 
                             $team = $db->query("SELECT * FROM tbl_team");
                            while ($t = $team->fetch()) {
                    ?>
                           <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                              <div class="team_box style_four">
                                 <div class="team_box_outer">
                                    <div class="image_box ">
                                       <img src="admin/images/team/<?php echo $t['image']; ?>" alt="team image">
                                    </div>
                                    <div class="content_box ">
                                       <!-- <div class="share_links ">
                                          <ul class="clearfix ">
                                             <li><a href="#"> <i class="fa fa-facebook"> </i> </a></li>
                                             <li><a href="#"> <i class="fa fa-twitter"> </i> </a></li>
                                             <li><a href="#"> <i class="fa fa-skype"> </i> </a></li>
                                             <li><a href="#"> <i class="fa fa-instagram"> </i> </a></li>
                                          </ul>
                                       </div> -->
                                       <h2> <a href="#" target="_blank" rel="nofollow">
                                             <?php echo $t['name']; ?></a>
                                       </h2>
                                       <h6 class="job_details"><?php echo $t['design']; ?></h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           
                          
                        </div>
                      </div>  
                     </section>
                     
                     <div class="pd_bottom_80"></div>
                <!---team-end--->
              
            </div>
            <!--===============PAGE CONTENT END==============-->
            <!--===============PAGE CONTENT END==============-->
        </div>
        <!---============== wrapper_full =================-->
        <!---==============footer start =================-->
        <?php include 'footer.php' ?>
        <!---==============footer end =================-->
        <!---==============mobile menu =================-->
        <div class="crt_mobile_menu">
            <div class="menu-backdrop"></div>
            <nav class="menu-box">
                <div class="close-btn"><i class="icon-close"></i></div>
                <form role="search" method="get" action="#">
                    <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
                    <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
                </form>
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
   <?php include 'scripts.php'; ?>
    <!---========================== javascript ==========================-->
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jul 2023 11:27:58 GMT -->

</html>