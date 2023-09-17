<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {
    $roleId = $_POST['roleId'];
    $roleName = $_POST['roleName'];
    $Selectrole = "SELECT * FROM tbl_role WHERE name = '$roleName'";
    $result = mysqli_query($conn, $Selectrole);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Role is already present!");</script>';
        echo '<script>window.location.href = "manage-role.php";</script>';
    } else {
        // Prepare the SQL statement
        $query = "UPDATE tbl_role SET name = '$roleName' WHERE id = $roleId;";
        $stmt = mysqli_query($conn, $query);

        if ($stmt) {

            echo '<script>alert("Role Detail updated!");</script>';
            echo '<script>window.location.href = "manage-role.php";</script>';
        } else {
            echo '<script>alert("Something went Wrong!");</script>';
            echo '<script>window.location.href = "manage-role.php";</script>';
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
                        <h4>Update Role</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-role'])) {
                        $roleId = $_POST['roleId'];
                        // echo $roleId;
                        $Select = 'SELECT * from tbl_role where id = "' . $roleId . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    // print_r($rows);

                    ?>
                                    <!-- start form New employee -->
                                    <form class="" method="post" action="update-role.php">
                                        <input type="hidden" value="<?php echo $roleId; ?>" name="roleId" />
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="roleName" value="<?php echo $rows['name']; ?>">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary" value="reg" name="update">Submit</button>

                                    </form>
                                    <!-- end of form  -->
                    <?php
                                }
                            }
                        }
                    } else {
                        echo '<script>window.location.href = "manage-role.php";</script>';
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