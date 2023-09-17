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
        VALUES ($category_id,'$name','$description','$imageName',$Volume,$Visibility)";

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
<!--add-employees -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
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
                        <h4>Add Product</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="ProductName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="ProductName" aria-describedby="category" name="product_name">
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="Category" class="form-label">Category</label>
                                <div>
                                    <select class="form-control" id="category" name="category">
                                        <option disabled="" selected="">--Choose Category -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_categories';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['id'] . "' value='" . $row['id']  . "' name='category'>" . $row['category_name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="Volume" class="form-label">Volume</label>
                                <div>
                                    <select class="form-control" id="Volume" name="Volume">
                                        <option disabled="" selected="">--Choose Volume -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_volume';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['id'] . "' value='" . $row['id']  . "' name='Volume'>" . $row['volume_name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="ProductImagy" class="form-label">Image </label>
                                <input type="file" class="form-control" id="ProductImagy" aria-describedby="image" name="img">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="Visibility" class="form-label">Visibility</label>
                                <div>
                                    <select class="form-control dropdown" id="Visibility" name="Visibility">
                                        <option disabled="" selected="" id="Visibility" name="Visibility">--Choose Visibility -- </option>

                                        <?php
                                        $sql = 'SELECT * FROM tbl_product_visibility';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='" . $row['product_status'] . "' value='" . $row['id'] . "' name='Visibility'>" . $row['product_status'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="Description" class="form-label">Description </label>
                                <textarea name="description" class="form-control" rows="5" id="" style="resize: none; border-color: light;"></textarea>
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