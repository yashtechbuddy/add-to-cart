<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['addCategory'])) {

    $file = $_FILES['img'];
    $imageName = $file['name'];
    $fileTmpPath = $_FILES["img"]["tmp_name"];
    $fileSize = $file['size'];
    $category = $_POST['name'];
    // Specify the directory to which you want to save the uploaded file
    $targetDirectory = 'images/categories/';
    $Select = "SELECT COUNT(*) AS find FROM tbl_categories WHERE category_name = '$category' ";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $Select));
    if ($res['find'] == 0) {
        // Generate a unique name for the file to prevent overwriting

        $targetFilePath = $targetDirectory . $imageName;
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            $query = "INSERT INTO tbl_categories(category_name,category_image) VALUES ('$category',' $imageName')";
            $result = mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script type='text/javascript'>alert('Inserted!');</script>";
                echo '<script>window.location.href = "manage-category.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
                echo '<script>window.location.href = "manage-category.php";</script>';
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('Already present');</script>";
        // echo '<script>window.location.href = "manage-category.php";</script>';

        echo $res['find'];

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
                        <h4>Add Category</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="CategoryName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="CategoryName" aria-describedby="category" name="name" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="CategoryImagy" class="form-label">Image </label>
                                <input type="file" class="form-control" id="CategoryImagy" aria-describedby="image" name="img" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="category" name="addCategory">Submit</button>

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