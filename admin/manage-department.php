<?php
include 'includes/header.php';
// include 'includes/config.php';

if (isset($_POST['del'])) {
    $del = $_POST['deptId'];
    deleteRecord('tbl_dept', 'id='.$del);
   
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
                        <h4>Departments</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn_1" data-bs-toggle="modal" data-bs-target="#department">
                                    ADD NEW
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <!-- <th scope="col">Department</th>
                                    <th scope="col">role</th> -->
                                    <!-- <th scope="col"></th> -->
                                    <!-- <th scope="col">Price</th> -->
                                    <!-- <th scope="col">Status</th>-->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM tbl_dept';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                            <td><?php echo $row['name'] ?></td>


                                            <td>
                                                <!-- visiblity -->
                                                <!-- <form class="d-inline" action="manage-department.php" method="post">
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                    <button type="submit" name="status" id="" class="fas fa-eye text-success border border-0 bg-white">
                                                </form> -->
                                                <form class="d-inline" action="" method="post">
                                                    <!-- delete -->
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="deptId" />
                                                    <button type="submit" name="del" id="" class="fas fa-trash-alt text-danger border border-0 bg-white" onclick=" return confirm('Are you sure you want to delete this data?')">
                                                </form>&nbsp&nbsp
                                                <form class="d-inline" action="update-department.php" method="post">
                                                    <!-- update -->
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="deptId" />
                                                    <button type="submit" name="update-department" id="" class="fas fa-edit  border border-0 bg-white">
                                                </form>

                                            </td>
                                        </tr>

                                <?php
                                        $cno++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- add department -->
<div class="modal fade" id="department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="post" id="department" action="./data.php">
                    <div class="mb-3 row col-12">
                        <div class="mb-3 col-lg-12">
                            <label for="name mb-2" class="form-label">Name</label>
                            <input type="text" class="form-control" id="deptName" aria-describedby="name" name="deptname">
                            <span id="dept-erro"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" value="reg" name="department" id="addept">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>