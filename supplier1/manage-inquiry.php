<?php
require 'smtp/PHPMailerAutoload.php';
include 'includes/header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php 

$company_name = $_SESSION['supplier_data']['company_name'];
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
            	$mail->SetFrom("yashkhuble.rndtechnosoft@gmail.com",$_SESSION['supplier_data']['company_name']);
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
if(isset($_POST['add-amount'])){
    
    $ref_id =  $_POST['ref_id']; 
    $sent_inquiry_id = $_POST['sent_inquiry_id'];
    $product = $_POST['product'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity-volume'];
    $sup_amount = $_POST['sup_amount'];
  
     
     $sql = "UPDATE tbl_manage_inquiry SET sup_amount= $sup_amount WHERE id =  $sent_inquiry_id";
     
     $result = mysqli_query($conn,$sql);
     
     
            $company_name = "TRADING";
            $company_website = "trading.in";
            
            $suppleir_id = $_SESSION['supplier_data']['id'];
        
            	$res=mysqli_query($conn,"select * from tbl_supplier where id = $suppleir_id");
            	if(mysqli_num_rows($res)>0){
            		$supplier_row=mysqli_fetch_assoc($res);
            		$email ="yashkhuble.rndtechnosoft@gmail.com";
            		$company_name = $supplier_row['company_name'];
            		
            		
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
                                                            <h2 style="color:#000;">' . $company_name . ' Qoutation</h2>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Ref_id :- ' . $ref_id . '</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Category :- ' . $category . '</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Product :- ' . $product . '</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Quanitity :- ' . $quantity .'</td>    
                                                    </tr>
                                                    <tr>
                                                        <td>Amount :- ' . $sup_amount . ' </td>    
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>';
            // 		$attachmentPath = 'catalogue.pdf';
            		smtp_mailer($email,'Product Quotation', $html);
                  
                echo 'Sent';
              } else {
                echo 'Invalid Details';
              }
     if($result){
        echo "<script>alert('Amount is Send');</script>";
     }
}

include 'includes/side-bar.php';
?>

<?php include 'includes/top-bar.php';
?>


<div class="container px-4">
   <ul class="nav nav-tabs nav-justified mb-3" id="myTab" role="tablist">

  <li class="nav-item card" role="presentation">
    <a class="nav-link active" id="pending-tab" data-bs-toggle="tab" href="#pending" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
  </li>
  <li class="nav-item card" role="presentation">
    <a class="nav-link" id="inprocess-tab" data-bs-toggle="tab" href="#inprocess" data-bs-target="#inprocess" type="button" role="tab" aria-controls="inprocess" aria-selected="false">In process</a>
  </li>
  <li class="nav-item card" role="presentation">
    <a class="nav-link" id="crack-tab" data-bs-toggle="tab" href="#crack" data-bs-target="#crack" type="button" role="tab" aria-controls="crack" aria-selected="false">Crack</a>
  </li>
  
  <li class="nav-item card" role="presentation">
    <a class="nav-link" id="cancel-tab" data-bs-toggle="tab" href="#cancel" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="false">Cancel</a>
  </li>
</ul> 
</div>

<div class="tab-content" id="myTabContent">
    
  <!--pending -->
 
     <div class="tab-pane fade" id="inprocess" role="tabpanel" aria-labelledby="inprocess-tab">  
      hhhh
     </div>

    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab"> 
    <div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>In process</h4>
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $supplier_id = $_SESSION['supplier_data']['id'];
                                $sql = "SELECT tbl_manage_inquiry.*,tbl_manage_inquiry.id as sent_inquiry_id ,tbl_product.product_name, tbl_categories.category_name from tbl_manage_inquiry
                                        JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
                                        JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
                                        WHERE tbl_manage_inquiry.supplier_id = $supplier_id AND sup_amount > 1  ";

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
                                            <td>
                                                    <?php
                                                    if ($row['status_id'] == 4) {
                                                        echo "Too High Cancel";
                                                    } elseif ($row['status_id'] == 3) {
                                                        echo $status = "Finish";
                                                    } else {
                                                        echo $status = "Processing";
                                                    }
                                                    ?>
                                            </td>
                                            
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
                                                                                  '<?php echo $status; ?>',
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
  </div>
</div>  

</div>  
  
 

<?php
include 'includes/footer.php';
?>