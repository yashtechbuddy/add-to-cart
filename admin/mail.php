<?php

require 'smtp/PHPMailerAutoload.php';
include("includes/function.php");
include("includes/config.php");

$company_name = "TRADING";
$company_website = "trading.in";

$qry = "SELECT * FROM tbl_settings where id=1";
$result = mysqli_query($conn, $qry);
$settings_row = mysqli_fetch_assoc($result);
$client_msg = $settings_row['client_msg'];
$company_email = $settings_row['mail_from'];

// if(isset($_POST['send-mail'])) {
//     Send email
//     $supplier_id = $_POST['sid'];
    
// }
global $id;
if(isset($_POST['send-mail']) && $_POST['sid']>0 )
{
     $_POST['sid'];
	$id=mysqli_real_escape_string($conn,$_POST['sid']);
	$res=mysqli_query($conn,"select * from tbl_supplier where id='$id'");
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$email= $row['email'];
		$password=$row['password'];
		
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
                                                <h2 style="color:#000;">Login Credentials </h2>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Email Id :- ' . $email . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Password :- ' . $password . '</td>    
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Click <a href="https://rndtd.com/demos/trading/working/supplier">here</a> to login.</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>';
// 		$attachmentPath = 'catalogue.pdf';
		smtp_mailer($email,'Verified', $html);
 
    echo 'Sent';
  } else {
    echo 'Invalid Details';
  }
} else {
  echo 'Id not found';
}
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
	$mail->SetFrom("yashkhuble.rndtechnosoft@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));

	if(!$mail->Send()){
// 		echo $mail->ErrorInfo;
	}else{
	 $id = $_POST['sid']; 
	 
	 $verified = array(
    'verified' => 1,
     );
     
      $status = array(
    'status_id' => 1,
     );
     
	   Update('tbl_supplier',$verified,'id ='.$id );
	   Update('tbl_supplier',$status,'id ='.$id );
	   echo "<script>window.location.href='manage-supplier.php'</script>";
	}
}
?>
?>