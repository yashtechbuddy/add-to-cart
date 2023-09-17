<?php

require 'admin/smtp/PHPMailerAutoload.php';
include("admin/includes/function.php");
include("admin/includes/config.php");

$company_name = "TRADING";
$company_website = "trading.in";

$qry = "SELECT * FROM tbl_settings where id=1";
$result = mysqli_query($conn, $qry);
$settings_row = mysqli_fetch_assoc($result);
$client_msg = $settings_row['client_msg'];
$company_email = $settings_row['mail_from'];


global $id;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['general-inquiry'])) {


    $name = $_POST['name'];
    $send_email = $_POST['email'];
    $phoneNo = isset($_POST['phone_no']) ? $_POST['phone_no'] : 0;
    $companyName = $_POST['company_name'];
    $message = $_POST['message'];

   
    $query = "INSERT INTO tbl_general_inquiry(name, company_name, email, phone_no,message) 
              VALUES ('$name', '$companyName' ,'$send_email', $phoneNo, '$message')";
    $stmt = mysqli_query($conn,$query);

   

  

    
		
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
                                                <h2 style="color:#000;">General Inquiry</h2>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>Name :- ' . $name . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Email Id :- ' . $send_email . '</td>    
                                        </tr>
                                        <tr>
                                            <td>Phone No :- ' . $phoneNo . '</td>    
                                        </tr>   
                                        <tr>
                                            <td>Company Name :- '.$companyName.'</td>    
                                        </tr>
                                        
                                        <tr>
                                            <td>Message :- '.$message.'</td>    
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
        $subject ="General Inquiry";
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
    	$mail->SetFrom($send_email,$name,true);
    	$mail->Subject = $subject;
    	$mail->Body =$html;
    	$mail->AddAddress($company_email);
    // 	$mail->AddReplyTo("amee.rndtechnosoft@gmail.com", $name);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    
    	if(!$mail->Send()){
    		echo $mail->ErrorInfo;
    	}else{
    	  echo "<script type='text/javascript'>window.location.href='thank-you.php';</script>";
       }
 
    
} 
?>