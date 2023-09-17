<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['custreg'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    // $password = $_POST['password'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $company_name = $_POST['company_name'];
    $gst_no = $_POST['gst_no'];

    $query = "INSERT INTO tbl_customer(name,email_id,phone_no,country,state,city,address,company_name,gst_number) VALUES 
    ('$name','$email','$phone_no','$country','$state','$city','$address','$company_name','$gst_no')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'>alert('Inserted!');</script>";
        echo '<script>window.location.href = "manage-customer.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "manage-customer.php";</script>';
    }
}

?>
<!--add-employees -->
<!-- include 'includes/side-bar.php';-->


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
                        <h4>Add Customer</h4>
                    </div>
                    <!-- start form New customer -->
                    <form class="" method="post" action="">

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="custmerName" name="name">
                            </div>

                        </div>

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="phone_no" class="form-label">Phone No</label>
                                <input type="number" class="form-control" id="phone_no" name="phone_no">
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        </div>

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="company_name" class="form-label">Company Name </label>
                                <input type="text" class="form-control" id="company_name" aria-describedby="company_name" name="company_name">
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="company_name" class="form-label">GST No</label>
                                <input type="text" class="form-control" id="company_name" aria-describedby="company_name" name="gst_no">
                            </div>

                        </div>

                        <div class="mb-3 row col-12">

                            <div class="mb-3 col-lg-6">
                                <label for="country" class="form-label">Country </label>
                                <input type="text" class="form-control" id="country" aria-describedby="country" name="country">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="state" class="form-label">State </label>
                                <input type="text" class="form-control" id="state" aria-describedby="state" name="state">
                            </div>
                        </div>


                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" aria-describedby="city" name="city">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="address" class="form-label">Address </label>
                                <input type="text" class="form-control" id="address" aria-describedby="address" name="address">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" value="reg" name="custreg">Submit</button>

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