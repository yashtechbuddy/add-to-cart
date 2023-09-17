<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['about_us_page'])) {
    if ($_FILES['img']['name'] != "") {

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_footer_setting WHERE id=1');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['img'] != "") {
            unlink('images/about-us/' . $img_res_row['img']);
        }

        $img = "about-" . rand(0, 99999) . "_" . $_FILES['img']['name'];
        $tpath1 = 'images/about-us/' . $img;
        move_uploaded_file($_FILES["img"]["tmp_name"], $tpath1);

        $data = array(
            'title'  =>  $_POST['title'],
            'small_title'  =>  $_POST['small_title'],
            'image'   =>  $img,
            'alt_tag'  =>  $_POST['alt_tag'],
            'description'  =>  addslashes($_POST['description'])
        );
    } else {
        $data = array(
            'title'  =>  $_POST['title'],
            'small_title'  =>  $_POST['small_title'],
            'alt_tag'  =>  $_POST['alt_tag'],
            'description'  =>  addslashes($_POST['description'])
        );
    }

    $settings_edit = Update('tbl_about_us', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "about-us.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "about-us.php";</script>';
    }
}


?>
<!--add-employees -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
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
                        <h4>About-us</h4>
                    </div>
                    <?php $select = "SELECT * FROM tbl_about_us";
                    $aboutus = mysqli_query($conn, $select);
                    $data = mysqli_fetch_assoc($aboutus);
                    ?>
                    <div class="col-md-12 col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified fs-6" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">About us</button>
                                    </li>


                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="" name="settings_from" method="post" enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="name" class="col-sm-3 col-form-label">Title :-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                    <input class="form-control" type="text" name="title" value="<?php echo $data['title']; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="img" class="col-sm-3 col-form-label">Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="img" id="fileupload">
                                                        <img style="object-fit:cover;" src="images/about-us/<?php echo $data['image']; ?>" alt="about-us-image" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter about us image Alternate text" title="Enter about us Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">Short title :-</label>
                                                <div class="col-sm-9">

                                                    <input class="form-control" type="text" name="small_title" value="<?php echo $data['small_title']; ?>">

                                                </div>
                                            </div>
                                            <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">About Us Description :-</label>
                                                <div class="col-sm-9">

                                                    <textarea class="form-control" id="tinymce-example" rows="10" name="description"><?php echo $data['description']; ?></textarea>

                                                </div>
                                            </div>


                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="about_us_page" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>