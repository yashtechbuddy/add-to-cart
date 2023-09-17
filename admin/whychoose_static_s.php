<?php
include 'includes/header.php';
?>
<?php

if (isset($_POST['why_choose'])) {
    $title = $_POST['title'];
    $alt_tag = $_POST['alt_tag'];
    $alt_tag1 = $_POST['alt_tag1'];
    
    // Define the field names and their corresponding array keys
    $field_data = array(
        'title' => $title,
        'alt_tag' => $alt_tag,
        'alt_tag1' => $alt_tag1
    );
    
    
     // Define the image columns
    $image_data = array(
        'background_image', 
        'background_image1'
    );

    foreach ($image_data as $image_column) {
        if (isset($_FILES[$image_column]) && $_FILES[$image_column]['error'] === 0) {
            $select_image_query = "SELECT $image_column FROM tbl_supplier_whychoose WHERE id = 1";
            $result = mysqli_query($conn, $select_image_query);
            $row = mysqli_fetch_assoc($result);
            $existing_image = $row[$image_column];
            if ($existing_image) {
                unlink("images/supplier/" . $existing_image);
            }

            $image_name = $image_column."_" . $_FILES[$image_column]['name'];
            $image_tmp = $_FILES[$image_column]['tmp_name'];
            move_uploaded_file($image_tmp, "images/supplier/" . $image_name);
            $update_image_query = "UPDATE tbl_supplier_whychoose SET $image_column='$image_name' WHERE id = 1";
            mysqli_query($conn, $update_image_query);
        }
    }


        // if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] === 0) {
        //     $select_image_query = "SELECT background_image FROM tbl_buyer_whychoose WHERE id = 1";
        //     $result = mysqli_query($conn, $select_image_query);
        //     $row = mysqli_fetch_assoc($result);
        //     $existing_image = $row['background_image'];
        //     if ($existing_image) {
        //         unlink("images/buyer/" . $existing_image);
        //     }

        //     $image_name = "background_image_" . $_FILES['background_image']['name'];
        //     $image_tmp = $_FILES['background_image']['tmp_name'];
        //     move_uploaded_file($image_tmp, "images/buyer/" . $image_name);
        //     $update_image_query = "UPDATE tbl_buyer_whychoose SET background_image='$image_name' WHERE id = 1";
        //     mysqli_query($conn, $update_image_query);
        // }
    
    
    $update_query = "UPDATE tbl_supplier_whychoose SET ";
   
    foreach ($field_data as $field_name => $field_value) {
        $update_query .= "$field_name='$field_value', ";
    }
    $update_query = rtrim($update_query, ', '); // Remove trailing comma
    $update_query .= " WHERE id = 1";

    if (mysqli_query($conn, $update_query)) {
        echo "<script type='text/javascript'>alert('Record updated successfully');";
        echo "window.location.href = 'supplier-whychoose.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>

<?php 
include 'includes/side-bar.php';
?>

<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30 p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Supplier Why choose Us</h4>
                    </div>
                    <?php

                    $Select = 'SELECT * FROM `tbl_supplier_whychoose` where id=1';
                    if ($result = mysqli_query($conn, $Select)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                // print_r($rows);

                    ?>
                               
                                <form class="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="id" />
                                    <div class="mb-3 row col-12">
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Title :-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $rows['title']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Background :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image" id="fileupload">
                                                        <img  src="images/supplier/<?php echo $rows['background_image']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Right Side Image:-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image1" id="fileupload">
                                                        <img  src="images/supplier/<?php echo $rows['background_image1']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag1" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag1']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        

                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4" value="reg" name="why_choose">Submit</button>

                                </form>
                                <!-- end of form  -->
                    <?php
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?><?php
include 'includes/header.php';
?>
<?php

if (isset($_POST['why_choose'])) {
    $title = $_POST['title'];
    $alt_tag = $_POST['alt_tag'];
    $alt_tag1 = $_POST['alt_tag1'];
    
    // Define the field names and their corresponding array keys
    $field_data = array(
        'title' => $title,
        'alt_tag' => $alt_tag,
        'alt_tag1' => $alt_tag1
    );
    
    
     // Define the image columns
    $image_data = array(
        'background_image', 
        'background_image1'
    );

    foreach ($image_data as $image_column) {
        if (isset($_FILES[$image_column]) && $_FILES[$image_column]['error'] === 0) {
            $select_image_query = "SELECT $image_column FROM tbl_buyer_whychoose WHERE id = 1";
            $result = mysqli_query($conn, $select_image_query);
            $row = mysqli_fetch_assoc($result);
            $existing_image = $row[$image_column];
            if ($existing_image) {
                unlink("images/buyer/" . $existing_image);
            }

            $image_name = $image_column."_" . $_FILES[$image_column]['name'];
            $image_tmp = $_FILES[$image_column]['tmp_name'];
            move_uploaded_file($image_tmp, "images/supplier/" . $image_name);
            $update_image_query = "UPDATE tbl_supplier_whychoose SET $image_column='$image_name' WHERE id = 1";
            mysqli_query($conn, $update_image_query);
        }
    }


        // if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] === 0) {
        //     $select_image_query = "SELECT background_image FROM tbl_buyer_whychoose WHERE id = 1";
        //     $result = mysqli_query($conn, $select_image_query);
        //     $row = mysqli_fetch_assoc($result);
        //     $existing_image = $row['background_image'];
        //     if ($existing_image) {
        //         unlink("images/buyer/" . $existing_image);
        //     }

        //     $image_name = "background_image_" . $_FILES['background_image']['name'];
        //     $image_tmp = $_FILES['background_image']['tmp_name'];
        //     move_uploaded_file($image_tmp, "images/buyer/" . $image_name);
        //     $update_image_query = "UPDATE tbl_buyer_whychoose SET background_image='$image_name' WHERE id = 1";
        //     mysqli_query($conn, $update_image_query);
        // }
    
    
    $update_query = "UPDATE tbl_buyer_whychoose SET ";
   
    foreach ($field_data as $field_name => $field_value) {
        $update_query .= "$field_name='$field_value', ";
    }
    $update_query = rtrim($update_query, ', '); // Remove trailing comma
    $update_query .= " WHERE id = 1";

    if (mysqli_query($conn, $update_query)) {
        echo "<script type='text/javascript'>alert('Record updated successfully');";
        echo "window.location.href = 'buyer-whychoose.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>
<!--set buyer benefite -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
?>
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="./images/footer/<?php echo $row['logo']; ?>" height="70" width="70" alt="<?php echo $row['alt_tag']; ?>"></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
            <li class="">
            <a class="" href="home.php" aria-expanded="false">

                <img src="assets/img/menu-icon/1.svg" alt>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Home</span>
            </a>
            <ul>
               <li><a href="manage-banner.php">Banner</a></li>
               <li><a href="manage-extra.php">Extra</a></li>
            </ul>
        </li>


      
        
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>About Us</span>
            </a>
            <ul>
                <li><a href="about-us.php" class="active">About Us</a></li>
               <li><a href="mission-vission-goal.php">Mission,Vission,Goals</a></li>
                <li><a href="Team.php">Team</a></li>
            </ul>
        </li>

        
         <li class ="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Buyer Section</span>
            </a>
            <ul>
               <li><a href="buyer-benefits.php" >Benefits</a></li>
             <li><a href="buyer-whychoose.php" class="active">Why choose us</a></li>
            </ul>
        </li>

        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Supplier Section</span>
            </a>
            <ul>
              <li><a href="supplier-benefits.php">Benefits</a></li>
                <li><a href="supplier-whychoose.php">Why choose us</a></li>
            </ul>
        </li>
        <li>
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
        <li>
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
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-truck"></i>
                <span>Manage Supplier</span>
            </a>
            <ul>
                <li><a href="manage-supplier.php">Supplier</a></li>
                <li><a href="supplier-product.php">Product</a></li>
            </ul>
        </li>
        <li class>
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
        <li class>
            <a class="" href="manage-inquiry.php" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Manage Inquiry</span>
            </a>
            <!-- <ul>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul> -->
        </li>
       

          <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>Manage FAQs</span>
            </a>
            <ul>
                <li><a href="faqs-customer.php">Customer FAQs</a></li>
                <li><a href="faqs-supplier.php">Supplier FAQs</a></li>
            </ul>
        </li>
        <li class="">
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
         
         <li class="">
            <a class="" href="manage-blog.php" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>Blog</span>
            </a>
        </li>

        <li class="">
            <a class="" href="manage-seo.php" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span>SEO</span>
            </a>
        </li>

        <li class>
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


<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30 p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Buyer Why choose Us</h4>
                    </div>
                    <?php

                    $Select = 'SELECT * FROM `tbl_buyer_whychoose` where id=1';
                    if ($result = mysqli_query($conn, $Select)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                // print_r($rows);

                    ?>
                               
                                <form class="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="id" />
                                    <div class="mb-3 row col-12">
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Title :-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $rows['title']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Background :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image" id="fileupload">
                                                        <img  src="images/buyer/<?php echo $rows['background_image']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Right Side Image:-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image1" id="fileupload">
                                                        <img  src="images/buyer/<?php echo $rows['background_image1']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag1" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag1']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        

                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4" value="reg" name="why_choose">Submit</button>

                                </form>
                                <!-- end of form  -->
                    <?php
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>