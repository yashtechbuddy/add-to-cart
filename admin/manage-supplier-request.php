<?php
include 'includes/header.php';
if (isset($_POST['delinq']) && isset($_POST['req_id'])) {
    $del = $_POST['req_id'];
    deleteRecord('tbl_supplier_request', 'id=' . $del);
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
                        <h4>Manage Request</h4>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT tbl_supplier_request.* ,tbl_supplier_request.id  AS req_id ,
                                tbl_supplier_request_status.name AS status_name   
                                from tbl_supplier_request JOIN tbl_supplier_request_status ON tbl_supplier_request.status_id = tbl_supplier_request_status.id ';

                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;

                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                <tr>
                                    <!-- <?php print_r($row);?> -->
                                    <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo  $row['phone_no']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $row['supplier_message'];?></td>
                                    <td><?php echo $row['status_name'] ?></td>
                                   
                                    <td>
                                        <?php 
                                         if($row['status_id'] !=4 ){
                                        ?>
                                        <!-- update -->
                                        <form class="d-inline" action="update-supplier-request.php">
                                            <input type="hidden" value="<?php echo $row['req_id'] ?>" name="req_id" />
                                            <button type="submit" name="" id="" class="fas fa-edit  border border-0 bg-white">
                                        </form>
                                      &nbsp&nbsp
                                           <!-- delete -->
                                          <form class="d-inline" method="post">
                                            <input type="hidden" value="<?php echo $row['req_id'] ?>" name="req_id" />
                                            <button type="submit" name="delinq" id=""  class="fas fa-trash-alt text-danger border border-0 bg-white"
                                                onclick=" return confirm('Are you sure you want to delete this data?')">
                                          </form>
                                     <?php }else{ ?>
                                       
                                           <button type="button" name="view-supplier" class="fa fa-eye text-primary border border-0 bg-white"
                                                            data-bs-toggle="modal" data-bs-target="#detailModal"
                                                            
                                                            onclick="ChangeStarus('<?php echo $row['company_name']; ?>',
                                                                                  '<?php echo $row['email']; ?>',
                                                                                  '<?php echo $row['phone_no']; ?>',
                                                                                  '<?php echo $row['whatsapp_no']; ?>',
                                                                                  '<?php echo $row['gst_no']; ?>',
                                                                                  '<?php echo $row['status_id']; ?>',
                                                                                  '<?php echo $row['company_address']; ?>',
                                                                                  );">
                                                    </button>
                                    <?php } ?>
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

<script>
function ChangeStarus(companyName, email, phoneNo, whatsappNo, gstNo, statusId, address, description) {
    document.getElementById("companyName").textContent = companyName;
    document.getElementById("email").textContent = email;
    document.getElementById("phoneNo").textContent = phoneNo;
    document.getElementById("whatsappNo").textContent = whatsappNo;
    document.getElementById("gstNo").textContent = gstNo;
    document.getElementById("modalStatus").textContent = statusId === '1' ? 'Active' : 'Inactive';
    document.getElementById("address").textContent = address;
    // document.getElementById("description").textContent = description;
    console.log("ChangeStarus function called.");
}
</script>

<!-- Modal -->
 <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Supplier Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="companyName">Company Name</label>
                            <p class="form-control-static" id="companyName"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <p class="form-control-static" id="email"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phoneNo">Phone No</label>
                            <p class="form-control-static" id="phoneNo"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="whatsappNo">Whatsapp No</label>
                            <p class="form-control-static" id="whatsappNo"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="gstNo">GST No</label>
                            <p class="form-control-static" id="gstNo"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <p class="form-control-static" id="address"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="modalStatus">Status</label>
                            <p class="form-control-static" id="modalStatus"></p>
                        </div>
                        <!--<div class="mb-3">-->
                        <!--    <label class="form-label" for="description">Description</label>-->
                        <!--    <p class="form-control-static" id="description"></p>-->
                        <!--</div>-->
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>                          

<?php
include 'includes/footer.php';
?>