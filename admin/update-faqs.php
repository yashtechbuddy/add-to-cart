<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['upfaqscust'])) {

    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $question = mysqli_real_escape_string($conn, $question);
    $answer = mysqli_real_escape_string($conn, $answer);
      
            $query = "UPDATE tbl_faqs_customer SET question = '$question' , answer='$answer' where id = $id";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script type='text/javascript'>alert('updatd!');</script>";
                echo '<script>window.location.href = "faqs-customer.php";</script>';
            } 
  

}

if (isset($_POST['upfaqssup'])) {

    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $question = mysqli_real_escape_string($conn, $question);
    $answer = mysqli_real_escape_string($conn, $answer);
   

      
            $query = "UPDATE tbl_faqs_supplier SET question = '$question' , answer='$answer' where id = $id";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script type='text/javascript'>alert('updatd!');</script>";
                echo '<script>window.location.href = "faqs-supplier.php";</script>';
            } 
  

}

if (isset($_POST['upfaqssup'])) {

    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    // Specify the directory to which you want to save the uploaded file

      
    $query = "UPDATE tbl_faqs_supplier SET question = '$question' , answer='$answer' where id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>alert('updatd!');</script>";
        echo '<script>window.location.href = "faqs-customer.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
        echo '<script>window.location.href = "faqs-customer.php";</script>';
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
                        <h4>Add FAQs</h4>
                    </div>
                    <!-- start form New Category -->

                    <form class="" method="post" enctype="multipart/form-data">
                        <?php
    if (isset($_GET['update-faqs-cust']) || $_GET['update-faqs-sup']) {
        if(isset($_GET['update-faqs-cust'])){
            $faqsid = $_GET['fcid'];
            $Select = "SELECT * FROM tbl_faqs_customer WHERE id = $faqsid ";

            if ($result = mysqli_query($conn, $Select)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <input type="hidden" name="id" value="<?php echo  $faqsid; ?>">
                                <label for="question" class="form-label">Question</label>
                                <textarea class="form-control" id="question" aria-describedby="question" name="question"
                                    required cols="30" rows="2"><?php echo $row['question'] ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="answer" class="form-label">Answer </label>
                                <textarea class="form-control" id="answer" aria-describedby="answer" name="answer"
                                    required cols="30" rows="6"><?php echo $row['answer'] ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="faqs" name="upfaqscust">update</button>
                        <?php
                    }
        }}}elseif ($_GET['update-faqs-sup'] == 'sup') {

            $faqsid = $_GET['fsid'];
            $Select = "SELECT * FROM tbl_faqs_supplier WHERE id = $faqsid ";

            if ($result = mysqli_query($conn, $Select)) {

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                            <input type="hidden" name="id" value="<?php echo  $faqsid; ?>">
                                <label for="question" class="form-label">Question</label>
                                <textarea class="form-control" id="question" aria-describedby="question" name="question"
                                    required cols="30" rows="2"><?php echo $row['question'] ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" id="answer" aria-describedby="answer" name="answer"
                                    required cols="30" rows="6"><?php echo $row['answer'] ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="faqs" name="upfaqssup">update</button>
                        <?php
                    }
                }
            }
        }else {
            echo "<script type='text/javascript'>alert('Something went Wrongh!');</script>";
            echo '<script>window.location.href = "home.php";</script>';
        }
       
       
    } else {
        echo '<script>window.location.href = "index.php";</script>';
    }
       ?>
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