<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {
    $customerid = $_POST['cid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    // $password = $_POST['password'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $company_name = $_POST['company_name'];
    $gst_number = $_POST['gst_no'];

    // Prepare the SQL statement
    $query = "UPDATE tbl_customer
SET name = '$name',
email_id = '$email',
phone_no = '$phone_no',
country = '$country',
    state = '$state',
    city = '$city',
    address = '$address',
    company_name = '$company_name',
    gst_number = '$gst_number'
WHERE id = $customerid;
";
    $stmt = mysqli_query($conn, $query);

    if ($stmt) {

        echo '<script>alert("Details are updated!");</script>';
        echo '<script>window.location.href = "manage-customer.php";</script>';
    } else {
        echo '<script>alert("Something went Wrong!");</script>';
        echo '<script>window.location.href = "manage-customer.php";</script>';
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
                        <h4>Update Employee</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-customer'])) {
                        $customerid = $_POST['cid'];
                        $Select = 'SELECT tbl_customer.* ,
                        tbl_customer.id as uid from tbl_customer
                        WHERE tbl_customer.id = "' . $customerid . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // print_r($row);

                    ?>
                                    <!-- start form update customer -->
                                  

                                        <div class="mb-3 row col-12">
                                            <input type="hidden" name="cid" value="<?php echo $customerid ?>">
                                            <div class="mb-3 col-lg-12">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" aria-describedby="custmerName" name="name" value="<?php echo $row['name']; ?>">
                                            </div>

                                        </div>

                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="email" class="form-label">Email </label>
                                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $row['email_id']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="phone_no" class="form-label">Phone No</label>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" value="<?php echo $row['phone_no']; ?>">
                                            </div>

                                        </div>


                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="company_name" class="form-label">Company Name </label>
                                                <input type="text" class="form-control" id="company_name" aria-describedby="company_name" name="company_name" value="<?php echo $row['company_name']; ?>">
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="company_name" class="form-label">GST No</label>
                                                <input type="text" class="form-control" id="company_name" aria-describedby="company_name" name="gst_no" value="<?php echo $row['gst_number']; ?>">
                                            </div>

                                        </div>

                                        <div class="mb-3 row col-12">

                                            <div class="mb-3 col-lg-6">
                                                <label for="country" class="form-label">Country </label>
                                                <input type="text" class="form-control" id="country" aria-describedby="country" name="country" value="<?php echo $row['country']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="state" class="form-label">State </label>
                                                <input type="text" class="form-control" id="state" aria-describedby="state" name="state" value="<?php echo $row['state']; ?>">
                                            </div>
                                        </div>


                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" aria-describedby="city" name="city" value="<?php echo $row['city']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="address" class="form-label">Address </label>
                                                <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="<?php echo $row['address']; ?>">
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary" value="reg" name="update">Submit</button>

                                   
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