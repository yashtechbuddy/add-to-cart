<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['Registration'])) {
    $message = "hello";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dept = $_POST['dept'];
    $role = $_POST['role'];
    $number = $_POST['number'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    $query = "INSERT INTO tbl_user(name,email,password,dept_id,role_id,mobile_no,description,emp_status) VALUES 
    ('$name','$email','$password',$dept,$role,$number,'$description','$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo "<script type='text/javascript'>alert('Inserted!');</script>";
        if ($dept === 'Administration') {
            echo '<script>window.location.href = "manage-admin.php";</script>';
        } else {
            echo '<script>window.location.href = "manage-employee.php";</script>';
        }
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "manage-employee.php";</script>';
    }
}

?>
<!--add-employees -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
?>
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="images/footer/<?php echo $row['logo']; ?>" height="70" width="70" alt="<?php echo $row['alt_tag']; ?>"></a>
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

        
         <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Buyer Section</span>
            </a>
            <ul>
               <li><a href="buyer-benefits.php">Benefits</a></li>
             <li><a href="buyer-whychoose.php">Why choose us</a></li>
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
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>Manage Employee</span>
            </a>
            <ul>
                <li><a href="manage-employee.php" class="active">Employees</a></li>
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
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Add User</h4>
                    </div>
                    <!-- start form New employee -->
                    <form class="" method="post" action="add-employee.php">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                            </div>
                            <!-- <div class="mb-3 col-lg-6">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div> -->
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Department </label>
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                <div>
                                    <select class="form-control" id="dept" name="dept">
                                        <option disabled="" selected="">--Choose Department -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_dept';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputPassword1" class="form-label">Role</label>
                                <div>
                                    <select class="form-control dropdown" id="role" name="role">
                                        <option disabled="" selected="" id="role">-- Choose Role -- </option>

                                    </select>
                                </div>
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label">Mobile No </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="number">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="status" class="form-label">Status</label>
                                <div>
                                    <select class="form-control dropdown" id="status" name="status">
                                        <option disabled="" selected="" id="status" name="status">--Choose Status -- </option>

                                        <?php
                                        $sql = 'SELECT * FROM tbl_emp_status';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['emp_status'] . "' value='" . $row['id'] . "' name='status'>" . $row['emp_status'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>

                        <div class="mb-3 row col-12">
                            <label for="exampleInputEmail1" class="form-label">Description </label>
                            <div class="mb-3 col-12">
                                <textarea name="description" class="form-control" rows="5" id="" style="resize: none; border-color: light;"></textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" value="reg" name="Registration">Submit</button>

                    </form>
                    <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>