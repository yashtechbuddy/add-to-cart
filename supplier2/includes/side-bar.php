<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$footerl = mysqli_query($conn, $select);
$sidebarlogo = mysqli_fetch_assoc($footerl);
?>

<style>
    .active{
        color:black !important;
    }
    
    .active-i{
        color:black !important;
    }
</style>
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="./images/footer/<?php echo $sidebarlogo['logo']; ?>" height="70" width="70" alt="<?php echo $sidebarlogo['alt_tag']; ?>"></a>
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
    
        
        <li class="">
            <a class="" href="manage-inquiry.php" aria-expanded="false">
               <i class="fa-solid fa-file-lines"></i>
                <span>Manage Inquiry</span>
            </a>
        </li>
        <!--<li class="">-->
        <!--    <a class="has-arrow" href="#" aria-expanded="false">-->
        <!--        <i class="fa-solid fa-file-lines"></i>-->
        <!--        <span>Manage Inquiry</span>-->
        <!--    </a>-->
        <!--    <ul>-->
        <!--        <li><a href="manage-inquiry.php">Pending Inquiry</a></li>-->
        <!--        <li><a href="manage-in-process.php">In-process Request</a></li>-->
        <!--        <li><a href="manage-crack-inquiry.php">Crack Inquiry</a></li>-->
        <!--    </ul>-->
        <!--</li>-->


         <li class="">
            <a class="" href="products.php" aria-expanded="false">
               <i class="fa-brands fa-product-hunt"></i>
                <span>Your Products</span>
            </a>
        </li>
  
    </ul>
</nav>