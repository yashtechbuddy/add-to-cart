<?php
include 'includes/header.php';
// include 'includes/config.php';
if (isset($_POST['del'])) {
    $del = $_POST['id'];


    deleteRecord('tbl_faqs_customer', 'id=' . $del);
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
                        <h4>FAQs Supplier</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="add-faqs.php?cat=sup" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT tbl_faqs_supplier.* , id AS fsid FROM tbl_faqs_supplier';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                            <td><?php echo $row['question'] ?></td>
                                            <td><?php echo $row['answer']  ?></td>
                                            <!-- <td> -->
                                                <!-- <div class="form-check form-switch">
                                                    <input class="form-check-input" <?php if ($row['emp_status'] == 1) {
                                                                                        echo "checked";
                                                                                    } ?> type="checkbox" role="switch" id="status" onclick="toggleStatus('tbl_user','emp_status',<?php echo $row['uid']; ?>);">
                                                    <label class="form-check-label" for="status"></label>
                                                </div> -->
                                                <!-- <?php $status =  $row['emp_status'];

                                                        if ($status == 1) { ?>
                                                     <a href="#" class="status_btn">Active</a>
                                                 <?php
                                                        } else {
                                                    ?> <a href="#" class="status_btn bg-danger">Inactive</a>
                                                 <?php }
                                                    ?> -->
                                            <!-- </td> -->
                                            <td>

                                                <!-- visiblity -->
                                                <!-- <input type="hidden" value="<?php echo $row['uid'] ?>" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                                <form class="d-inline" action="faqs-customer.php" method="post">
                                                    <!-- delete -->
                                                    <input type="hidden" name="uid" value="<?php echo $row['fsid'] ?>" />
                                                    <button type="submit" name="delete" id="" class="fas fa-trash-alt text-danger border border-0 bg-white">
                                                </form>&nbsp&nbsp
                                                <form class="d-inline" action="update-faqs.php" method="get">
                                                    <!-- update -->
                                                    <input type="hidden" value="<?php echo $row['fsid'] ?>" name="fsid" />
                                                    <button type="submit" name="update-faqs-sup" value="sup" id="" class="fas fa-edit  border border-0 bg-white">
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