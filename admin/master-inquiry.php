<?php
include 'includes/header.php';
// include 'includes/config.php';
if (isset($_POST['del'])) {
    $del = $_POST['autogenratedId'];


    deleteRecord('tbl_manage_inquiry', 'autogenratedId=' . $del);
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
                        <h4>Manage All Sent Requests</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="add_button ms-2">-->
                            <!--    <a href="add-customer.php" class="btn_1">Add New</a>-->
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
                                    <!--<th scope="col">Quantity</th>-->
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT tbl_manage_inquiry.* ,tbl_manage_inquiry.id as manage_id,tbl_manage_inquiry.inquiry_id AS inquiryId, 
                                        tbl_product.product_name, tbl_inquiry_status.status , tbl_supplier.company_name, 
                                        tbl_customer.name AS cust_name  FROM tbl_manage_inquiry 
                                        JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id 
                                        JOIN tbl_inquiry_status ON tbl_manage_inquiry.status_id = tbl_inquiry_status.id 
                                        JOIN tbl_customer ON tbl_manage_inquiry.customer_id = tbl_customer.id 
                                        JOIN tbl_supplier ON tbl_manage_inquiry.supplier_id = tbl_supplier.id
                                
                                ";

                                $inquiry_result = mysqli_query($conn, $sql);

                                // Fetch all inquiries
                                $inquires = [];
                                while ($inquiry = mysqli_fetch_assoc($inquiry_result)) {
                                    $inquires[] = $inquiry;
                                }
                                
                                
                                // Group inquiries by autogenrated_id
                                $groupedInquiries = [];
                                foreach ($inquires as $inquiry) {
                                    $autogenratedId = $inquiry['inquiryId'];
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
                                      
                                         $productNames = array_unique(array_column($group, 'product_name'));
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
                                    <td><?php echo $group[0]['create_at'] ?></td>
                                    <!--<td><?php echo $group[0]['status'] ?></td>-->
                                    <td>
                                    
                                      <button class="fa-solid fa-eye border border-0 bg-white" onclick="redirectToPage('<?php echo $autogenratedId ?>')">
                                          &nbsp&nbsp
                                      <form class="d-inline" method="post">
                                            <!-- delete -->
                                            <input type="hidden" value="<?php echo $autogenratedId ?>" name="autogenratedId" />
                                            <button type="submit" name="del" id=""
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
                                        window.location.href = 'sent-request.php?inquiryId=' + inquiryId;
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

<?php
include 'includes/footer.php';
?>