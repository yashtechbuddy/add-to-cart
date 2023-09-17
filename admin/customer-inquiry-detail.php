<?php
include 'includes/header.php';
if (isset($_POST['delinq']) && isset($_POST['inq_id'])) {
    $del = $_POST['inq_id'];
    deleteRecord('tbl_inquiry', 'id=' . $del);
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
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
                        <h4>Inquiry Details</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..."
                                            class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="add_button ms-2">-->
                            <!--    <a href="add-inquiry.php" class="btn_1">Add New</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <!--<th scope="col">Inquiry Id</th>-->
                                    <th scope="col">Category</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                
                                $autogenrated_id = $_GET['inquiryId'];
                                
                                $sql = "SELECT tbl_inquiry.*, tbl_inquiry.id AS Inquiry_id, tbl_product.product_name, tbl_categories.category_name, tbl_inquiry_status.status  
                                FROM tbl_inquiry 
                                JOIN tbl_product ON tbl_inquiry.product_id = tbl_product.id 
                                JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id 
                                JOIN tbl_inquiry_status ON tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id 
                                WHERE tbl_inquiry.autogenrated_id = '$autogenrated_id'";
                                
                                // $result = mysqli_query($conn, $sql);
                                $inquiry = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($inquiry) > 0) {
                                    $cno = 1;

                                  while ($inquiryDetail = mysqli_fetch_assoc($inquiry)) {


                                ?>
                                <tr>
                                    <th scope="row"><a href="#" class="question_content"><?php echo $cno ?></a></th>
                                    <!--<td><?php echo $autogenrated_id ?></td>-->
                                    <td><?php echo $inquiryDetail['category_name']; ?></td>
                                    <td><?php echo $inquiryDetail['product_name']; ?></td>
                                    <td><?php echo $inquiryDetail['quantity']." ".$inquiryDetail['volume_name']; ?></td>
                                    <td><?php echo $inquiryDetail['status']; ?></td>
                                    <td>
                                    
                                      <button class="fa-solid fa-circle-plus text-success border border-0 bg-white <?php $inquiryDetail['assigned_status']==1? " ":"d-none"; ?>" onclick="redirectToPage('<?php echo $autogenrated_id ?>','<?php echo $inquiryDetail['product_id']; ?>')">
                                          &nbsp&nbsp
                                      <form class="d-inline" method="post">
                                            <!-- delete -->
                                            <input type="hidden" value="<?php echo $inquiryDetail['Inquiry_id'] ?>" name="inq_id" />
                                            <button type="submit" name="delinq" id=""
                                                class="fas fa-trash-alt text-danger border border-0 bg-white"
                                                onclick=" return confirm('Are you sure you want to delete this data?')">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        $cno++;
                                    }
                                } ?>
                                <script>
                                    function redirectToPage(inquiryId,product_id) {
                                        window.location.href = 'add-request.php?inquiryId=' + inquiryId + '&product_id=' + product_id;
                                    }
                                </script> 
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
                                <option disabled="" selected="">-- Choose Department -- </option>
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