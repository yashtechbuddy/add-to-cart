<?php include 'includes/header.php'; ?>
<?php 
include 'includes/side-bar.php';
include 'includes/top-bar.php';
?>
<?php
if (isset($_POST['addproduct'])) {
    
     $supplier_id = $_SESSION['supplier_data']['id'];
     $product_id = $_POST['product_name'];
     $category_id = $_POST['category_name'];
 

    $query = "INSERT INTO tbl_supplier_products(supplier_id,category_id,product_id) 
        VALUES ($supplier_id,$category_id,$product_id)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'>alert('Inserted!');</script>";
        echo '<script>window.location.href = "products.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
        echo '<script>window.location.href = "products.php";</script>';
    }
}

?>





<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Add Product</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">

                            <div class="mb-3 col-lg-6">
                                <label for="Category" class="form-label">Category</label>
                                <div>
                                    <select class="form-control" id="category_name" name="category_name" required>
                                        <option disabled="" selected="">--Choose Category -- </option>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_categories';
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option id='category' value='" . $row['id']  . "' name='category'>" . $row['category_name'] . "</option>";
                                            }
                                        } else {
                                            echo 'No data found.';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-lg-6">
                                <label for="product_name" class="form-label">Product</label>
                                <div>
                                    <select class="form-control" id="product_name" name="product_name" required>
                                        <option disabled="" selected="" name>--Choose Product -- </option>
                                    </select>
                                </div>
                            </div>




                        </div>
                        <button type="submit" class="btn btn-primary" value="product" name="addproduct">Submit</button>

                    </form>
                    <!-- end of form  -->



                </div>
            </div>
        </div>
    </div>
</div>



<?php
include 'includes/footer.php';
?>