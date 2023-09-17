<?php
include 'includes/header.php';
include 'includes/side-bar.php';
include 'includes/top-bar.php';

?>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center" id='main'>
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="">
                            <!-- count class for count -->
                            <div class="col-12">
                                <div class="quick_activity_wrap ">
                                    <div class="single_quick_activity">
                                        <h4>Products</h4>
                                        <h3> <span class=""><?php
                                                            $sup_id = $_SESSION['supplier_data']['id'];
                                                            $SelectUser = "SELECT COUNT(*) as TOTALPRODUCT FROM tbl_supplier_products WHERE id = $sup_id";
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            echo $row['TOTALPRODUCT'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>tot Inqeury</h4>
                                        <h3> <span class=""><?php
                                                            $sup_id = $_SESSION['supplier_data']['id'];
                                                            $SelectUser = "SELECT COUNT(*) as TOTALPRODUCT FROM tbl_supplier_products WHERE id = $sup_id";
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            echo $row['TOTALPRODUCT'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
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