<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {

    $current_email = $_POST['email_id'];
    $userId = $_SESSION['supplier_data']['id'];
    $select = "SELECT email FROM tbl_supplier WHERE id !='$userId'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    $row['email'];
    if ($current_email !=  $row['email']) {
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $update = "UPDATE tbl_supplier SET company_name='$company_name',email = '$current_email', address= '$address', password='$password'  WHERE id='$userId'";
        $result = mysqli_query($conn, $update);
        if ($result) {
            echo "<script type='text/javascript'>alert('updated!');</script>";
            echo '<script>window.location.href = "home.php";</script>';
        } else {
            echo "<script type='text/javascript'>alert('Something went Wrong!');</script>";
            echo '<script>window.location.href = "home.php";</script>';
        }
    } else {
        echo "<script type='text/javascript'>alert('Email Id already exist!');</script>";
        echo '<script>window.location.href = "home.php";</script>';
    }
}

?>

<?php 
include 'includes/side-bar.php';
?>

<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Profile Setting</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post">
                        <?php
                        $userId = $_SESSION['supplier_data']['id'];

                        $select = 'SELECT * FROM tbl_supplier WHERE id = "' . $userId . '" LIMIT 1';
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <div class="mb-3 row col-12">
                                <input type="hidden" class="form-control" id="admin_id" aria-describedby="admin_id" name="admin_id" value="<?php echo $row['id']; ?>">

                                <!--<div class="mb-3 col-lg-6">-->
                                <!--    <label for="name" class="form-label">Name </label>-->
                                <!--    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="<?php echo $row['name']; ?>">-->
                                <!--</div>-->
                                <div class="mb-3 col-lg-6">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" aria-describedby="company_name" name="company_name" value="<?php echo $row['company_name']; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row col-12">
                                <div class="mb-3 col-lg-6">
                                    <label for="email_id" class="form-label">Email Id</label>
                                    <input type="text" class="form-control" id="email_id" aria-describedby="email_id" name="email_id" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            
                          
                            <div class="mb-3 row col-12">
                                <div class="mb-3 col-lg-6">
                                    <label for="password" class="form-label"> Password </label>
                                    <input type="text" class="form-control" id="password" aria-describedby="password" name="password" value="<?php echo $row['password']; ?>">
                                </div>

                            </div>
                            
                             <div class="mb-3 row col-12">
                                <div class="mb-3 col-lg-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" aria-describedby="address" name="address" ><?php echo $row['address']; ?></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" value="update" name="update">Submit</button>
                    </form>
                    <!-- end of form  -->

                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>