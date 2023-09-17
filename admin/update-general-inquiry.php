<?php
include 'includes/header.php';
?>
<?php




if (isset($_POST['update'])) {
    
    $request_id = $_POST['req_id'];

    $inquiry_status = $_POST['inquiry_status'];
  
    $note = $_POST['note'];

    // Prepare and execute the UPDATE query
    $query = "UPDATE tbl_general_inquiry SET 
              status_id = $inquiry_status, note = '$note'
              
              WHERE id = '$request_id'";
    
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Request Detail updated!");</script>';
        echo '<script>window.location.href = "manage-general-inquiry.php";</script>';
    } else {
       echo '<script>alert("Something went wrong");</script>';
        echo '<script>window.location.href = "manage-general-inquiry.php";</script>';
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
                           

                             $su = " SELECT * FROM tbl_general_inquiry WHERE id =  $request_id";
                             $generaliq = mysqli_query($conn, $su);
                             $updategeniq = mysqli_fetch_assoc($generaliq);

                        ?>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Name</label>
                                <input  type="text" class="form-control" id="name"
                                    aria-describedby="name" disabled name="name" value="<?php echo $updategeniq['name']; ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="phone_no" class="form-label">Phone no</label>
                                <input  type="text" class="form-control" id="phone_no"
                                    aria-describedby="phone_no" name="phone_no"
                                    value="<?php echo $updategeniq['phone_no']; ?> " disabled>
                            </div>
                        </div>
                        
                        <div class="mb-3 row col-12">
                           
                        </div>
                          <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input  type="text" class="form-control" id="emailemailemail"
                                    aria-describedby="email" name="email" disabled value="<?php echo $updategeniq['email']; ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input  type="text" class="form-control" id="company_name"
                                    aria-describedby="company_name" name="company_name"
                                    value="<?php echo $updategeniq['company_name']; ?>" disabled>
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
                                            $sql = 'SELECT tbl_general_inquiry_status.* , tbl_general_inquiry_status.status AS name FROM tbl_general_inquiry_status';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($updategeniq['status_id'] == $row['id']) {

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
                           
                            
                        </div>
                       
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-6">
                             <label for="message" class="form-label">Message</label>
                                <textarea disabled name="message" class="form-control" rows="5" id="" style="resize: none; border-color: light;"><?php echo $updategeniq['message']; ?></textarea>
                            </div>
                            
                            <div class="mb-3 col-6">
                             <label for="note" class="form-label">Note* </label>
                                <textarea name="note" class="form-control" rows="5" id="" style="resize: none; border-color: light;"><?php echo $updategeniq['note']; ?></textarea>
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