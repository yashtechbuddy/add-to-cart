<!DOCTYPE html>
<html lang="en-US">
    
<?php include 'config.php' ?>
<?php 
session_start(); 
// session_destroy();
// unset($_SESSION['cart']);
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
			
// 			$seo_qry = $db->query("SELECT * FROM tbl_meta_tag where page_name='".$currentFile."'");
// 			$seo_row =  $seo_qry->fetch();
			
// 			$page_result = $seo_qry;

//             $qry = $db->query("SELECT * FROM tbl_header_setting where id=1");
// 			$header_row =  $qry->fetch();
			
?>
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Trading</title>
    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Fav Icon -->
    <!-- Google Fonts -->
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&amp;subset=latin%2Clatin-ext'
        type='text/css' media='all' />
    <!-- Google Fonts -->
    <!-- Style -->
    <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/owl.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/swiper.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/jquery.fancybox.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/icomoon.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/scss/elements/theme-css.css' type='text/css' media='all' />
    <link rel='stylesheet' id="creote-color-switcher-css" href='assets/css/scss/elements/color-switcher/color.css'
        type='text/css' media='all' />
    <!-- Style-->
    <!----woocommerce---->
    <link rel='stylesheet' href='assets/css/woocommerce-layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/woocommerce.css' type='text/css' media='all' />
    <!----woocommerce---->


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
</style>
</head>