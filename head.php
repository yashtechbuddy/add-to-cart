<!DOCTYPE html>
<html lang="en-US">
    
<?php include 'config.php' ?>
<?php 
session_start(); 
// session_destroy();
// unset($_SESSION['cart']);
error_reporting(E_ALL);
ini_set('display_error',1);
include 'function.php';
$curPageName;
if(isset($_SESSION['cart'])){
    $count = COUNT($_SESSION['cart']) ;
   }

   $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
   
?>

<?php 
$pageName = $_SERVER['PHP_SELF'];


// Use basename() to extract the filename from the path
$currentPage = basename($pageName);

            $page_status="false";
			$path="";
			
			//Get file name
			$currentFile = $_SERVER["SCRIPT_NAME"];
			$parts = Explode('/', $currentFile);
			$currentFile = $parts[count($parts) - 1];       
			$current_page=$currentFile;
			
			$seo_qry = $db->query("SELECT * FROM tbl_meta_tag where page_name='".$currentFile."'");
			$seo_row =  $seo_qry->fetch();
			
			$page_result = $seo_qry;

            $qry = $db->query("SELECT * FROM tbl_settings where id=1");
			$header_row =  $qry->fetch();
			
?>

<?php 
		//if folder is open or not
		if($seo_row['page_type']=="blog")
		{
			$page_status="true";
			$path="../";
		}
	?>

<?php define("PAGE_BANNER_IMAGE",$seo_row['banner_image']); ?>
<?php define("PAGE_BANNER_ALT_TAG",$seo_row['alt_tag']); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?php echo $seo_row['meta_title']; ?> | TRADING</title>
	<meta name="description" content="<?php echo $seo_row['meta_desc']; ?>" />
	<meta name="keywords" content="<?php echo $seo_row['meta_keyword']; ?>" />
	<link rel="author" href="<?php echo $path;?><?php echo $seo_row['meta_author']; ?>" title="RnD Technosoft" />
	<link rel="publisher" href="<?php echo $path;?><?php echo $seo_row['meta_publisher']; ?>" title="RnD Technosoft"  />
	<link rel="canonical" href="<?php echo $path;?><?php echo $seo_row['meta_canonical']; ?>" />
	<meta property="og:url" content="<?php echo $seo_row['meta_url']; ?>" />
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $seo_row['meta_title']; ?>" />
	<meta property="og:description" content="<?php echo $seo_row['meta_desc']; ?>" />
	<meta property="og:image" content="<?php echo $seo_row['meta_image']; ?>" />
	<meta name="language" content="<?php echo $seo_row['meta_language']; ?>" />
	<meta name="revisit-after" content="<?php echo $seo_row['meta_revisit']; ?>" />
	<meta name="owner" content="<?php echo $seo_row['meta_owner']; ?>"/>
	<meta name="copyright" content="<?php echo $seo_row['meta_copyright']; ?>" />
	<meta name="contact_addr" content="<?php echo $seo_row['meta_contact_addr']; ?>"/>
	<meta http-equiv="Expires" content="<?php echo $seo_row['meta_expires']; ?>" />
	<meta name="google-site-verification" content="<?php echo $seo_row['meta_google_verification']; ?>" />
	<meta name="p:domain_verify" content="<?php echo $seo_row['meta_domain_verification']; ?>" />
	<meta name="norton-safeweb-site-verification" content="<?php echo $seo_row['meta_safeweb_verification']; ?>" />
	<meta http-equiv="Content-Type" content="<?php echo $seo_row['meta_content_type']; ?>" />
	<meta name="rating" content="<?php echo $seo_row['meta_rating']; ?>" />
	<meta name="robots" content="<?php echo $seo_row['meta_robots']; ?>"/>
	<meta name="googlebot" content="<?php echo $seo_row['meta_googlebot']; ?>" />
	<meta name="distribution" content="<?php echo $seo_row['meta_distribution']; ?>" />
	<meta name="classification" content="<?php echo $seo_row['meta_classification']; ?>"/>
	<meta http-equiv="reply-to" content="<?php echo $seo_row['meta_reply']; ?>"/>
    <!-- Fav Icon -->
    <link rel="icon" href="<?php echo $path;?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Fav Icon -->
    <!-- Google Fonts -->
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&amp;subset=latin%2Clatin-ext'
        type='text/css' media='all' />
    <!-- Google Fonts -->
    <!-- Style -->
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/owl.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/swiper.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/jquery.fancybox.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/icomoon.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/scss/elements/theme-css.css' type='text/css' media='all' />
    <link rel='stylesheet' id="creote-color-switcher-css" href='assets/css/scss/elements/color-switcher/color.css'
        type='text/css' media='all' />
    <!-- Style-->
    <!----woocommerce---->
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/woocommerce-layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo $path;?>assets/css/woocommerce.css' type='text/css' media='all' />
    <!----woocommerce---->

    <!-- modal for login  -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="defaultForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" id="defaultForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Login</button>
                </div>
            </div>
        </div>
    </div>

<style>
    .image-container {
  position: relative;
  display: inline-block;
}

.dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  display: none;
}

.image-container:hover .dropdown {
  display: block;
}

float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
</head>
