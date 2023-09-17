<?php
include 'includes/header.php';
if (isset($_POST['delProdt'])) {
    $del = $_POST['spId'];
    deleteRecord('tbl_supplier_products', 'id=' . $del);
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
                        <h4>Products</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="add-product.php" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $supplier_id = $_SESSION['supplier_data']['id'];
                                $sql = "SELECT  tbl_supplier_products.*, tbl_supplier_products.id as sspId,
                                tbl_product.product_name as pname, 
                                tbl_supplier.company_name as supplier_company, 
                                tbl_categories.category_name as category_name,
                                tbl_supplier.whatsapp_no as sup_whatsapp_no
                                
                                FROM tbl_supplier_products
                                join tbl_categories on tbl_supplier_products.category_id = tbl_categories.id
                                join tbl_product on tbl_supplier_products.product_id = tbl_product.id
                                join tbl_supplier on tbl_supplier_products.supplier_id = tbl_supplier.id
                                WHERE tbl_supplier_products.supplier_id= $supplier_id" ;

                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>

                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['pname'] ?></td>
                                            
                                            <td>

                                                <!-- visiblity -->
                                                <!-- <input type="hidden" value="<?php echo $row['sspId'] ?>"  name="spId" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                                <form class="d-inline" method="post" onsubmit="deleteRecord('tbl_product',<?php $row['spId'] ?>);">
                                                    <!-- delete -->
                                                    <input type="hidden" value="<?php echo $row['spId'] ?>" name="spId" />
                                                    <button type="submit" name="delProdt" id="" class="fas fa-trash-alt text-danger border border-0 bg-white" onclick=" return confirm('Confirm deletion?')">
                                                </form>&nbsp&nbsp
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

<?php
include 'includes/footer.php';
?>