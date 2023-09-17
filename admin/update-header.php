<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['update-page'])) {
             
            $pageId = $_POST['id'];
            $pageName = $_POST['pageName'];
            $pageLink = $_POST['pageLink'];
            $visibility = $_POST['visibility'] ;

            $query = "UPDATE pagevisibility SET page_name= '".$pageName."' ,page_link= '".$pageLink."' , visibility= '".$visibility."' WHERE id = '".$pageId."'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script type='text/javascript'>alert('updated!');</script>";
                echo '<script>window.location.href = "header-setting.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
                echo '<script>window.location.href = "header-setting.php";</script>';
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
                        <h4>Update Page Info</h4>
                    </div>
                    <?php if(isset($_GET['update-header'])) { 
                           $hid = $_GET['hid'];
                           $Select = "SELECT * FROM `pagevisibility`  WHERE id = $hid ";
                           if ($result = mysqli_query($conn, $Select)) {
                               if (mysqli_num_rows($result) > 0) {
                                   while ($rows = mysqli_fetch_assoc($result)) {
   
                                   
     
                        ?>
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="pageName" class="form-label">Page Name</label>
                                <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                <input type="text" class="form-control" id="pageName" aria-describedby="pageName"
                                    name="pageName" value="<?php echo $rows['page_name'] ?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="pageLink" class="form-label">Page link </label>
                                <input type="text" class="form-control" id="pageLink" aria-describedby="pageLink"
                                    name="pageLink" value="<?php echo $rows['page_link'] ?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="pageLink" class="form-label">Visibility</label><br>
                                <select class="form-control dropdown" id="visibility" name="visibility">
                                    <?php 
                                                if($rows['visibility'] == 1){
                                                    echo "<option selected='' value='1' id='visible' name='visibility'>Enable</option>";
                                                }else{ ?>
                                    <option value="2" id="invisible" name="visibility">Disable</option>
                                    <?php } ?>

                                    ?>



                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="update-page"
                            name="update-page">Submit</button>

                    </form>
                    <?php
                    }
                } else{
                    echo '<script>window.location.href = "header-setting.php";</script>';
                }
                }
                }?>
                    <!-- start form New Category -->

                    <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>