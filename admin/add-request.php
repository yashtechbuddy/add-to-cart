<?php
require 'smtp/PHPMailerAutoload.php';
include 'includes/header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
//$inquiry_id in the autogenrated id from the bengin of the transection
if (isset($_POST['add-request'])) {
    $inquiry_id = $_POST['inquiry_id'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product'];
    $category_name = $_POST['category'];
    $quantity = $_POST['quantity'];
    $volume_name = $_POST['volume_name'];
    $assign_id = $_SESSION['admin_id'];
    $suppliers = $_POST['supplier']; 
    
  function smtp_mailer($to, $subject, $msg){
                
            	$mail = new PHPMailer(); 
            	$mail->IsSMTP(); 
            	$mail->SMTPAuth = true; 
            	$mail->SMTPSecure = 'tls'; 
            	$mail->Host = "smtp.gmail.com";
            	$mail->Port = 587; 
            	$mail->IsHTML(true);
            	$mail->CharSet = 'UTF-8';
            	$mail->Username = "yashkhuble.rndtechnosoft@gmail.com";
            	$mail->Password = "dblkbaunavnasgwb";
            	$mail->SetFrom("yashkhuble.rndtechnosoft@gmail.com","Offical Trading");
            	$mail->Subject = $subject;
            	$mail->Body =$msg;
            	$mail->AddAddress($to);
            	$mail->SMTPOptions=array('ssl'=>array(
            		'verify_peer'=>false,
            		'verify_peer_name'=>false,
            		'allow_self_signed'=>false
            	));
            
            	if(!$mail->Send()){
            		echo $mail->ErrorInfo;
            	}
            }    
    if (is_array($suppliers) && count($suppliers) > 0) {
        //$inquiry_id in the autogenrated id from the bengin of the transection
        $inquiry = "UPDATE tbl_inquiry SET inquiry_status_id = 2 WHERE product_id = $product_id AND autogenrated_id = '$inquiry_id' ";
        mysqli_query($conn, $inquiry);
        
        foreach ($suppliers as $supplierId) {
            
            $insertSupplierQuery = "INSERT INTO tbl_manage_inquiry (customer_id, supplier_id, inquiry_id, assign_id, product_id, quantity, volume_name) VALUES 
            ($customer_id, $supplierId, '$inquiry_id', $assign_id, $product_id, $quantity, '$volume_name')";
            $result = mysqli_query($conn, $insertSupplierQuery);
            
            
            
            //Mail
            $company_name = "TRADING";
            $company_website = "trading.in";
            
           
        
            	$res=mysqli_query($conn,"select * from tbl_supplier where id='$supplierId'");
            	if(mysqli_num_rows($res)>0){
            		$row=mysqli_fetch_assoc($res);
            		$email=$row['email'];
            		
            		
            		$html='
            	<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title></title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <style>
                            .styled-table {
                                border-collapse: collapse;
                                margin: 25px 0;
                                font-size: 0.9em;
                                font-family: sans-serif;
                                min-width: 400px;
                                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                            }
                            .styled-table thead tr {
                                background-color: #009879;
                                color: #ffffff;
                                text-align: left;
                            }
                            .styled-table th,
                            .styled-table td {
                                padding: 12px 15px;
                            }
                            .styled-table tbody tr {
                                border-bottom: 1px solid #dddddd;
                            }
                            .styled-table tbody tr:nth-of-type(even) {
                                background-color: #f3f3f3;
                            }
                            .styled-table tbody tr:last-of-type {
                                border-bottom: 2px solid #009879;
                            }
                            .styled-table tbody tr.active-row {
                                font-weight: bold;
                                color: #009879;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="background:#fff">
                                        <center>
                                            <table class="styled-table">
                                                <thead>
                                                    <tr>
                                                        <td style="background::#f3f3f3;">
                                                            <h2 style="color:#000;">Product Inquiry</h2>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Category :- ' . $category_name . '</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Product :- ' . $product_name . '</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Quanitity :- ' . $quantity . ' '.$volume_name.'</td>    
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                     <div style="background:#fff; margin-top: 20px; padding: 10px;">
                                        <h3>Note:</h3>
                                        <p>Please send Quotation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>';
            // 		$attachmentPath = 'catalogue.pdf';
            		smtp_mailer($email,'Product Inquiry', $html);
                  
                echo 'Sent';
              } else {
                echo 'Invalid Details';
              }
           
           
}

        if ($result) {
            echo "<script>
                    alert('The request has been sent successfully');
                    window.location.href = 'master-inquiry.php'; 
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "No suppliers were selected.";
    }
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
                        <h4>Add Request</h4>
                    </div>
                  
                         <?php 
                            $inquiryId = $_GET['inquiryId'];
                            $product_id = $_GET['product_id'];
                                                    
                                if(isset($_GET['inquiryId']) AND isset($_GET['product_id']) )  {
                                    
                                    $sql= "SELECT tbl_inquiry.*, tbl_product.product_name, tbl_categories.category_name,tbl_customer.name as cust_name, tbl_inquiry_status.status  
                                        FROM tbl_inquiry 
                                         JOIN tbl_customer ON tbl_inquiry.customer_id = tbl_customer.id  
                                        JOIN tbl_product ON tbl_inquiry.product_id = tbl_product.id 
                                        JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id 
                                        JOIN tbl_inquiry_status ON tbl_inquiry.inquiry_status_id = tbl_inquiry_status.id 
                                        WHERE tbl_inquiry.autogenrated_id = '$inquiryId' AND product_id = $product_id ";
                                                    
                                        $inquiry_result = mysqli_query($conn, $sql);
                                        
                                        $inquiry_data = mysqli_fetch_assoc($inquiry_result);

                                } 
                                            
                                                            
                            ?>
                            <form  method="post" enctype="multipart/form-data">
                                <div class="mb-3 row col-12">
                                    <div class="mb-3 col-lg-6">
                                        <label for="inquiry_id" class="form-label">Inquiry Id</label>
                                        <input type="text" disabled class="form-control" id="inquiry_id" aria-describedby="inquiry_id" name="" value="<?php echo $_GET['inquiryId'] ?>" >
                                        <input type="hidden"  class="form-control" id="inquiry_id" aria-describedby="inquiry_id" name="inquiry_id" value="<?php echo $_GET['inquiryId'] ?>" >
                                        
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="cust_name" class="form-label">Customer</label>
                                        <input type="text" disabled class="form-control" id="cust_name" aria-describedby="cust_name" name="" value="<?php echo $inquiry_data['cust_name']  ?>" >
                                        <input type="hidden"  class="form-control" id="customer_id" aria-describedby="customer_id" name="customer_id" value="<?php echo $inquiry_data['customer_id']  ?>" >
                                    </div>
                                </div>
                                
                                 <div class="mb-3 row col-12">
                                    <div class="mb-3 col-lg-6">
                                        <label for="category_name" class="form-label">Category</label>
                                        <input type="text" disabled class="form-control" id="category_name" aria-describedby="category_name" name="" value="<?php echo $inquiry_data['category_name']  ?>" >
                                        <input type="hidden"  class="form-control" id="category_name" aria-describedby="category" name="category" value="<?php echo $inquiry_data['category_name']  ?>" >
                                        
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="product_name" class="form-label">Product</label>
                                        <input type="text" disabled class="form-control" id="product_name" aria-describedby="product_name" name="" value="<?php echo $inquiry_data['product_name']?>" >
                                        <input type="hidden"  class="form-control" id="product_name" aria-describedby="product" name="product" value="<?php echo $inquiry_data['product_name']?>" >
                                        <input type="hidden"  class="form-control" id="product_id" aria-describedby="product_id" name="product_id" value="<?php echo $_GET['product_id']; ?>" >
                                    </div>
                                </div>
                                
                                <div class="mb-3 row col-12">
                                    <div class="mb-3 col-lg-6">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" disabled class="form-control" id="quantity" aria-describedby="quantity" name="" value="<?php echo $inquiry_data['quantity']?>" >
                                        <input type="hidden"  class="form-control" id="quantity" aria-describedby="quantity" name="quantity" value="<?php echo $inquiry_data['quantity']?>" >
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="inquiryId" class="form-label">In</label>
                                        <input type="text" disabled class="form-control" id="volume_name" aria-describedby="volume_name" name="volume_name" value="<?php echo $inquiry_data['volume_name']  ?>">
                                        <input type="hidden"  class="form-control" id="volume_name" aria-describedby="volume_name" name="volume_name" value="<?php echo $inquiry_data['volume_name']  ?>">
                                        
                                    </div>
                                </div>
                                
                                <div class="mb-3 row col-12">
                                    <div class="mb-3 col-lg-6">
                                        <label for="name" class="form-label">Select Supplier</label>
                                        <div>
                                            <select class="form-control dropdown " multiple multiselect-search="true" multiselect-select-all="true" id="supplier" name="supplier[]" placeholder="Select Supplier" requir>
                                                <?php
                                                $sql = "SELECT tbl_supplier_products.*,tbl_supplier.company_name   FROM tbl_supplier_products 
                                                JOIN tbl_supplier ON tbl_supplier_products.supplier_id = tbl_supplier.id  WHERE tbl_supplier_products.product_id = $product_id";
                                                $result = mysqli_query($conn, $sql);
        
                                                if ($result && mysqli_num_rows($result) > 0) {
        
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option id='" . $row['name'] . "' value='" . $row['supplier_id'] . "' name='company_name[]'>" . $row['company_name'] . "</option>";
                                                    }
                                                } else {
                                                    echo 'No data found.';
                                                }
        
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary" value="request" name="add-request">Submit</button>
        
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