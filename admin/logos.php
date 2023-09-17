<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
if (isset($_POST['favicon'])) {
    if ($_FILES['favicon_logo']['name'] != "") {

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_logo WHERE id=1');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['favicon_logo'] != "") {
            unlink('images/icons/favicon/' . $img_res_row['favicon_logo']);
        }

        $logo = "Logo-" . rand(0, 99999) . "_" . $_FILES['favicon_logo']['name'];
        $tpath1 = 'images/icons/favicon/' . $logo;
        move_uploaded_file($_FILES["favicon_logo"]["tmp_name"], $tpath1);

        $data = array(
            'favicon_logo'  =>  $logo
        );
    }

    $settings_edit = Update('tbl_logo', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "logos.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "logos.php";</script>';
    }
}

if (isset($_POST['header'])) {
    if ($_FILES['header_logo']['name'] != "") {

        $img_res = mysqli_query($conn, 'SELECT * FROM tbl_logo WHERE id=1');
        $img_res_row = mysqli_fetch_assoc($img_res);

        if ($img_res_row['header_logo'] != "") {
            unlink('images/icons/favicon/' . $img_res_row['header_logo']);
        }

        $logo = "Logo-" . rand(0, 99999) . "_" . $_FILES['header_logo']['name'];
        $tpath1 = 'images/icons/favicon/' . $logo;
        move_uploaded_file($_FILES["header_logo"]["tmp_name"], $tpath1);

        $data = array(
            'header_logo'  =>  $logo
        );
    }

    $settings_edit = Update('tbl_logo', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "logos.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "logos.php";</script>';
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
                        <h4>Logos</h4>
                    </div>
                    <?php $select = "SELECT * FROM tbl_logo WHERE id=1";
                    $footer = mysqli_query($conn, $select);
                    $data = mysqli_fetch_assoc($footer);
                    ?>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="container row">
                            <div class="col-md-6 mt-3">
                                <form method="post" class="" enctype="multipart/form-data">
                                    <label for="favicon_logo">Favicon logo :-</label>
                                    <div class="border p-3 mt-2 mb-2">
                                        <img src="images/icons/favicon/<?php echo $data['favicon_logo'] ?>" alt="<?php echo $data['fav_alt']; ?>" class="border" name="logo" />
                                        <input type="file" name="favicon_logo" id="favicon_logo" class="mt-2" required>

                                        <!-- <br> Descirption: <input type="text" name="footer_logo" id="footer_logo" class="mt-2"><br> -->
                                    </div>
                                    <button type="submit" name="favicon" class="btn btn-primary" class="mt-2">Update</button>
                                </form>
                            </div>
                            <div class="col-md-6 mt-3">
                                <form method="post" class="" enctype="multipart/form-data">
                                    <label for="header_logo">Header logo :-</label>
                                    <div class="border p-3 mt-2 mb-2">
                                        <img src="images/icons/header/<?php echo $data['header_logo'] ?>" alt="<?php echo $data['header_alt']; ?>" class="border" />
                                        <input type="file" name="header_logo" id="header_logo" class="mt-2" required>

                                        <!-- <br> Descirption: <input type="text" name="footer_logo" id="footer_logo" class="mt-2"><br> -->
                                    </div>
                                    <button type="submit" name="header" class="btn btn-primary" class="mt-2">Update</button>
                                </form>
                            </div>

                            <!-- <div class="col-md-4 mt-3">
                                <form method="post" class="">
                                    <label for="footer_logo">Footer logo :-</label>
                                    <div class="border p-3 mt-2 mb-2">
                                        <img src="images/footer/<?php echo $data['footer_logo'] ?>" alt="<?php echo $data['footer_alt']; ?>" class="border" />
                                        <input type="file" name="footer_logo" id="footer_logo" class="mt-2" required> -->

                            <!-- <br> Descirption: <input type="text" name="footer_logo" id="footer_logo" class="mt-2"><br> -->
                            <!-- </div>
                                    <button type="submit" name="footer" class="btn btn-primary" class="mt-2">Update</button>
                                </form>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>