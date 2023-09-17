<?php
$contact_stmt = $db->query("SELECT * FROM `tbl_contact_us`");
$contact = $contact_stmt->fetch();

$setting_stmt = $db->query("SELECT * FROM `tbl_settings`");
$setting = $setting_stmt->fetch();
?>



<style>
.ul-list {
    list-style: none;
    display: flex;
    align-items: center;
    background-color: var(--primary-color-one);
}

.display-picture {
    margin-left: auto;
}

.display-picture img {
    width: 50px;
    border-radius: 50%;
    border: 2px solid white;
}

.display-picture img:hover {
    border: 2px solid var(--primary-color-one);
}

.card-profile {
    transition: 0.5s ease;
}

.card-profile ul {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    background: #FFF;
    position: absolute;
    top: 4rem;
    right: 0rem;
    border-radius: 10px;
    padding: 10px 50px 10px 20px;
}

.card-profile ul li {
    padding: 5px 0 !important;
    color: grey;
    font-size: 14px !important;
}

.hidden {
    display: none;
}

/* .login-btn{
    background-color: var(--primary-color-one) ;
    padding: 0px !important;
}
.profile-link{
    color: white;
} */

/* .login-btn {
        
        background-color: var(--primary-color-one);
        color: white;
        padding: 15px 40px !important;
        border-radius: 5px;
       
    } */

/* Optional: Add hover effect */
/* .login-btn:hover {
        background-color:  #FFF;
        color: var(--primary-color-one);
        border: 1px solid var(--primary-color-one);
     
    } */
/* .profile-link{
        color: #FFF;
    } */
</style>




<!-- header 2 -->
<div class="header_area" id="header_contents">
    <header class="main-header header header_v13">
        <div class="header_top">
            <div class="default-container">
                <div class="header_top_inner">
                    <div class="top_left">
                        <ul class="top-links clearfix">
                            <li>
                                <a href="<?php $path ?>product.php" class="get_a_quote">Get a best quote </a>
                            <li>
                            <li>Welcome to our company.</li>
                        </ul>
                    </div>
                    <div class="top_right text-right">
                        <ul class="contact_info_two">
                            <li class="single">
                                <p> <span class="icon-telephone"></span> <a
                                        href="tel:+98 060 712 34"><?php echo $contact['phone'] ; ?></a>
                                </p>
                            </li>
                            <li class="single">
                                <p><span class="icon-mail"></span><a
                                        href="mailto:sendmail@creote.com"><?php echo $contact['email'] ; ?></a>
                                </p>
                            </li>
                            <li class="single">
                                <p> <span class="icon-location2"></span>
                                    <?php echo $contact['address'] ; ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar_outer get_sticky_header">
            <div class="default-container">
                <nav class="inner_box">
                    <div class="header_logo_box">
                        <a href="index.php" class="logo navbar-brand">
                            <img src="<?php echo $path ?>admin/images/logo/<?php echo $setting['app_logo']; ?>" alt="<?php echo $setting['app_name']; ?>" class="logo_default">
                            <img src="<?php echo $path ?>admin/images/logo/<?php echo $setting['app_logo']; ?>" alt="<?php echo $setting['app_name']; ?>" class="logo__sticky">
                        </a>
                    </div>
                    <div class="navbar_togglers hamburger_menu">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                    <div class="header_content header_content_collapse">
                      
                        <div class="header_menu_box">
                            <div class="navigation_menu">
                                <ul id="myNavbar" class="navbar_nav">
                                    <?php 
                                    $visibility_stmt = $db->query("SELECT * FROM pagevisibility where visibility = 1");
                                    $visible = $visibility_stmt->fetchAll();
                                    foreach ($visible as $menu) {
                                       
                                    ?>

                                    <li
                                        class="menu-item  menu-item-has-children nav-item <?php echo trim($curPageName) == trim($menu['page_link']) ? "active" : ""; ?>">
                                        <a href="<?php echo $path ?><?php echo $trimmedString = trim($menu['page_link']); ?>" class="nav-link">
                                            <span><?php echo $menu['page_name'] ?></span>

                                        </a>
                                    </li>
                                    <?php }?>
                              
                                    <?php if(isset($_SESSION['login-customer'])) { ?>
                                    <!-- <li
                                        class="menu-item menu-item-has-children  nav-item <?php if($curPageName == "login.php") echo "active" ?>">
                                        <a href="about-us.php" class="nav-link">
                                            <span>User</span>
                                        </a>
                                    </li> -->
                                    <!-- https://i.pravatar.cc/85 -->
                                    <span class="display-picture">
                                        <a href="account-setting.php"><img src="<?php echo $path ?>assets/images/user/user.png"
                                                alt="Profile Picture"></a>
                                    </span>

                                    <!-- Profile Image Dropdown -->
                                    <div class="card-profile">
                                        <a href="account-setting.php"></a>
                                        <!-- ADD TOGGLE HIDDEN CLASS ATTRIBUTE HERE -->
                                        <!-- <ul class="ul-list"> -->
                                        <!-- MENU -->
                                        <!-- <li><a href="#">Profile</a></li>
                                            <li><a href="#">Inquery Status</a></li>
                                            <li><a href="logout.php">Log Out</a></li> -->
                                        <!-- </ul> -->

                                    </div>

                                    <!-- <script>
                                    // JavaScript/jQuery to handle the toggle effect
                                    $(document).ready(function() {
                                        $(".display-picture").click(function() {
                                            $(".card-profile").toggleClass("hidden");
                                        });
                                    });
                                    </script> -->

                                    <style>
                                    /* Add this CSS to hide the dropdown by default */
                                    .hidden {
                                        display: none;
                                    }
                                    </style>



                                    <?php }else{ ?>
                                    <li
                                        class="login-btn menu-item menu-item-has-children  nav-item <?php if($curPageName == "login.php") echo "active" ?>">
                                        <a href="login.php" class="nav-link">
                                            <span>Login</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>


                        <ul class="navbar_right navbar_nav ">
                            <!-- <li>
                                            <button type="button" class="search-toggler"><i
                                                    class="icon-search"></i></button>
                                        </li> -->
                            <!-- <li>
                                            <div class="mini_cart_togglers header_side_cart">
                                                <div class="mini-cart-count">
                                                    0 </div>
                                                <i class="icon-shopping-bag1"></i>
                                            </div>
                                        </li> -->

                            <!-- <li>
                                <button type="button" class="contact-toggler"><i class="icon-menu1"></i></button>
                            </li> -->

                        </ul>
                    </div>

                </nav>


            </div>
        </div>
    </header>
    <!-- end of the loop -->
 
</a>
</div>
<!----header 2 end----->