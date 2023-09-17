<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['about_us_page'])) {
    if ($_FILES['logo']['name'] != "" && $_FILES['background_image']['name'] != "") {

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_footer_setting WHERE id=1');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['logo'] != "") {
            unlink('images/footer/' . $img_res_row['logo']);
        }

        $logo = "Logo-" . rand(0, 99999) . "_" . $_FILES['logo']['name'];
        $tpath1 = 'images/footer/' . $logo;
        move_uploaded_file($_FILES["logo"]["tmp_name"], $tpath1);
        

        if ($img_res_row['background_image'] != "") {
            unlink('images/footer/' . $img_res_row['background_image']);
        }

        $background_image = "background_image-" . rand(0, 99999) . "_" . $_FILES['background_image']['name'];
        $tpath1 = 'images/footer/' . $background_image;
        move_uploaded_file($_FILES["background_image"]["tmp_name"], $tpath1);

        $data = array(
            'name'  =>  $_POST['name'],
            'logo'  =>  $logo,
            'alt_tag'  =>  $_POST['alt_tag'],
            'background_image'  =>  $background_image,
            'alt_tag1'  =>  $_POST['alt_tag1'],
            'about_us_des'  =>  addslashes($_POST['about_us'])
        );
    }else if($_FILES['logo']['name'] != ""){
        
           $img_res = mysqli_query($conn, 'SELECT * FROM tbl_footer_setting WHERE id=1');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['logo'] != "") {
            unlink('images/footer/' . $img_res_row['logo']);
        }

        $logo = "Logo-" . rand(0, 99999) . "_" . $_FILES['logo']['name'];
        $tpath1 = 'images/footer/' . $logo;
        move_uploaded_file($_FILES["logo"]["tmp_name"], $tpath1);
        
          $data = array(
            'name'  =>  $_POST['name'],
            'logo'  =>  $logo,
            'alt_tag'  =>  $_POST['alt_tag'],
            'about_us_des'  =>  addslashes($_POST['about_us'])
        );
        
    }else if($_FILES['background_image']['name'] != ""){
        
         if ($img_res_row['background_image'] != "") {
            unlink('images/footer/' . $img_res_row['background_image']);
        }

        $background_image = "background_image-" . rand(0, 99999) . "_" . $_FILES['background_image']['name'];
        $tpath1 = 'images/footer/' . $background_image;
        move_uploaded_file($_FILES["background_image"]["tmp_name"], $tpath1);

        $data = array(
            'name'  =>  $_POST['name'],
            'background_image'  =>  $background_image,
            'alt_tag1'  =>  $_POST['alt_tag1'],
            'about_us_des'  =>  addslashes($_POST['about_us'])
        );
    }else {
        $data = array(
            'name'  =>  $_POST['name'],
            'alt_tag'  =>  $_POST['alt_tag'],
            'about_us_des'  =>  addslashes($_POST['about_us'])
        );
    }

    $settings_edit = Update('tbl_footer_setting', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "footer-setting.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "footer-setting.php";</script>';
    }
}

if (isset($_POST['social_link'])) {

    $data = array(
        'facebook_link'  =>  $_POST['facebook_link'],
        'twitter_link'  =>  $_POST['twitter_link'],
        'instagram_link'  =>  $_POST['instagram_link'],
        'youtube_link'  =>  $_POST['youtube_link']
    );
    $social_link = Update('tbl_footer_setting', $data, "WHERE id=1");

    if ($social_link) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "footer-setting.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "footer-setting.php";</script>';
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
                        <h4>Footer</h4>
                    </div>
                    <?php $select = "SELECT * FROM tbl_footer_setting";
                    $footer = mysqli_query($conn, $select);
                    $data = mysqli_fetch_assoc($footer);
                    ?>
                    <div class="col-md-12 col-lg-12">
                        <div class="card m-b-30">
                            <? $quiry = "SELECT * from tbl_footer_setting WHERE id=1"; ?>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified fs-6" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">About us</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="social-inlink-tab" data-bs-toggle="tab" data-bs-target="#social-inlink" type="button" role="tab" aria-controls="social-inlink" aria-selected="false">Social Link</button>
                                    </li>

                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="" name="settings_from" method="post" enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="name" class="col-sm-3 col-form-label">Footer Name :-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                    <input class="form-control" type="text" name="name" value="<?php echo $data['name']; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="logo" class="col-sm-3 col-form-label">Footer Logo :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="logo" id="fileupload">
                                                        <img type="logo" style="height:70px;width:100px;" src="images/logo/<?php echo APP_LOGO ?>" alt="logo" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter Favicon Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group mt-4 row">
                                                <label for="logo" class="col-sm-3 col-form-label">Background Image :-</label>
                                                <div class="col-sm-9">
                                                    <div class="fileupload_block">
                                                        <input type="file" name="background_image" id="fileupload">
                                                        <img type="logo" heigth="250" width="300" src="images/footer/<?php echo $data['background_image']; ?>" alt="footer_background_image" />
                                                        <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter background Alternate text" title="Enter background Alternate text here !" value="<?php echo $data['alt_tag1']; ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">About Us Description :-</label>
                                                <div class="col-sm-9">

                                                    <textarea class="form-control" id="tinymce-example" name="about_us"><?php echo $data['about_us_des']; ?></textarea>

                                                </div>
                                            </div>


                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="about_us_page" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade mt-5" id="social-inlink" role="tabpanel" aria-labelledby="social-inlink-tab">
                                        <form action="" name="settings_from" method="post" enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="facebook_link" class="col-sm-3 col-form-label">Facebook Link:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="facebook_link" value="<?php echo $data['facebook_link']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="twitter_link" class="col-sm-3 col-form-label">Twitter Link:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="twitter_link" value="<?php echo $data['twitter_link']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="instagram_link" class="col-sm-3 col-form-label">Instagram Link:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="instagram_link" value="<?php echo $data['instagram_link']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 row">
                                                <label for="youtube_link" class="col-sm-3 col-form-label">Youtube Link:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="youtube_linkme" value="<?php echo $data['youtube_link']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="social_link" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
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