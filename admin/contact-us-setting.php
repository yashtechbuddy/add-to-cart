<?php
include 'includes/header.php';
?>
<?php
if (isset($_POST['contact_update'])) {
    // $message = "";
    $address = $_POST['address'];
    $email = $_POST['email'];
    $email1 = $_POST['email1'];
    $phone = $_POST['phone'] == '' ? 'NULL' : $_POST['phone'];
    $phone1 = $_POST['phone1'] == '' ? 'NULL' : $_POST['phone1'];
    $google_map = $_POST['google_map'];
    $contact_id = $_POST['contact_id'];
    $query = "UPDATE tbl_contact_us  SET address='$address',email='$email',email1='$email1',phone=$phone,phone1=$phone1,google_map='$google_map' WHERE id=$contact_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "contact-us-setting.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "contact-us-setting.php";</script>';
    }
}

?>



<?php 
include 'includes/side-bar.php';
include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30 p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Contact Us</h4>
                    </div>
                    <?php

                    $Select = 'SELECT * from tbl_contact_us where id=1';
                    if ($result = mysqli_query($conn, $Select)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                // print_r($rows);

                    ?>
                                <!-- start form New employee -->
                                <form class="" method="post">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="contact_id" />
                                    <div class="mb-3 row col-12">
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Address :-</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="address"><?php echo stripslashes($rows['address']); ?></textarea>

                                            </div>
                                        </div>
                                        <!--div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address1  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address1">:-<?php echo stripslashes($rows['address1']); ?></textarea>
											
                                        </div>
                                    </div-->
                                        <div class="form-group row mt-5">
                                            <label for="email" class="col-sm-3 col-form-label">Email :-</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $rows['email']; ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="email1" value="<?php echo $rows['email1']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label for="phone" class="col-sm-3 col-form-label">Contact :-</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $rows['phone']; ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="phone1" value="<?php echo $rows['phone1']; ?>">
                                            </div>

                                        </div>
                                        <div class="form-group row mt-5">
                                            <label for="google_map" class="col-sm-3 col-form-label">Google Map :-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="google_map" name="google_map" value="<?php echo $rows['google_map']; ?>">
                                            </div>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4" value="reg" name="contact_update">Submit</button>

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