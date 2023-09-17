<?php
include 'includes/header.php';
if (isset($_POST['delCat'])) {
    $del = $_POST['catId'];
    deleteRecord('tbl_categories', 'id=' . $del);
}


?>
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
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
                        <h4>Product Categories</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..."
                                            class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="add-categories.php" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT  tbl_categories.*, id as catId, category_name as name, category_image as image FROM tbl_categories';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                <tr>
                                    <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                    <td><?php echo $row['name'] ?></td>
                                    <td><img src="./images/categories/<?php echo $row['image'] ?>"
                                            alt="Product Category image" style="width:60px;height:60px">
                                    </td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" <?php if ($row['visibility'] == 1) {
                                                                                        echo "checked";
                                                                                    } ?> type="checkbox" role="switch"
                                                id="status" onclick="toggleStatus('tbl_categories','visibility',<?php echo $row['id']; ?>);">
                                            <label class="form-check-label" for="status"></label>
                                        </div>
                                        <!-- <?php $status =  $row['visibility'];

                                                    if ($status == 1) { ?>
                                                     <a href="#" class="status_btn">Active</a>
                                                 <?php
                                                    } else {
                                                    ?> <a href="#" class="status_btn bg-danger">Inactive</a>
                                                 <?php }
                                                    ?> -->
                                    </td>
                                    <td>

                                        <!-- visiblity -->
                                        <!-- <input type="hidden" value="<?php echo $row['catId'] ?>"  name="catId" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                        <form class="d-inline" method="post">
                                            <!-- delete -->
                                            <input type="hidden" value="<?php echo $row['catId'] ?>" name="catId" />
                                            <button type="submit" name="delCat" id=""
                                                class="fas fa-trash-alt text-danger border border-0 bg-white"
                                                onclick=" return confirm('Are you sure you want to delete this data?')">
                                        </form>&nbsp&nbsp
                                        <form class="d-inline" action="update-category.php" method="post">
                                            <!-- update -->
                                            <input type="hidden" value="<?php echo $row['catId'] ?>" name="catId" />
                                            <button type="submit" name="update-category" id=""
                                                class="fas fa-edit  border border-0 bg-white">
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
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="post" id="role" action="./data.php">
                    <div class="mb-3 row col-12">
                        <div class="mb-3 col-lg-12">
                            <label for="name mb-2" class="form-label">Role</label>
                            <input type="text" class="form-control" aria-describedby="name" name="role">
                            <span id="dept-erro"></span>
                        </div>
                    </div>
                    <div class="mb-3 row col-12">
                        <div class="mb-3 col-lg-12">
                            <label for="name mb-2" class="form-label">Department</label>
                            <select class="form-control" id="dept1" name="dept1">
                                <option disabled="" selected="">--Choose Department -- </option>
                                <?php
                                $sql = 'SELECT * FROM tbl_dept';
                                $result = mysqli_query($conn, $sql);
                                if ($result && mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                } else {
                                    echo 'No data found.';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" value="reg" name="addrole"
                        id="addrole">Submit</button>
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