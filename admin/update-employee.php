<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update'])) {
    $empId = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dept = $_POST['dept'];
    $role = $_POST['role'];
    $number = $_POST['number'] == '' ? 'NULL' : $_POST['number'];;
    $status = $_POST['status'];
    $description = $_POST['description'];

    // Prepare the SQL statement
    $query = "UPDATE tbl_user
SET name = '$name',
    email = '$email',
    password = '$password',
    dept_id = $dept,
    role_id = $role,
    mobile_no = $number,
    description = '$description',
    emp_status = $status
WHERE id = $empId;
";
    $stmt = mysqli_query($conn, $query);

    if ($stmt) {

        echo '<script>alert("Employee Detail updated!");</script>';
        echo '<script>window.location.href = "manage-employee.php";</script>';
    } else {
        echo '<script>alert("Something went Wrong!");</script>';
        echo '<script>window.location.href = "manage-employee.php";</script>';
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
                        <h4>Update Employee</h4>
                    </div>
                    <?php
                    if (isset($_POST['update-employee'])) {
                        $userid = $_POST['uid'];
                        $Select = 'SELECT tbl_user.* ,tbl_user.id as uid, 
                        tbl_dept.name as deptname , 
                        tbl_role.name as rolename from  tbl_user 
                        join tbl_dept on tbl_user.dept_id = tbl_dept.id 
                        join tbl_role on tbl_dept.id = tbl_role.dept_id 
                        WHERE tbl_user.id = "' . $userid . '"';
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    // print_r($rows);

                    ?>
                                    <!-- start form New employee -->
                                    <form class="" method="post" action="update-employee.php">
                                        <input type="hidden" value="<?php echo $userid; ?>" name="uid" />
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-12">
                                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo $rows['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $rows['email']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $rows['password']; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label">Department </label>
                                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                                <div>
                                                    <select class="form-control" id="dept" name="dept">
                                                        <option disabled="">--Choose Department -- </option>
                                                        <?php
                                                        $sql = 'SELECT * FROM tbl_dept';
                                                        $result = mysqli_query($conn, $sql);
                                                        $selecteddept = $rows['dept_id'];
                                                        if ($result && mysqli_num_rows($result) > 0) {

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                if ($selecteddept == $row['id']) {
                                                                    echo "<option selected='' id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                } else {
                                                                    echo "<option id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                            }
                                                        } else {
                                                            echo 'No data found.';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="role" class="form-label">Role</label>
                                                <div>
                                                    <select class="form-control dropdown" id="role" name="role">
                                                        <option disabled="">--Choose Role -- </option>
                                                        <?php
                                                        $sql = 'SELECT * FROM tbl_role WHERE dept_id = "' . $selecteddept . '"';
                                                        $result = mysqli_query($conn, $sql);
                                                        $selecteddept = $rows['dept_id'];
                                                        if ($result && mysqli_num_rows($result) > 0) {

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                if ($selecteddept == $row['dept_id']) {
                                                                    echo "<option selected='' id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                } else {
                                                                    echo "<option id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                            }
                                                        } else {
                                                            echo 'No data found.';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-lg-6">
                                                <label for="exampleInputEmail1" class="form-label">Mobile No </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="number" value="<?php echo $rows['mobile_no']; ?>">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="status" class="form-label">Status</label>
                                                <div>
                                                    <select class="form-control dropdown" id="status" name="status">


                                                        <?php
                                                        $sql = 'SELECT * FROM tbl_emp_status';
                                                        $result = mysqli_query($conn, $sql);
                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            $selectedStatus = $row['emp_status'];
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                if ($selectedStatus == $row['emp_status']) {
                                                                    echo "<option selected='' id='" . $row['emp_status'] . "' value='" . $row['id'] . "' name='status'>" . $row['emp_status'] . "</option>";
                                                                } else {
                                                                    echo "<option id='" . $row['emp_status'] . "' value='" . $row['id'] . "' name='status'>" . $row['emp_status'] . "</option>";
                                                                }
                                                            }
                                                        } else {
                                                            echo 'No data found.';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-3 row col-12">
                                            <label for="exampleInputEmail1" class="form-label">Description </label>
                                            <div class="mb-3 col-12">
                                                <textarea name="description" class="form-control" rows="5" id="" style="resize: none; border-color: light;"><?php echo $rows['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="reg" name="update">Submit</button>

                                    </form>
                                    <!-- end of form  -->
                    <?php
                                }
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