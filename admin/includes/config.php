<?php
error_reporting(0);
ini_set('display_errors', 0);
ob_start();
session_start();
    
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost'); //host name depends on server
DEFINE('DB_NAME', 'rndtd_trading_db1.6');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("connection lost" . mysqli_connect_errno());
}

mysqli_set_charset($conn, 'utf8');

	//Settings
	$setting_qry="SELECT * FROM tbl_settings where id=1";
    $setting_result=mysqli_query($conn,$setting_qry);
    $settings_details=mysqli_fetch_assoc($setting_result);

    

    define("APP_NAME",$settings_details['app_name']);
    define("APP_LOGO",$settings_details['app_logo']);
	define("APP_ICON",$settings_details['app_icon']);
	define("APP_EMAIL",$settings_details['app_email']);
	define("APP_WEBSITE",$settings_details['app_website']);

?>