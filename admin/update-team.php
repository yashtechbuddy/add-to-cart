<?php
include 'includes/header.php';
// include 'includes/config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
if (isset($_POST['updateteam'])) {

    $id = $_POST['id'];

    $name = $_POST['name'];
    $design = $_POST['design'];

    if ($_FILES['image']['size'] != 0) {
        $file = $_FILES['image'];
        $imageName = $file['name'];
        $design = $_POST['design'];
        $fileTmpPath = $_FILES["image"]["tmp_name"];
        $fileSize = $file['size'];
        $targetDirectory = 'images/team/';

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_team WHERE id=' . $id . '');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['image'] != "") {
            unlink('images/team/' . $img_res_row['image']);
        }
        // Generate a unique name for the file to prevent overwriting
        // $newFileName = uniqid() . '_' . $imageName;
        $targetFilePath = $targetDirectory . $imageName;
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {

            $query = "UPDATE tbl_team
            SET name = '$name',image = '$imageName',design = '$design'
            WHERE id = $id";

            $stmt = mysqli_query($conn, $query);

            if ($stmt) {

                echo '<script>alert("Detail updated!");</script>';
                echo '<script>window.location.href = "team.php";</script>';
            } else {
                echo '<script>alert("Something went Wrong!");</script>';
                echo '<script>window.location.href = "team.php";</script>';
            }
        }
    } else {

       
        
        $query = "UPDATE tbl_team
        SET name = '$name', design='$design'
        WHERE id = $id";
        $stmt = mysqli_query($conn, $query);

        if ($stmt) {

            echo '<script> Detail updated!");</script>';
            echo '<script>window.location.href = "team.php";</script>';
        } else {
            echo '<script>alert("Something went Wrong!");</script>';
            echo '<script>window.location.href = "team.php";</script>';
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
                        <h4>Update Team Member</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-team'])) {
                        $id = $_POST['id'];

                        $Select = 'SELECT * from tbl_team
                        WHERE tbl_team.id = "' . $id . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {

                                    $oldImage = $rows['image'];

                    ?>
                    <!-- start form update product -->
                    <form class="" method="post" enctype="multipart/form-data">
                        
                         <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <input type="hidden" name="id" value="<?php echo $_POST['id'];; ?>" >
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="<?php echo $rows['name']; ?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="image" class="form-label">Image </label>
                                <input type="file" class="form-control" id="image" aria-describedby="image" name="image" value="" >
                                <img src="images/team/<?php echo $rows['image']; ?>" class=""/>
                            </div>
                        </div>
                        <div class="mb-3 row col-12">
                            
                            <div class="mb-3 col-lg-12">
                                <label for="design" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="design" aria-describedby="design" name="design" value="<?php echo $rows['design']; ?>" required>
                            </div>
                           
                        </div>

                </div>
                <button type="submit" class="btn btn-primary" value="category" name="updateteam">Submit</button>

                </form>
                <!-- end of form  -->
                <?php
                                }
                            }else{
                                echo '<script>window.location.href = "team.php";</script>';
                            }
                        }
                    } else {
                        echo '<script>window.location.href = "team.php";</script>';
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