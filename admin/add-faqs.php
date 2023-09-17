<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['addfaqCust'])) {

    
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    // Specify the directory to which you want to save the uploaded file

      
            $query = "INSERT INTO tbl_faqs_customer(question,answer) VALUES ('$question',' $answer')";
            $result = mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script type='text/javascript'>alert('Inserted!');</script>";
                echo '<script>window.location.href = "faqs-customer.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
                echo '<script>window.location.href = "faqs-customer.php";</script>';
            }
  

}

if (isset($_POST['addfaqsup'])) {

    
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    // Specify the directory to which you want to save the uploaded file

      
            $query = "INSERT INTO tbl_faqs_supplier(question,answer) VALUES ('$question',' $answer')";
            $result = mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script type='text/javascript'>alert('Inserted!');</script>";
                echo '<script>window.location.href = "faqs-supplier.php";</script>';
            } else {
                echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
                echo '<script>window.location.href = "faqs-supplier.php";</script>';
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
                        <h4>Add FAQs</h4>
                    </div>
                    <!-- start form New Category -->

                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="question" class="form-label">Question</label>
                                <!-- <input type="text" class="form-control" id="question" aria-describedby="question"
                                    name="question" required> -->

                                <textarea class="form-control" id="question" aria-describedby="question" name="question"
                                    required cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="answer" class="form-label">Answer </label>
                                <!-- <textarea type="text" class="form-control" id="answer" aria-describedby="answer"
                                    name="answer" required> -->
                                <textarea class="form-control" id="answer" aria-describedby="answer" name="answer"
                                    required cols="30" rows="6"></textarea>
                            </div>
                        </div>
                        <?php if(isset($_GET['cat']) &&  $_GET['cat']== 'cust'){?>
                        <button type="submit" class="btn btn-primary" value="faqs" name="addfaqCust">Add</button>

                        <?php }else{ ?>
                        <button type="submit" class="btn btn-primary" value="faqs" name="addfaqsup">Add</button>
                        <?php } ?>

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