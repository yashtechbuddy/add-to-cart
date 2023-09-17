<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$footerl = mysqli_query($conn, $select);
$sidebarlogo = mysqli_fetch_assoc($footerl);
?>
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="home.php"><img src="./images/footer/<?php echo $sidebarlogo['logo']; ?>" height="70" width="70" alt="<?php echo $sidebarlogo['alt_tag']; ?>"></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        
        <li class="">
            <a class="" href="home.php" aria-expanded="false">

               <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
               <i class="fa-solid fa-file"></i>
                <span>Home</span>
            </a>
            <ul>
               <li><a href="manage-banner.php">Banner</a></li>
               <!--<li><a href="manage-extra.php">Extra</a></li>-->
            </ul>
        </li>


      
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fa-solid fa-file"></i>
                <span>About Us </span>
            </a>
            <ul>
                <li><a href="about-us.php" >About Us</a></li>
               <li><a href="mission-vission-goal.php">Mission,Vission,Goals</a></li>
                <li><a href="team.php">Team</a></li>
            </ul>
        </li>

        
         <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
               <i class="fa-solid fa-file"></i>
                <span>Buyer Section</span>
            </a>
            <ul>
               <li><a href="buyer-benefits.php">Benefits</a></li>
             <li><a href="buyer-whychoose.php">Why choose us</a></li>
            </ul>
        </li>

        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Supplier Section</span>
            </a>
            <ul>
              <li><a href="supplier-benefits.php">Benefits</a></li>
                <li><a href="supplier-whychoose.php">Why choose us</a></li>
            </ul>
        </li>
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>Manage Employee</span>
            </a>
            <ul>
                <li><a href="manage-employee.php">Employees</a></li>
                <li><a href="manage-department.php">Departments</a></li>
                <li><a href="manage-role.php">Roles</a></li>
            </ul>
        </li>
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-box"></i>
                <span>Manage Products</span>
            </a>
            <ul>
                <li><a href="manage-category.php">Categorys</a></li>
                <!-- <li><a href="manage-department.php">Sub-Categorys</a></li> -->
                <li><a href="manage-product.php">Products</a></li>
            </ul>
        </li>
        
        <!-- <li class="">-->
        <!--    <a class="has-arrow" href="#" aria-expanded="false">-->
        <!--        <i class="fas fa-truck"></i>-->
        <!--        <span>Verified supplier </span>-->
        <!--    </a>-->
        <!--    <ul>-->
        <!--        <li><a href="manage-supplier-request.php">Request</a></li>-->

        <!--    </ul>-->
        <!--</li>-->
        
        
        <!--<li class="">-->
        <!--    <a class="has-arrow" href="#" aria-expanded="false">-->
        <!--        <i class="fas fa-truck"></i>-->
        <!--        <span>Supplier Request</span>-->
        <!--    </a>-->
        <!--    <ul>-->
        <!--        <li><a href="manage-supplier-request.php">Request</a></li>-->
               
        <!--    </ul>-->
        <!--</li>-->
         <li class="">
            <a class="" href="manage-general-inquiry.php" aria-expanded="false">
                <i class="fa-solid fa-circle-question"></i>
                <span>General Inquiry</span>
            </a>
        </li>
         <li class="">
            <a class="" href="manage-supplier-request.php" aria-expanded="false">
                <i class="fas fa-truck"></i>
                <span>Supplier Request</span>
            </a>
        </li>
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-truck"></i>
                <span>Manage Supplier</span>
            </a>
            <ul>
                <li><a href="manage-supplier.php">Supplier</a></li>
                <li><a href="supplier-product.php">Products</a></li>
            </ul>
        </li>
        
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="manage-customer.php" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>Manage Customer</span>
            </a>
            <!-- <ul>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul> -->
        </li>
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="manage-customer-inquiry.php" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Customer Inquiry</span>
            </a>
        </li>
        
        <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="master-inquiry.php" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Process Inquiry</span>
            </a>
        </li>
        
         <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="master-inquiry.php" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>final Quatation Inquiry</span>
            </a>
        </li>

          <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>Manage FAQs</span>
            </a>
            <ul>
                <li><a href="faqs-customer.php">Customer FAQs</a></li>
                <li><a href="faqs-supplier.php">Supplier FAQs</a></li>
            </ul>
        </li>
          <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="contact-us-setting.php" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>Contact Us</span>
            </a>
            <!-- <ul>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul> -->
        </li>
         
         <li class="<?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
            <a class="" href="manage-blog.php" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>Blog</span>
            </a>
        </li>

        <li class="<?php if($_SESSION['admin_id'] != 1 ){ echo "d-none" ;} ?>">
            <a class="" href="manage-seo.php" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>SEO</span>
            </a>
        </li>

       <li class="<?php if($_SESSION['admin_id'] != 1){ echo "d-none" ;} ?>">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-file"></i>
                <span>Manage Pages</span>
            </a>
            <ul>
                <li><a href="header-setting.php">Header setting</a></li>
                <li><a href="footer-setting.php">Footer Setting</a></li>
                <li><a href="setting.php">Main Setting</a></li>
                <li><a href="logos.php">Logo</a></li>
            </ul>
        </li>
       
    </ul>
</nav>