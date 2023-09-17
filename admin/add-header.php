<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['addPage'])) {
     
            $pageName = $_POST['pageName'];
            $pageLink = $_POST['pageLink'];
            $visibility = $_POST['visibility'] ;

            $query = "INSERT INTO pagevisibility(page_name,page_link,visibility) VALUES ('$pageName',' $pageLink',$visibility)";
            $result = mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script type='text/javascript'>alert('Inserted!');</script>";
                echo '<script>window.location.href = "header-setting.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
                echo '<script>window.location.href = "header-setting.php";</script>';
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
                        <h4>Add Page Info</h4>
                    </div>
                    <!-- start form New Category -->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-6">
                                <label for="pageName" class="form-label">Page Name</label>
                                <input type="text" class="form-control" id="pageName" aria-describedby="pageName"
                                    name="pageName" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="pageLink" class="form-label">Page link </label>
                                <input type="text" class="form-control" id="pageLink" aria-describedby="pageLink"
                                    name="pageLink" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="pageLink" class="form-label">Visibility</label><br>
                                <select class="form-control dropdown" id="visibility" name="visibility">
                                <option  selected="" value="1" id="visible" name="visibility">Enable</option>
                                <option  value="2" id="invisible" name="visibility">Disable</option>

                                        <?php
                                        // $sql = 'SELECT * FROM tbl_emp_status';
                                        // $result = mysqli_query($conn, $sql);
                                        // if ($result && mysqli_num_rows($result) > 0) {

                                        //     while ($row = mysqli_fetch_assoc($result)) {
                                        //         if($row['id']==1){
                                        //             echo "<option selected='' id='" . $row['emp_status'] . "' value='" . $row['id'] . "' name='status'>" . $row['emp_status'] . "</option>";
                                        //         }else{
                                        //             echo "<option id='" . $row['emp_status'] . "' value='" . $row['id'] . "' name='status'>" . $row['emp_status'] . "</option>";
                                        //         }
                                                
                                        //     }
                                        // } else {
                                        //     echo 'No data found.';
                                        // }

                                        ?>

                                    </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="addPage" name="addPage">Submit</button>

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