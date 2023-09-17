<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['Registration'])) {
    
    function generateRandomPassword($length = 8) {
    $characters = '0123456789'; // You can include other characters if needed
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
    }

    $message = "";
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    
    $password = generateRandomPassword(8);
    $phone_no = $_POST['phone_no'];
    $whatapp_no = $_POST['whatsapp_no'];
    $address = $_POST['address'];
    $gst_number = $_POST['gst_no'];
    $description = $_POST['description'];
    $status = empty($_POST['status'])? 2:$_POST['status'];
    
     $checkQuery = "SELECT * FROM tbl_supplier WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Email address already exists, display an error message or handle as needed
        echo "<script type='text/javascript'>alert('Email address already exists!');</script>";
        echo '<script>window.location.href = "manage-supplier.php";</script>';
    } else {
        
        if(isset($password)){
        $query = "INSERT INTO tbl_supplier(company_name,email,phone_no,whatsapp_no,address,gst_number,description,status_id,password) 
        VALUES ('$company_name','$email','$phone_no',$whatapp_no,'$address','$gst_number','$description','$status','$password')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script type='text/javascript'>alert('Inserted!');</script>";
            echo '<script>window.location.href = "manage-supplier.php";</script>';
        } else {
            echo "<script type='text/javascript'>alert('Something went!');</script>";
            echo '<script>window.location.href = "manage-supplier.php";</script>';
        }
   }
        
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
                        <h4>Add Supplier</h4>
                    </div>
                    <!-- start form New employee -->
                    <form class="" method="post" action="">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="conpanyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="conpanyName" aria-describedby="companyName" name="company_name">
                            </div>

                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                            </div>
                        </div>

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="mobileNo" class="form-label">Phone No </label>
                                <input type="text" class="form-control" id="MobileNo" aria-describedby="emailHelp" name="phone_no">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="whatsappNo" class="form-label">Whatsapp No </label>
                                <input type="text" class="form-control" id="whatsappNo" aria-describedby="emailHelp" name="whatsapp_no">

                            </div>
                        </div>

                        <div class="mb-3 row col-12">
                            <label for="address" class="form-label">Address </label>
                            <div class="mb-3 col-12">
                                <textarea name="address" class="form-control" rows="5" id="" style="resize: none; border-color: light;"></textarea>
                            </div>

                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="gstNo" class="form-label">gst No </label>
                                <input type="text" class="form-control" id="gstNo" aria-describedby="emailHelp" name="gst_no">
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
                        </div>

                        <div class="mb-3 row col-12">
                            <label for="description" class="form-label">Description </label>
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