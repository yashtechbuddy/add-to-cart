<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {
    $deptId = $_POST['deptId'];
    $deptName = $_POST['deptName'];
    $Selectdept = "SELECT * FROM tbl_dept WHERE name = '$deptName'";
    $result = mysqli_query($conn, $Selectdept);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Department is already present!");</script>';
        echo '<script>window.location.href = "manage-department.php";</script>';
    } else {
        // Prepare the SQL statement
        $query = "UPDATE tbl_dept SET name = '$deptName' WHERE id = $deptId;";
        $stmt = mysqli_query($conn, $query);

        if ($stmt) {

            echo '<script>alert("Employee Detail updated!");</script>';
            echo '<script>window.location.href = "manage-department.php";</script>';
        } else {
            echo '<script>alert("Something went Wrong!");</script>';
            echo '<script>window.location.href = "manage-department.php";</script>';
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
                        <h4>Update department</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-department'])) {
                        $deptId = $_POST['deptId'];
                        // echo $deptId;
                        $Select = 'SELECT * from tbl_dept where id = "' . $deptId . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    // print_r($rows);

                    ?>
                                    <!-- start form New employee -->
                                    <form class="" method="post" action="update-department.php">
                                        <input type="hidden" value="<?php echo $deptId; ?>" name="deptId" />
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deptName" value="<?php echo $rows['name']; ?>">
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
                        echo '<script>window.location.href = "manage-department.php";</script>';
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