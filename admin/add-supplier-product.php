<?php

include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['addproduct'])) {

    $name = $_POST['product_name'];
    $category_id = $_POST['category'];
    $Volume = $_POST['Volume'];
    $Visibility = $_POST['Visibility'];
    $description = $_POST['description'];
    $file = $_FILES['img'];
    $imageName = $file['name'];
    $fileTmpPath = $_FILES["img"]["tmp_name"];
    $fileSize = $file['size'];

    // Specify the directory to which you want to save the uploaded file
    $targetDirectory = 'images/products/';

    // Generate a unique name for the file to prevent overwriting
    $newFileName = uniqid() . '_' . $imageName;
    $targetFilePath = $targetDirectory . $newFileName;
    move_uploaded_file($fileTmpPath, $targetFilePath);
    $query = "INSERT INTO tbl_product(category_id,product_name,product_description,product_image,volume_id,visibility_id) 
        VALUES ($category_id,'$name','$description','$targetFilePath',$Volume,$Visibility)";

    $result = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>alert('Inserted!');</script>";
        echo '<script>window.location.href = "manage-product.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
        echo '<script>window.location.href = "manage-product.php";</script>';
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
                        <h4>Add Supplier Product</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">

                            <div class="mb-3 col-lg-6">
                                <label for="Category" class="form-label">Supplier</label>
                                <div>
                                    <select class="form-control" id="category" name="category">
                                        <option disabled="" selected="">--Choose Supplier -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_supplier';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['id'] . "' value='" . $row['id']  . "' name='name'>" . $row['company_name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="Category" class="form-label">Product</label>
                                <div>
                                    <select class="form-control" id="category" name="category">
                                        <option disabled="" selected="">--Choose Product -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_product';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['id'] . "' value='" . $row['id']  . "' name='product'>" . $row['product_name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>




                        </div>
                        <button type="submit" class="btn btn-primary" value="product" name="addproduct">Submit</button>

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