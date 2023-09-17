<?php
include 'includes/header.php';
?>
<?php




if (isset($_POST['update'])) {
    
    $request_id = $_POST['req_id'];
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $whatsapp_no = $_POST['whatsapp_no'] ?? null;
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $inquiry_status = $_POST['inquiry_status'];
    $gst_no = $_POST['gst_no'];
    $company_address = $_POST['company_address'];
    $supplier_message = $_POST['supplier_message'];

    // Prepare and execute the UPDATE query
    $query = "UPDATE tbl_supplier_request SET 
              name = '$name', phone_no = '$phone_no', whatsapp_no = '$whatsapp_no', email = '$email', 
              company_name = '$company_name', status_id = '$inquiry_status', 
              gst_no = '$gst_no', company_address = '$company_address', 
              supplier_message = '$supplier_message'
              WHERE id = '$request_id'";
    
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Request Detail updated!");</script>';
        echo '<script>window.location.href = "manage-supplier-request.php";</script>';
    } else {
       echo '<script>alert("Something went wrong");</script>';
        echo '<script>window.location.href = "manage-supplier-request.php";</script>';
    }
    
    
    
    if (isset($_POST['inquiry_status']) && $_POST['inquiry_status'] == 4 ) {
        
        
        function generateRandomPassword($length = 5) {
            $characters = '0123456789';
            $password = '';
            
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            return $password;
        }
        
        $message = "";
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $password = generateRandomPassword();
        // $confirm_password = $_POST['confirm_password'];
        $phone_no = $_POST['phone_no'];
        $whatapp_no = $_POST['whatsapp_no'];
        $address = $_POST['company_address'];
        $gst_number = $_POST['gst_no'];
        $description = $_POST['description'];
   


        $query = "INSERT INTO tbl_supplier(company_name,email,phone_no,whatsapp_no,address,gst_number,description,password) 
        VALUES ('$company_name','$email','$phone_no',$whatapp_no,'$address','$gst_number','$description','$password')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script type='text/javascript'>alert('Supplier is onboarding');</script>";
            echo '<script>window.location.href = "manage-supplier.php";</script>';
        } else {
            echo "<script type='text/javascript'>alert('Something went!');</script>";
            echo '<script>window.location.href = "manage-supplier.php";</script>';
        }
   
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
                        <h4>Update Request</h4>
                    </div>

                    <!-- start form update inquiry -->
                    <form class="" method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" class="form-control" id="req_id" aria-describedby="req_id" name="req_id"
                            value="<?php echo $_GET['req_id']; ?>">

                        <?php

                        if (isset($_GET['req_id'])) {
                            
                            $request_id = $_GET['req_id'];
                           

                             $su = " SELECT * FROM tbl_supplier_request WHERE id =  $request_id";
                             $supplieru = mysqli_query($conn, $su);
                             $updatesupreq = mysqli_fetch_assoc($supplieru);

                        ?>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Name</label>
                                <input  type="text" class="form-control" id="name"
                                    aria-describedby="name" name="name" value="<?php echo $updatesupreq['name']; ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="phone_no" class="form-label">Phone no</label>
                                <input  type="text" class="form-control" id="phone_no"
                                    aria-describedby="phone_no" name="phone_no"
                                    value="<?php echo $updatesupreq['phone_no']; ?>">
                            </div>
                        </div>
                        
                        <div class="mb-3 row col-12">
                            <label for="supplier_message" class="form-label">Whatsapp No</label>
                            <div class="mb-3 col-12">
                                     <input  type="text" class="form-control" id="whatsapp_no"
                                        aria-describedby="whatsapp_no" name="whatsapp_no"
                                        value="<?php echo $updatesupreq['whatsapp_no']; ?>">
                            </div>
                        </div>
                          <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input  type="text" class="form-control" id="emailemailemail"
                                    aria-describedby="email" name="email" value="<?php echo $updatesupreq['email']; ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input  type="text" class="form-control" id="company_name"
                                    aria-describedby="company_name" name="company_name"
                                    value="<?php echo $updatesupreq['company_name']; ?>">
                            </div>
                        </div>


                        

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">status</label>
                                <div>
                                    <select class="form-control dropdown" id="inquiry_status" name="inquiry_status">
                                        <option ="" selected="" id="inquiry_status" name="inquiry_status">
                                            --Choose status -- </option>

                                        <?php
                                            $sql = 'SELECT * FROM tbl_supplier_request_status';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($updatesupreq['status_id'] == $row['id']) {

                                                        echo "<option selected='' id='" . $row['name'] . "' value='" . $row['id'] . "' name='status_id'>" . $row['name'] . "</option>";
                                                    } else {
                                                        echo "<option id='" . $row['name'] . "' value='" . $row['id'] . "' name='status_id'>" . $row['name'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>
                           
                             <div class="mb-3 col-lg-6">
                                <label for="gst_no" class="form-label">GST NO.</label>
                                <input  type="text" class="form-control" id="gst_no"
                                    aria-describedby="gst_no" name="gst_no"
                                    value="<?php echo $updatesupreq['gst_no']; ?>">
                            </div>
                        </div>
                       
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-6">
                            <label for="company_address" class="form-label">Company Address</label>
                                <textarea name="company_address" class="form-control" rows="5" id="" style="resize: none; border-color: light;"><?php echo $updatesupreq['company_address']; ?></textarea>
                            </div>
                            
                            <div class="mb-3 col-6">
                             <label for="supplier_message" class="form-label">Supplier Message </label>
                                <textarea name="supplier_message" class="form-control" rows="5" id="" style="resize: none; border-color: light;"><?php echo $updatesupreq['supplier_message']; ?></textarea>
                            </div>
                        </div>
                        
                                
                        <button type="submit" class="btn btn-primary" name="update">Submit</button>

                    </form>
                    <?php } ?>
                    <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>