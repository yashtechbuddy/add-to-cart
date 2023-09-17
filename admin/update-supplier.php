<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {
    $supplierId = $_POST['sid'];
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    // $confirm_password = $_POST['confirm_password'];
    $phone_no = $_POST['phone_no'];
    $whatapp_no = $_POST['whatsapp_no'];
    $address = $_POST['address'];
    $gst_number = $_POST['gst_no'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    $query = "UPDATE 
    tbl_supplier SET  company_name='$company_name',
    email='$email',phone_no=$phone_no,whatsapp_no=$whatapp_no,
    address='$address',gst_number='$gst_number',
    description='$description', status_id='$status' WHERE id='$supplierId' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "manage-supplier.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "manage-supplier.php";</script>';
    }
}

?>




<?php 
include 'includes/side-bar.php';
include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Updation Supplier</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-supplier']) or isset($_POST['view-supplier']) ) {
                        $isViewMode = isset($_POST['view-supplier']);
                        $supplierid = $_POST['sid'];
                        $Select = 'SELECT tbl_supplier.* , tbl_supplier.id as sid FROM tbl_supplier
                        WHERE tbl_supplier.id = "' . $supplierid . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // print_r($row);

                    ?>
                                    <!-- start form New supplier -->
                                    <form class="" method="post" action="" >
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <input type="hidden" value="<?php echo $supplierid; ?>" name="sid">
                                                <label for="conpanyName" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" id="conpanyName" aria-describedby="companyName" name="company_name" <?php echo $isViewMode ? 'disabled' : ''; ?> value="<?php echo $row['company_name']; ?> ">
                                            </div>

                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <label for="email" class="form-label">Email </label>
                                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"  <?php echo $isViewMode ? 'disabled' : ''; ?> value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <label for="password" class="form-label">Password </label>
                                                <input type="password" class="form-control" id="password" aria-describedby="password" name="password" value="<?php echo $row['password']; ?>">
                                            </div>
                                        </div> -->

                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="mobileNo" class="form-label">Phone No </label>
                                                <input type="text" class="form-control" id="MobileNo" aria-describedby="phone_no" name="phone_no" value="<?php echo $row['phone_no']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="whatsappNo" class="form-label">Whatsapp No </label>
                                                <input type="text" class="form-control" id="whatsappNo" aria-describedby="whatsapp_no" name="whatsapp_no" <?php echo $isViewMode ? 'disabled' : ''; ?> value="<?php echo $row['whatsapp_no']; ?>">

                                            </div>
                                        </div>

                                        <div class="mb-3 row col-12">
                                            <label for="address" class="form-label">Address </label>
                                            <div class="mb-3 col-12">
                                                <textarea name="address" class="form-control" rows="5" id="" <?php echo $isViewMode ? 'disabled' : ''; ?> style="resize: none; border-color: light;"><?php echo $row['address']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="gstNo" class="form-label">gst No </label>
                                                <input type="text" class="form-control" id="gstNo" aria-describedby="gst_no" name="gst_no" <?php echo $isViewMode ? 'disabled' : ''; ?> value="<?php echo $row['gst_number']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="status" class="form-label">Status</label>
                                                <div>
                                                    <select class="form-control dropdown" id="status" name="status" <?php echo $isViewMode ? 'disabled' : ''; ?> >
                                                        <option disabled="" selected="" id="status" name="status">--Choose Status -- </option>

                                                        <?php
                                                        $sql = 'SELECT * FROM tbl_supplier_status';
                                                        $result = mysqli_query($conn, $sql);
                                                        if ($result && mysqli_num_rows($result) > 0) {

                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                if ($row['status_id'] === $rows['id']) {
                                                                    echo "<option selected='' id='" . $rows['supplier_status'] . "' value='" . $rows['id'] . "' name='status'>" . $rows['supplier_status'] . "</option>";
                                                                } else {

                                                                    echo "<option id='" . $rows['supplier_status'] . "' value='" . $rows['id'] . "' name='status'>" . $rows['supplier_status'] . "</option>";
                                                                }
                                                            }
                                                        } else {
                                                            echo 'No data found.';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row col-12">
                                            <label for="description" class="form-label">Description </label>
                                            <div class="mb-3 col-12">
                                                <textarea name="description" class="form-control" rows="5" id="" <?php echo $isViewMode ? 'disabled' : ''; ?> style="resize: none; border-color: light;"><?php echo $row['description']; ?></textarea>
                                            </div>

                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary"  value="update" style="visibility:<?php echo $isViewMode ? 'hidden' : ''; ?>" name="update">Submit</button>

                                    </form>
                                    <!-- end of form  -->
                    <?php
                                }
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