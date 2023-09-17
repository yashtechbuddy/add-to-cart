<?php
include 'includes/header.php';
// include 'includes/config.php';

?>
<?php
if (isset($_POST['updateCategory'])) {

    $category_id = $_POST['cid'];

    $name = $_POST['category_name'];


    if ($_FILES['image']['size'] != 0) {
        $file = $_FILES['image'];
        $imageName = $file['name'];
        $fileTmpPath = $_FILES["image"]["tmp_name"];
        $fileSize = $file['size'];
        $targetDirectory = 'images/categories/';

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_categories WHERE id=' . $_POST['cid'] . '');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['category_image'] != "") {
            unlink('images/categories/' . $img_res_row['category_image']);
        }
        // Generate a unique name for the file to prevent overwriting
        // $newFileName = uniqid() . '_' . $imageName;
        $targetFilePath = $targetDirectory . $imageName;
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {

            $query = "UPDATE tbl_categories
            SET category_name = '$name',category_image = '$imageName'
            WHERE id = $category_id";

            $stmt = mysqli_query($conn, $query);

            if ($stmt) {

                echo '<script>alert("Category Detail updated!");</script>';
                echo '<script>window.location.href = "manage-category.php";</script>';
            } else {
                echo '<script>alert("Something went Wrong!");</script>';
                echo '<script>window.location.href = "manage-category.php";</script>';
            }
        }
    } else {

        echo 'no image';
        // if image not set
        $query = "UPDATE tbl_categories
        SET category_name = '$name'
        WHERE id = $category_id";
        $stmt = mysqli_query($conn, $query);

        if ($stmt) {

            echo '<script>alert("Category Detail updated!");</script>';
            echo '<script>window.location.href = "manage-category.php";</script>';
        } else {
            echo '<script>alert("Something went Wrong!");</script>';
            echo '<script>window.location.href = "manage-category.php";</script>';
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
                        <h4>Update Category</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-category'])) {
                        $categoryId = $_POST['catId'];

                        $Select = 'SELECT tbl_categories.* ,tbl_categories.id as cid FROM tbl_categories
                        WHERE tbl_categories.id = "' . $categoryId . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {

                                    $oldImage = $rows['category_image'];

                    ?>
                    <!-- start form update product -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <input type="hidden" class="form-control" id="category_id"
                                    aria-describedby="category_id" name="cid" value="<?php echo $categoryId; ?>">

                                <label for="category_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="category_name" aria-describedby="category"
                                    name="category_name" value="<?php echo $rows['category_name']; ?>">
                            </div>
                        </div>


                        <div class="mb-3 col-lg-6">
                            <label for="category_image" class="form-label">Image </label>
                            <img src="./images/categories/<?php echo  $rows['category_image']; ?>" alt="category">
                            <input type="file" class="form-control" id="category_image" aria-describedby="image"
                                name="image">
                        </div>


                </div>
                <button type="submit" class="btn btn-primary" value="category" name="updateCategory">Submit</button>

                </form>
                <!-- end of form  -->
                <?php
                                }
                            }else{
                                echo '<script>window.location.href = "manage-category.php";</script>';
                            }
                        }
                    } else {
                        echo '<script>window.location.href = "manage-category.php";</script>';
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