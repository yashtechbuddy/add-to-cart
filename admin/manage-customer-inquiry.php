<?php
include 'includes/header.php';
if (isset($_POST['delinq']) && isset($_POST['inq_id'])) {
    $del = $_POST['inq_id'];
    deleteRecord('tbl_inquiry', 'id=' . $del);
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
                        <h4>Product Inqueries</h4>
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
                                    <th scope="col">Inquiry Id</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $sql = 'SELECT tbl_inquiry.*,tbl_customer.name as cust_name, tbl_inquiry.id as inq_id,tbl_user.name as employee_name,tbl_supplier.company_name as sup_name,tbl_inquiry_status.status as status_name
                                // FROM tbl_inquiry 
                                //  LEFT JOIN tbl_customer on tbl_inquiry.customer_id = tbl_customer.id
                                //  LEFT JOIN tbl_product on tbl_inquiry.product_id = tbl_product.id
                                //  LEFT JOIN tbl_inquiry_status on tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id
                                //  LEFT JOIN tbl_user on tbl_inquiry.emp_assign_id = tbl_user.id
                                //  LEFT JOIN tbl_supplier on tbl_inquiry.supplier_assign_id = tbl_supplier.id ORDER BY tbl_inquiry.id DESC';
                                
                                
                               $sql = 'SELECT tbl_inquiry.* ,tbl_inquiry.id AS inq_id, tbl_product.product_name, tbl_inquiry_status.status ,  tbl_customer.name AS cust_name  FROM tbl_inquiry 
                                                                    JOIN tbl_product ON tbl_inquiry.product_id = tbl_product.id 
                                                                    JOIN tbl_inquiry_status ON tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id 
                                                                    JOIN tbl_customer ON tbl_inquiry.customer_id = tbl_customer.id ';
                                
                                // $result = mysqli_query($conn, $sql);
                                $inquiry_result = mysqli_query($conn, $sql);

                                // Fetch all inquiries
                                $inquires = [];
                                while ($inquiry = mysqli_fetch_assoc($inquiry_result)) {
                                    $inquires[] = $inquiry;
                                }
                                
                                
                                // Group inquiries by autogenrated_id
                                $groupedInquiries = [];
                                foreach ($inquires as $inquiry) {
                                    $autogenratedId = $inquiry['autogenrated_id'];
                                    if (!isset($groupedInquiries[$autogenratedId])) {
                                        $groupedInquiries[$autogenratedId] = [];
                                    }
                                    $groupedInquiries[$autogenratedId][] = $inquiry;
                                }
                                
                                
                                if (mysqli_num_rows($inquiry_result) > 0) {
                                    $cno = 1;

                                foreach ($groupedInquiries as $autogenratedId => $group) { 


                                ?>
                                <tr>
                                    <th scope="row"><a href="#" class="question_content"><?php echo $cno ?></a></th>
                                    <td><?php echo $autogenratedId ?></td>
                                    <td><?php echo $group[0]['cust_name'] ?></td>
                                    <td>
                                        <?php
                                        // Create an array to hold product names
                                        $productNames = [];
                                        foreach ($group as $inquiry) {
                                            $productNames[] = $inquiry['product_name'];
                                        }
                                        // Combine product names with commas
                                        $productList = implode(', ', $productNames);
                        
                                        // Limit the displayed product list length
                                        $maxLength = 15; // Adjust this value as needed
                                        if (strlen($productList) > $maxLength) {
                                            echo substr($productList, 0, $maxLength) . '...';
                                        } else {
                                            echo $productList;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $group[0]['created_at'] ?></td>
                                    <td><?php echo $group[0]['status'] ?></td>
                                    <td>
                                    
                                      <button class="fa-solid fa-eye border border-0 bg-white" onclick="redirectToPage('<?php echo $autogenratedId ?>')">
                                          &nbsp&nbsp
                                      <form class="d-inline" method="post">
                                            <!-- delete -->
                                            <input type="hidden" value="<?php echo $group[0]['inq_id'] ?>" name="inq_id" />
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
                                    function redirectToPage(inquiryId) {
                                        window.location.href = 'customer-inquiry-detail.php?inquiryId=' + inquiryId;
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