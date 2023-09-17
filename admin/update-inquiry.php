<?php
include 'includes/header.php';
?>
<?php



if (isset($_POST['update'])) {

    echo $inquiry_id = $_POST['inq_id'];
    // $customer_id = $_POST['customer_company'];
    // $product_id = $_POST['product_name'];
    // $quantity = $_POST['quantity'];
    // $volume_name = $_POST['volume'];
    $inquiry_status = !empty($_POST['inquiry_status']) ? $_POST['inquiry_status'] : 0;
    $assign_employee = !empty($_POST['assign_employee']) ? $_POST['assign_employee'] : 0;
    $assign_supplier =!empty($_POST['supplier_company']) ? $_POST['supplier_company'] : 0;


    if ($_FILES['quotation']['size'] != 0) {
        echo $inquiry_id = $_POST['inq_id'];
        echo $_FILES['quotation']['size'];
        $file = $_FILES['quotation'];
        $imageName = $file['name'];
        $fileTmpPath = $_FILES["quotation"]["tmp_name"];
        $fileSize = $file['size'];

        // Specify the directory to which you want to save the uploaded file
        $targetDirectory = 'images/quotation/';


        $targetFilePath = $targetDirectory . $imageName;
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            $query = "UPDATE tbl_inquiry
            SET inquiry_status_id = $inquiry_status,
                emp_assign_id = $assign_employee,
                supplier_assign_id =$assign_supplier,
                Quotation_pdf ='$imageName'
            WHERE id = $inquiry_id";


            $result = mysqli_query($conn, $query);
            echo $result;
            if ($result) {
                echo "<script type='text/javascript'>alert('Updated!');</script>";
                echo '<script>window.location.href = "manage-inquiry.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went!');</script>";
                echo '<script>window.location.href = "manage-inquiry.php";</script>';
            }
        }
    } else {

        // customer_id = $customer_id,
        // product_id = $product_id,
        // quantity = $quantity,
        // volume_name = '$volume_name',
        echo  $inquiry_id = $_POST['inq_id'];
        $query = "UPDATE tbl_inquiry
        SET inquiry_status_id = $inquiry_status,
            emp_assign_id = $assign_employee,
            supplier_assign_id =$assign_supplier
        WHERE id = $inquiry_id";

        $result = mysqli_query($conn, $query);
        // print_r($result);
        if ($result) {
            echo "<script type='text/javascript'>alert('Updated!');</script>";
            echo '<script>window.location.href = "manage-inquiry.php";</script>';
        } else {
            echo "<script type='text/javascript'>alert('Something went!');</script>";
            echo '<script>window.location.href = "manage-inquiry.php";</script>';
        }
    }
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
                        <h4>Update Inquiry</h4>
                    </div>

                    <!-- start form update inquiry -->
                    <form class="" method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" class="form-control" id="inq_id" aria-describedby="inq_id" name="inq_id"
                            value="<?php echo $_POST['inq_id']; ?>">

                        <?php

                        if (isset($_POST['inq_id'])) {

                            $sql = "SELECT tbl_inquiry.*,tbl_customer.name as cust_name, tbl_inquiry.id as inq_id,tbl_user.name as employee_name,tbl_supplier.company_name as sup_name
                            FROM tbl_inquiry 
                            LEFT JOIN tbl_customer on tbl_inquiry.customer_id = tbl_customer.id
                            LEFT JOIN tbl_product on tbl_inquiry.product_id = tbl_product.id
                            LEFT JOIN tbl_inquiry_status on tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id
                            LEFT JOIN tbl_user on tbl_inquiry.emp_assign_id = tbl_user.id
                            LEFT JOIN tbl_supplier on tbl_inquiry.supplier_assign_id = tbl_supplier.id
                             WHERE tbl_inquiry.id='" . $_POST['inq_id'] . "'";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                $customer_id = $row['customer_id'];
                                $product_id = $row['product_id'];
                                $inquiry_status_id = $row['inquiry_status_id'];
                                $emp_assign_id = $row['emp_assign_id'];
                                $supplier_assign_id = $row['supplier_assign_id'];
                                $quantity = $row['quantity'];
                                $volume_name = $row['volume_name'];
                            }



                        ?>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Customer Company</label>
                                <div>
                                    <select disabled class="form-control dropdown" id="customer_company"
                                        name="customer_company">

                                        <?php
                                            $sql = 'SELECT * FROM tbl_customer';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($customer_id == $row['id']) {
                                                        echo "<option selected='' id='" . $row['email_id'] . "' value='" . $row['id'] . "' name='customer_company'>" . $row['company_name'] . "</option>";
                                                    } else {
                                                        echo "<option id='" . $row['email_id'] . "' value='" . $row['id'] . "' name='customer_company'>" . $row['company_name'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Product</label>
                                <div>
                                    <select disabled class="form-control dropdown" id="product_name"
                                        name="product_name">
                                        <!-- <option disabled="" selected="">--Choose Product -- </option> -->

                                        <?php
                                            $sql = 'SELECT * FROM tbl_product';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($product_id == $row['id']) {
                                                        echo "<option selected='' id='" . $row['product_name'] . "' value='" . $row['id'] . "' name='product_name'>" . $row['product_name'] . "</option>";
                                                    } else {
                                                        echo "<option id='" . $row['product_name'] . "' value='" . $row['id'] . "' name='product_name'>" . $row['product_name'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input disabled type="text" class="form-control" id="quantity"
                                    aria-describedby="quantity" name="quantity" value="<?php echo $quantity; ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="quantity" class="form-label">In</label>
                                <input disabled type="text" class="form-control" id="volume"
                                    aria-describedby="volume_name" name="volume_name"
                                    value="<?php echo $volume_name; ?>">
                            </div>
                        </div>



                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Assign employee</label>
                                <div>
                                    <select class="form-control dropdown" id="assign_employee" name="assign_employee">
                                        <option disabled="" selected="" id="assign_employee" name="assign_employee">
                                            --Choose employee -- </option>

                                        <?php
                                            $sql = 'SELECT * FROM tbl_user';
                                            $result = mysqli_query($conn, $sql);

                                            // $sql = 'SELECT name FROM tbl_user
                                            // JOIN tbl_dept on tbl_user.dept_id = tbl_dept.id
                                            //  WHERE tbl_dept.name Not in() ';
                                            // $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($emp_assign_id == $row['id']) {
                                                        echo "<option selected='' id='" . $row['name'] . "' value='" . $row['id'] . "' name='employee'>" . $row['name'] . "</option>";
                                                    } else {

                                                        echo "<option id='" . $row['name'] . "' value='" . $row['id'] . "' name='employee'>" . $row['name'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Select Supplier</label>
                                <div>
                                    <select class="form-control dropdown" id="supplier_company" name="supplier_company">
                                        <option disabled="" selected="" id="supplier_company" name="supplier_company">
                                            --Choose supplier -- </option>

                                        <?php
                                            $sql = 'SELECT * FROM tbl_supplier';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($supplier_assign_id == $row['id']) {
                                                        echo "<option selected='' id='" . $row['company_name'] . "' value='" . $row['id'] . "' name='supplier_company'>" . $row['company_name'] . "</option>";
                                                    } else {

                                                        echo "<option id='" . $row['company_name'] . "' value='" . $row['id'] . "' name='supplier_company'>" . $row['company_name'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Inquiry status</label>
                                <div>
                                    <select class="form-control dropdown" id="inquiry_status" name="inquiry_status">
                                        <option disabled="" selected="" id="inquiry_status" name="inquiry_status">
                                            --Choose status -- </option>

                                        <?php
                                            $sql = 'SELECT * FROM tbl_inquiry_status';
                                            $result = mysqli_query($conn, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($inquiry_status_id == $row['id']) {

                                                        echo "<option selected='' id='" . $row['status'] . "' value='" . $row['id'] . "' name='inquiry_status'>" . $row['status'] . "</option>";
                                                    } else {
                                                        echo "<option id='" . $row['status'] . "' value='" . $row['id'] . "' name='inquiry_status'>" . $row['status'] . "</option>";
                                                    }
                                                }
                                            } else {
                                                echo 'No data found.';
                                            }

                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">quotation</label>
                                <input type="file" class="form-control" name="quotation" id="quotation">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary" name="update">Submit</button>

                    </form>
                    <?php } else {
                            echo '<script>window.location.href = "manage-inquiry.php";</script>';
                        } ?>
                    <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>