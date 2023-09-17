<?php
    include 'includes/header.php';
    // include 'includes/config.php';
    if (isset($_POST['del'])) {
        $del = $_POST['hid'];


        deleteRecord('visibility', 'id=' . $del);
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
                        <h4>Header Setting</h4>
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
                                <a href="add-header.php" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = 'SELECT * FROM pagevisibility';
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $cno = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                <tr>
                                    <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                    <td><?php echo $row['page_name'] ?></td>
                                  
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" <?php if ($row['visibility'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?> type="checkbox"
                                                role="switch" id="status"
                                                onclick="toggleStatus('pagevisibility','visibility',<?php echo $row['id']; ?>);">
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
                                        <!-- <input type="hidden" value="<?php echo $row['uid'] ?>" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                        <form class="d-inline" action="header-setting.php" method="post">
                                            <!-- delete -->
                                            <input type="hidden" name="hid" value="<?php echo $row['id'] ?>" />
                                            <button type="submit" name="delete" id=""
                                                class="fas fa-trash-alt text-danger border border-0 bg-white">
                                        </form>&nbsp&nbsp
                                        <form class="d-inline" action="update-header.php" method="get">
                                            <!-- update -->
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="hid" />
                                            <button type="submit" name="update-header" id="update-header" value="update"
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

<?php
    include 'includes/footer.php';
    ?>