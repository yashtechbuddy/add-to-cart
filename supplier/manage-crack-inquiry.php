<?php
include 'includes/header.php';
if (isset($_POST['delProdt'])) {
    $del = $_POST['spId'];
    deleteRecord('tbl_supplier_products', 'id=' . $del);
}

?>

<?php 

if(isset($_POST['add-amount'])){
    $sup_amount = $_POST['sup_amount'];
    $sent_inquiry_id = $_POST['sent_inquiry_id'];
     
     $sql = "UPDATE tbl_manage_inquiry SET sup_amount= $sup_amount WHERE id =  $sent_inquiry_id";
     
     $result = mysqli_query($conn,$sql);
     
     if($result){
        echo "<script>alert('Amount is Send');</script>";
     }
}

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
                        <h4>Cracked</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="add_button ms-2">-->
                            <!--    <a href="add-product.php" class="btn_1">Add New</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quanitity</th>
                                    <!--<th scope="col">Status</th>-->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $supplier_id = $_SESSION['supplier_data']['id'];
                                $sql = "SELECT tbl_manage_inquiry.*,tbl_manage_inquiry.id as sent_inquiry_id ,tbl_product.product_name, tbl_categories.category_name from tbl_manage_inquiry
                                        JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
                                        JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
                                        WHERE tbl_manage_inquiry.supplier_id = $supplier_id AND tbl_manage_inquiry.status_id = 5 ";

                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['quantity']." ".$row['volume_name'] ?></td>
                                            <!--<td><?php echo "Cracked"; ?></td>-->
                                            
                                            <td>

                                                <!-- visiblity -->
                                                <!-- <input type="hidden" value="<?php echo $row['sspId'] ?>"  name="spId" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->
                                               <button type="button" name="view-supplier" class="fas fa-eye text-success text-primary border border-0 bg-white"
                                                            data-bs-toggle="modal" data-bs-target="#detailModal"
                                                            
                                                            onclick="ChangeStarus('<?php echo $row['sent_inquiry_id']; ?>',
                                                                                  '<?php echo $row['category_name']; ?>',
                                                                                  '<?php echo $row['product_name']; ?>',
                                                                                  '<?php echo $row['quantity']; ?>',
                                                                                  '<?php echo $row['volume_name']; ?>',
                                                                                  '<?php echo "Cracked"; ?>',
                                                                                  '<?php echo $row['sup_amount']; ?>',
                                                                                  );">
                                                    </button>
                                                <!--<form class="d-inline" action="update-product.php" method="post">-->
                                                    <!-- update -->
                                                <!--    <input type="hidden" value="<?php echo $row['spId'] ?>" name="spId" />-->
                                                <!--    <button type="submit" name="update-product" id="" class="fas fa-edit  border border-0 bg-white">-->
                                                <!--</form>-->

                                            </td>
                                        </tr>

                                <?php
                                        $cno++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function ChangeStarus(sent_inquiry_id,category_name, product_name, quantity, volume_name, pending, sup_amount) {
    
     document.getElementById("sent_inquiry_id").textContent = sent_inquiry_id;
    document.getElementById("category_name").textContent = category_name;
    document.getElementById("product_name").textContent = product_name;
    document.getElementById("quantity").textContent = quantity + ' '+volume_name;
    // document.getElementById("pending").textContent = pending;
    document.getElementById("sup_amount").textContent = sup_amount;
    // document.getElementById("description").textContent = description;
    console.log("ChangeStarus function called.");
}
</script>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Add You Quatation Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form starts here -->
           
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="sent_inquiry_id" name="sent_inquiry_id">
                                
                                <label class="form-label" for="category_name">Category</label>
                                <p class="form-control-static" id="category_name"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product_name">Product</label>
                                <p class="form-control-static" id="product_name"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="quantity">Quantity</label>
                                <p class="form-control-static" id="quantity"></p>
                            </div>
                            <!--<div class="mb-3">-->
                            <!--    <label class="form-label" for="pending">Status</label>-->
                            <!--    <p class="form-control-static" id="pending"></p>-->
                            <!--</div>-->
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="sup_amount">Amount Per Pieces</label>
                                <p class="form-control-static" id="sup_amount"></p>
                                <!--<input type="number" class="form-control" id="sup_amount" name="sup_amount" min="1" required>-->
                            </div>
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