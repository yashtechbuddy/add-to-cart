<?php
require 'smtp/PHPMailerAutoload.php';
include 'includes/header.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$qry = "SELECT * FROM tbl_settings where id=1";
$result = mysqli_query($conn, $qry);
$settings_row = mysqli_fetch_assoc($result);
$client_msg = $settings_row['client_msg'];
$company_email = $settings_row['mail_from'];
$name = "Official Trading";
?>
<?php
if (isset($_POST['update-detail'])) {
     $cust_amount = $_POST['cust_amount'];
     $status = $_POST['inquiry_status'];
     $sent_inquiry_id= $_POST['sent_inquiry_id'];
     $product_id = $_POST['product_id'];
     $autogenrated_id= $_POST['autogenrated_id'];
     
    
    

 
        // Prepare the SQL statement
        $query = "UPDATE tbl_manage_inquiry SET cust_amount = $cust_amount , status_id = $status WHERE id = $sent_inquiry_id;";
        $stmt = mysqli_query($conn, $query);
        
         $updatestatus = "UPDATE tbl_inquiry 
                SET inquiry_status_id = $status , amount = '$cust_amount'
                WHERE autogenrated_id = '$autogenrated_id'
                AND product_id = $product_id";
        $updateds = mysqli_query($conn, $updatestatus);
        
    if($status == 3){
        
        $updatestatus = "UPDATE tbl_manage_inquiry 
                SET status_id = 7
                WHERE inquiry_id = '$autogenrated_id' 
                AND (status_id = 2 OR status_id = 1) AND sup_amount > 0
                AND product_id = $product_id";
        $updated = mysqli_query($conn, $updatestatus);
        
        $updatestatus = "UPDATE tbl_manage_inquiry 
                SET status_id = 8
                WHERE inquiry_id = '$autogenrated_id' 
                AND (status_id = 2 OR status_id = 1) AND sup_amount = 0
                AND product_id = $product_id";
        $updated = mysqli_query($conn, $updatestatus);
        
        $updatestatus = "UPDATE tbl_inquiry 
                SET inquiry_status_id = 3 , amount = '$cust_amount'
                
                WHERE autogenrated_id = '$autogenrated_id' 
                AND (inquiry_status_id = 2 OR inquiry_status_id = 1)
                AND product_id = $product_id";
        $updateds = mysqli_query($conn, $updatestatus);
        
        
        if($updateds){
            
            $selectcustsup = "SELECT tbl_manage_inquiry.* , tbl_supplier.email AS sup_email , 
            tbl_customer.email_id AS cust_email ,tbl_categories.category_name AS cat_name, 
            tbl_product.product_name AS p_name , tbl_inquiry_status.status AS status
            FROM tbl_manage_inquiry 
            JOIN tbl_supplier ON tbl_manage_inquiry.supplier_id = tbl_supplier.id
            JOIN tbl_customer ON tbl_manage_inquiry.customer_id = tbl_customer.id
            JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
            JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
            JOIN tbl_inquiry_status ON tbl_manage_inquiry.status_id = tbl_inquiry_status.id
            WHERE tbl_manage_inquiry.inquiry_id= '$autogenrated_id' AND tbl_manage_inquiry.product_id = $product_id AND tbl_manage_inquiry.status_id = 3 limit 1 ";
              
            $cust_sup = mysqli_query($conn,$selectcustsup);
            $data = mysqli_fetch_assoc($cust_sup);
            // print_r($data);
            echo $cust_email= $data['cust_email'];
            echo $sup_email= $data['sup_email'];
            echo $product = $data['p_name'];
            echo $category = $data['cat_name'];
            echo $quantity = $data['quantity'].' '.$data['volume_name'];
            echo $status =   $data['status'];
                 $cust_amount =   $data['cust_amount'];
                 $sup_amount =   $data['sup_amount'];
                
// 		first mail for customer on done status
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
                                                <h2 style="color:#000;">Your Qoutation</h2>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Transection Id :- ' . $autogenrated_id . '</td>    
                                        </tr>
                                         <tr>
                                            <td>Category :- ' . $category . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Product :- ' . $product . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Qunatity:- ' . $quantity . '</td>    
                                        </tr>   
                                        <tr>
                                            <td>Amount:- '.$cust_amount.'</td>    
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
    	$mail->SetFrom($company_email,$name,true);
    	$mail->Subject = "Your Qoutation";
    	$mail->Body =$html;
    	$mail->AddAddress($cust_email);
    // 	$mail->AddReplyTo("amee.rndtechnosoft@gmail.com", $name);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    
    // 	$mail->Send();
        
        // second mail for supplier who is selected
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
                                                <h2 style="color:#000;">Your Is Selected Qoutation</h2>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Transection Id :- ' . $autogenrated_id . '</td>    
                                        </tr>
                                         <tr>
                                            <td>Category :- ' . $category . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Product :- ' . $product . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Qunatity:- ' . $quantity . '</td>    
                                        </tr>   
                                        <tr>
                                            <td>Amount:- '.$sup_amount.'</td>    
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
    	$mail->SetFrom($company_email,$name,true);
    	$mail->Subject = "Your Qoutation Selected ";
    	$mail->Body =$html;
    	$mail->AddAddress($sup_email);
    // 	$mail->AddReplyTo("amee.rndtechnosoft@gmail.com", $name);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    
    // 	$mail->Send();
        
        // To the high rate supplier mail 
        
            $selectsup = "SELECT tbl_manage_inquiry.*,tbl_supplier.email AS sup_email, tbl_categories.category_name AS category , 
                         tbl_product.product_name AS p_name  from tbl_manage_inquiry
                         JOIN tbl_supplier ON tbl_manage_inquiry.supplier_id = tbl_supplier.id 
                         JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
                         JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
                         WHERE  tbl_manage_inquiry.inquiry_id = '$autogenrated_id' AND tbl_manage_inquiry.product_id = $product_id AND tbl_manage_inquiry.status_id = 8";
        
         $supstmt = mysqli_query($conn,$selectsup);
        //  $suppliers = mysqli_fetch_assoc($supstmt);
         if($supstmt){
           while($suppliers = mysqli_fetch_assoc($supstmt)){
             if($suppliers['send_status'] == 1  ){
                 
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
                                                                <h2 style="color:#000;">Your Qoutation Is too high</h2>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Transection Id :- ' . $autogenrated_id . '</td>    
                                                        </tr>
                                                        <tr>
                                                            <td>Category :- ' . $category . '</td>    
                                                        </tr>
                                                        <tr>
                                                            <td>Product :- ' . $product . '</td>    
                                                        </tr>
                                                        <tr>
                                                            <td>Qunatity:- ' . $quantity . '</td>    
                                                        </tr>   
                                                        <tr>
                                                            <td>Amount:- '.$sup_amount.'</td>    
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
                    $supt = $suppliers['sup_email'];
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
    	            $mail->SetFrom($company_email,$name,true);
    	            $mail->Subject = "Too high Qoutation";
    	            $mail->Body =$html;
    	            $mail->AddAddress($supt);
    // 	            $mail->AddReplyTo("amee.rndtechnosoft@gmail.com", $name);
    	            $mail->SMTPOptions=array('ssl'=>array(
    		            'verify_peer'=>false,
    		            'verify_peer_name'=>false,
    		            'allow_self_signed'=>false
    	            ));
    
    	            $mail->Send();
    	            
    	             $sup_id =  $suppliers['supplier_id'];
    	             $inqid =  $suppliers['id'];
    	             $query = "UPDATE tbl_manage_inquiry SET send_status = 0  WHERE id  = $inqid and supplier_id = $sup_id ";
                     $stmt = mysqli_query($conn, $query);
             }
         }
         }
         
         
         // Not responed supplier
          $notresponed= "SELECT tbl_manage_inquiry.*,tbl_supplier.email AS sup_email, tbl_categories.category_name AS category , 
                         tbl_product.product_name AS p_name  from tbl_manage_inquiry
                         JOIN tbl_supplier ON tbl_manage_inquiry.supplier_id = tbl_supplier.id 
                         JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
                         JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
                         WHERE  tbl_manage_inquiry.inquiry_id = '$autogenrated_id' AND tbl_manage_inquiry.product_id = $product_id AND tbl_manage_inquiry.status_id = 8 AND send_status = 1";
       
        $notresponeds = mysqli_query($conn, $notresponed);

               if ($notresponeds) {
            // Loop through each row in the result set.
            while ($row = mysqli_fetch_assoc($notresponeds)) {
                // Access and print specific columns from the row.
                echo "Inquiry ID: " . $row['id'] . "<br>";
                echo "Product ID: " . $row['product_id'] . "<br>";
                echo "Status ID: " . $row['status_id'] . "<br>";
                 echo "sup_email ID: " . $row['sup_email'] . "<br>";
                 echo "category: " . $row['category'] . "<br>";
                // You can access other columns in a similar manner.
                echo "<br>"; // Add a line break between rows for readability.
                 if($row['send_status'] == 1  ){
                 
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
                                                                <h2 style="color:#000;">Too late</h2>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Transection Id :- ' . $autogenrated_id . '</td>    
                                                        </tr>
                                                       
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
        
// 		            $attachmentPath = 'catalogue.pdf';
                    $suppliersn_email = $row['sup_email'];
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
    	            $mail->SetFrom($company_email,$name,true);
    	            $mail->Subject = "Inquiry Expired";
    	            $mail->Body =$html;
    	           // $mail->AddAddress($suppliersn_email);
    // 	            $mail->AddReplyTo("amee.rndtechnosoft@gmail.com", $name);
    	            $mail->SMTPOptions=array('ssl'=>array(
    		            'verify_peer'=>false,
    		            'verify_peer_name'=>false,
    		            'allow_self_signed'=>false
    	            ));
    
    	            $mail->Send();
    	            
    	             echo $supn_id =  $row['supplier_id'];
    	             echo $inquiryid = $row['id'];
    	             $queryn = "UPDATE tbl_manage_inquiry SET send_status = 0  WHERE id = $inquiryid AND supplier_id = $supn_id ";
                     $notresp = mysqli_query($conn, $queryn);
                     
                     if (!$notresp) {
                         echo "Update query failed: " . mysqli_error($conn);
                        }
    	            
             }
            }
        }



         
        
         
        
          echo '<script>alert("Detail updated!");</script>';
          echo '<script>window.location.href = "sent-request-detail.php?inquiryId=' . $autogenrated_id . '&product_id=' . $product_id . '";</script>';
        }else{
            
            if($stmt){
                
            echo '<script>alert("Detail updated!");</script>';
            echo '<script>window.location.href = "sent-request-detail.php?inquiryId=' . $autogenrated_id . '&product_id=' . $product_id . '";</script>';
            }else {
            echo '<script>alert("Something went Wrong!");</script>';
           echo '<script>window.location.href = "sent-request-detail.php?inquiryId=' . $autogenrated_id . '&product_id=' . $product_id . '";</script>';
        }
        }   
        
}
  echo '<script>alert("Detail updated!");</script>';
  echo '<script>window.location.href = "sent-request-detail.php?inquiryId=' . $autogenrated_id . '&product_id=' . $product_id . '";</script>';   
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
                        <h4>Update Sent Request Detail</h4>
                    </div>
                    <?php
                    

                    if (isset($_GET['inquiryId'])) {
                       
                       $autogenrated_id = $_GET['inquiryId'];
                       $sent_inquiry_id = $_GET['sent_inquiry_id'];
                       $product_id = $_GET['product_id'];
                        // echo $deptId;
                        $Select = "SELECT 
                                    tbl_product.product_name, 
                                    tbl_manage_inquiry.*, 
                                    tbl_manage_inquiry.id AS sent_inquiry_id, 
                                    tbl_customer.name AS cust_name, 
                                    tbl_supplier.company_name, 
                                    tbl_categories.category_name, 
                                    tbl_inquiry_status.status
                                FROM 
                                    tbl_manage_inquiry
                                JOIN tbl_product ON tbl_manage_inquiry.product_id = tbl_product.id
                                JOIN tbl_categories ON tbl_product.category_id = tbl_categories.id
                                JOIN tbl_customer ON tbl_manage_inquiry.customer_id = tbl_customer.id
                                JOIN tbl_supplier ON tbl_manage_inquiry.supplier_id = tbl_supplier.id
                                JOIN tbl_inquiry_status ON tbl_manage_inquiry.status_id = tbl_inquiry_status.id
                                WHERE 
                                    tbl_manage_inquiry.inquiry_id = '$autogenrated_id' 
                                    AND tbl_manage_inquiry.product_id = $product_id AND tbl_manage_inquiry.id = $sent_inquiry_id";
                        if ($result = mysqli_query($conn, $Select)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    // print_r($rows);
                                    $inquiry_status_id = $rows['status_id'];

                    ?>
                                   
                                    <form class="" method="post" action="">
                                        <input type="hidden"  name="product_id" value="<?php echo $product_id; ?>" />
                                        <input type="hidden"  name="autogenrated_id" value="<?php echo $autogenrated_id; ?>" />
                                        <input type="hidden"  name="sent_inquiry_id" value="<?php echo $rows['sent_inquiry_id']; ?>" />
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-6">
                                                <label for="inquiry_id" class="form-label">Inquiry Id</label>
                                                <input type="text" disabled class="form-control" id="inquiry_id" aria-describedby="inquiry_id" name="inquiry_id" value="<?php echo $rows['inquiry_id']; ?>">
                                            </div>
                                              <div class="mb-3 col-6">
                                                <label for="product_name" class="form-label">Product</label>
                                                <input type="text" disabled class="form-control" id="product_name" aria-describedby="product_name" name="deptName" value="<?php echo $rows['product_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row col-12">
                                            <div class="mb-3 col-6">
                                                <label for="cust_name" class="form-label">Customer</label>
                                                <input type="text" disabled class="form-control" id="cust_name" aria-describedby="cust_name" name="cust_name" value="<?php echo $rows['cust_name']; ?>">
                                            </div>
                                              <div class="mb-3 col-6">
                                                <label for="company_name" class="form-label">Supplier</label>
                                                <input type="text" disabled class="form-control" id="company_name" aria-describedby="company_name" name="company_name" value="<?php echo $rows['company_name']; ?>">
                                            </div>
                                        </div>
                                        
                                        
                                          <div class="mb-3 row col-12">
                                            <div class="mb-3 col-6">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" disabled class="form-control" id="quantity" aria-describedby="quantity" name="quantity" value="<?php echo $rows['quantity']; ?>">
                                            </div>
                                              <div class="mb-3 col-6">
                                                <label for="volume_name" class="form-label">IN</label>
                                                <input type="text" disabled class="form-control" id="volume_name" aria-describedby="volume_name" name="volume_name" value="<?php echo $rows['volume_name']; ?>">
                                            </div>
                                        </div>
                                        
                                         <div class="mb-3 row col-12">
                                            <div class="mb-3 col-6">
                                                <label for="cust_amount" class="form-label">Customer Amount</label>
                                                <input type="text"  class="form-control" id="cust_amount" aria-describedby="cust_amount" name="cust_amount" value="<?php echo $rows['cust_amount']; ?>">
                                            </div>
                                              <div class="mb-3 col-6">
                                                <label for="sup_amount" class="form-label">Supplier Amount</label>
                                                <input type="text" disabled class="form-control" id="sup_amount" aria-describedby="sup_amount" name="sup_amount" value="<?php echo $rows['sup_amount']; ?>">
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
                                                <div class="mb-3 col-6  <?php if(empty($rows['cust_po'])){ echo "d-none"; } ?>">
                                                <label for="cust_po" class="form-label">Customer PO</label><br>
                                               <a href="images/customerpo/<?php echo $rows['cust_po']; ?>" id="cust_po" class="btn btn-primary" aria-describedby="cust_po" name="cust_po" target="_blank">View</a>
                                            </div>
                                         </div>
                                         
                                          

                                        
                                        <button type="submit" class="btn btn-primary" name="update-detail">Submit</button>

                                    </form>
                                    <!-- end of form  -->
                    <?php
                                }
                            }
                        }
                    } else {
                        echo '<script>window.location.href = "manage-department.php";</script>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>