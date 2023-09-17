<?php
include 'includes/header.php';
?>
<?php

if (isset($_POST['why_choose'])) {
    $title = $_POST['title'];
    $alt_tag = $_POST['alt_tag'];
    $alt_tag1 = $_POST['alt_tag1'];
    
    // Define the field names and their corresponding array keys
    $field_data = array(
        'title' => $title,
        'alt_tag' => $alt_tag,
        'alt_tag1' => $alt_tag1
    );
    
    
     // Define the image columns
    $image_data = array(
        'background_image', 
        'background_image1'
    );

    foreach ($image_data as $image_column) {
        if (isset($_FILES[$image_column]) && $_FILES[$image_column]['error'] === 0) {
            $select_image_query = "SELECT $image_column FROM tbl_buyer_whychoose WHERE id = 1";
            $result = mysqli_query($conn, $select_image_query);
            $row = mysqli_fetch_assoc($result);
            $existing_image = $row[$image_column];
            if ($existing_image) {
                unlink("images/buyer/" . $existing_image);
            }

            $image_name = $image_column."_" . $_FILES[$image_column]['name'];
            $image_tmp = $_FILES[$image_column]['tmp_name'];
            move_uploaded_file($image_tmp, "images/buyer/" . $image_name);
            $update_image_query = "UPDATE tbl_buyer_whychoose SET $image_column='$image_name' WHERE id = 1";
            mysqli_query($conn, $update_image_query);
        }
    }


        // if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] === 0) {
        //     $select_image_query = "SELECT background_image FROM tbl_buyer_whychoose WHERE id = 1";
        //     $result = mysqli_query($conn, $select_image_query);
        //     $row = mysqli_fetch_assoc($result);
        //     $existing_image = $row['background_image'];
        //     if ($existing_image) {
        //         unlink("images/buyer/" . $existing_image);
        //     }

        //     $image_name = "background_image_" . $_FILES['background_image']['name'];
        //     $image_tmp = $_FILES['background_image']['tmp_name'];
        //     move_uploaded_file($image_tmp, "images/buyer/" . $image_name);
        //     $update_image_query = "UPDATE tbl_buyer_whychoose SET background_image='$image_name' WHERE id = 1";
        //     mysqli_query($conn, $update_image_query);
        // }
    
    
    $update_query = "UPDATE tbl_buyer_whychoose SET ";
   
    foreach ($field_data as $field_name => $field_value) {
        $update_query .= "$field_name='$field_value', ";
    }
    $update_query = rtrim($update_query, ', '); // Remove trailing comma
    $update_query .= " WHERE id = 1";

    if (mysqli_query($conn, $update_query)) {
        echo "<script type='text/javascript'>alert('Record updated successfully');";
        echo "window.location.href = 'buyer-whychoose.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>

<?php 
include 'includes/side-bar.php';
?>


<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30 p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Buyer Why choose Us</h4>
                    </div>
                    <?php

                    $Select = 'SELECT * FROM `tbl_buyer_whychoose` where id=1';
                    if ($result = mysqli_query($conn, $Select)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                // print_r($rows);

                    ?>
                               
                                <form class="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="id" />
                                    <div class="mb-3 row col-12">
                                        <div class="form-group row mt-4">
                                            <label for="address" class="col-sm-3 col-form-label">Title :-</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $rows['title']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Background :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image" id="fileupload">
                                                        <img  src="images/buyer/<?php echo $rows['background_image']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row mt-4">
                                                <label for="background_image" class="col-sm-3 col-form-label">Right Side Image:-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image1" id="fileupload">
                                                        <img  src="images/buyer/<?php echo $rows['background_image1']; ?>" alt="background Image" style="width:100px  ;height:100px" />
                                                        <input type="text" name="alt_tag1" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag1']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        

                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4" value="reg" name="why_choose">Submit</button>

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