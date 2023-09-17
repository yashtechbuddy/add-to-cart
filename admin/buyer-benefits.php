<?php
include 'includes/header.php';
?>
<?php

if (isset($_POST['benefite_update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $benefite1_title = $_POST['benefite1_title'];
    $benefite2_title = $_POST['benefite2_title'];
    $benefite3_title = $_POST['benefite3_title'];
    $benefite4_title = $_POST['benefite4_title'];
    $alt_tag1 = $_POST['alt_tag1'];
    $alt_tag2 = $_POST['alt_tag2'];
    $alt_tag3 = $_POST['alt_tag3'];
    $alt_tag4 = $_POST['alt_tag4'];
    
    // Define the field names and their corresponding array keys
    $field_data = array(
        'title' => $title,
        'description' => $description,
        'benefite1_title' => $benefite1_title,
        'alt_tag1' => $alt_tag1,
        'benefite2_title' => $benefite2_title,
        'alt_tag2' => $alt_tag2,
        'benefite3_title' => $benefite3_title,
        'alt_tag3' => $alt_tag3,
        'benefite4_title' => $benefite4_title,
        'alt_tag4' => $alt_tag4
    );
    
    // Define the image columns
    $image_data = array(
        'image_b1', 
        'image_b2', 
        'image_b3',
        'image_b4'
    );

    foreach ($image_data as $image_column) {
        if (isset($_FILES[$image_column]) && $_FILES[$image_column]['error'] === 0) {
            $select_image_query = "SELECT $image_column FROM tbl_buyer_benefite WHERE id = 1";
            $result = mysqli_query($conn, $select_image_query);
            $row = mysqli_fetch_assoc($result);
            $existing_image = $row[$image_column];
            if ($existing_image) {
                unlink("images/buyer/" . $existing_image);
            }

            $image_name = $image_column."_" . $_FILES[$image_column]['name'];
            $image_tmp = $_FILES[$image_column]['tmp_name'];
            move_uploaded_file($image_tmp, "images/buyer/" . $image_name);
            $update_image_query = "UPDATE tbl_buyer_benefite SET $image_column='$image_name' WHERE id = 1";
            mysqli_query($conn, $update_image_query);
        }
    }
    
    $update_query = "UPDATE tbl_buyer_benefite SET ";
   
    foreach ($field_data as $field_name => $field_value) {
        $update_query .= "$field_name='$field_value', ";
    }
    $update_query = rtrim($update_query, ', '); // Remove trailing comma
    $update_query .= " WHERE id = 1";

    if (mysqli_query($conn, $update_query)) {
        echo "<script type='text/javascript'>alert('Record updated successfully');";
        echo "window.location.href = 'buyer-benefits.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
                        <h4>Buyer Benefite</h4>
                    </div>
                    <?php

                    $Select = 'SELECT * FROM `tbl_buyer_benefite`  where id=1';
                    if ($result = mysqli_query($conn, $Select)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                // print_r($rows);

                    ?>
                                <!-- start form New employee -->
                                <form class="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="contact_id" />
                                    <div class="mb-3 row col-12">
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Title :-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $rows['title']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Description :-</label>
                                            <div class="col-sm-9">
                                                <textarea  name="description" class="form-control" id="text"><?php echo $rows['description']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mt-5">
                                            <label for="benefite1_title" class="col-sm-3 col-form-label">Benefite 1:-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="benefit1_title" name="benefite1_title" value="<?php echo $rows['benefite1_title']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group  row">
                                                <label for="image_b1" class="col-sm-3 col-form-label">Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="image_b1" id="fileupload">
                                                        <img style="object-fit:cover;" src="images/buyer/<?php echo $rows['image_b1']; ?>" alt="benefite 1" />
                                                        <input type="text" name="alt_tag1" id="alt_tag1" placeholder="Enter  image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag1']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        

                                         <div class="form-group mt-4 row">
                                            <label for="benefite2_title" class="col-sm-3 col-form-label">Benefite 2:-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="benefite2_title" name="benefite2_title" value="<?php echo $rows['benefite2_title']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="image_b2" class="col-sm-3 col-form-label">Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="image_b2" id="fileupload">
                                                        <img style="object-fit:cover;" src="images/buyer/<?php echo $rows['image_b2']; ?>" alt="benefite 2" />
                                                        <input type="text" name="alt_tag2" id="alt_tag2" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag2']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                       
                                         <div class="form-group row mt-5">
                                            <label for="benefite3_title" class="col-sm-3 col-form-label">Benefite 3:-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="benefite3_title" name="benefite3_title" value="<?php echo $rows['benefite3_title']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="image_b3" class="col-sm-3 col-form-label">Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="image_b3" id="fileupload">
                                                        <img style="object-fit:cover;" src="images/buyer/<?php echo $rows['image_b3']; ?>" alt="benefite 3" />
                                                        <input type="text" name="alt_tag3" id="alt_tag3" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag3']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                      
                                         <div class="form-group row mt-4">
                                            <label for="benefite4_title" class="col-sm-3 col-form-label">Benefite 4:-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="benefite4_title" name="benefite4_title" value="<?php echo $rows['benefite4_title']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="image_b4" class="col-sm-3 col-form-label">Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="image_b4" id="fileupload">
                                                        <img style="object-fit:cover;" src="images/buyer/<?php echo $rows['image_b4']; ?>" alt="benefite 4" />
                                                        <input type="text" name="alt_tag4" id="alt_tag4" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag4']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                       
                                       
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4" value="reg" name="benefite_update">Submit</button>

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