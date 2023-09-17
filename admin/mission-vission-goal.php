<?php
include 'includes/header.php';
// include 'includes/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
if (isset($_POST['mission'])) {
    // if ($_FILES['img']['name'] != "") {

    //     $img_res = mysqli_query($conn, 'SELECT * FROM tbl_about_us WHERE id=1');
    //     $img_res_row = mysqli_fetch_assoc($img_res);

    //     if ($img_res_row['img'] != "") {
    //         unlink('images/about-us/' . $img_res_row['img']);
    //     }

    //     $img = "miss-" . rand(0, 99999) . "_" . $_FILES['img']['name'];
    //     $tpath1 = 'images/about-us/' . $img;
    //     move_uploaded_file($_FILES["img"]["tmp_name"], $tpath1);

    //     $data = array(
    //         'mission_title'  =>  $_POST['mission_title'],
    //         'mission_image'  =>  $img,
    //         'mission_description'  =>  addslashes($_POST['mission_description'])
    //     );
    // } else {
        $data = array(
            'mission_icon'  =>  $_POST['mission_icon'],
            'mission_title'  =>  $_POST['mission_title'],
            'mission_description'  =>  addslashes($_POST['mission_description'])
        );
    // }

    $settings_edit = Update('tbl_about_us', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
    }
}

if (isset($_POST['vission'])) {
    // Validate and sanitize form data as needed
    
    $data = array(
        'vission_icon' => $_POST['vission_icon'],
        'vission_title' => $_POST['vission_title'],
        'vission_description' => addslashes($_POST['vission_description'])
    );

    $settings_edit = Update('tbl_about_us', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
    }
}


if (isset($_POST['goal'])) {

    // if ($_FILES['img']['name'] != "") {

    //     $img_res = mysqli_query($conn, 'SELECT * FROM tbl_about_us WHERE id=1');
    //     $img_res_row = mysqli_fetch_assoc($img_res);

    //     if ($img_res_row['img'] != "") {
    //         unlink('images/about-us/' . $img_res_row['img']);
    //     }

    //     $img = "goal-" . rand(0, 99999) . "_" . $_FILES['img']['name'];
    //     $tpath1 = 'images/about-us/' . $img;
    //     move_uploaded_file($_FILES["img"]["tmp_name"], $tpath1);

    //     $data = array(
    //         'goals_title'  =>  $_POST['goals_title'],
    //         'goals_image'  =>  $img,
    //         'goals_description'  =>  addslashes($_POST['goals_description'])
    //     );
    // } else {
    
        $data = array(
            'goals_icon' =>  $_POST['goals_icon'],
            'goals_title'  =>  $_POST['goals_title'],
            'goals_description'  =>  addslashes($_POST['goals_description'])
        );
    // }
    $settings_edit = Update('tbl_about_us', $data, "WHERE id=1");

    if ($settings_edit) {
        echo "<script type='text/javascript'>alert('Updated!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('Something went!');</script>";
        echo '<script>window.location.href = "mission-vission-goal.php";</script>';
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
                        <h4>Mission Vission Goals</h4>
                    </div>
                    <?php $select = "SELECT * FROM tbl_about_us";
                    $about_us = mysqli_query($conn, $select);
                    $data = mysqli_fetch_assoc($about_us);
                    ?>
                    <div class="col-md-12 col-lg-12">
                        <div class="card m-b-30">
                            <? $quiry = "SELECT * from tbl_about_us WHERE id=1"; ?>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified fs-6" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="mission-tab" data-bs-toggle="tab"
                                            data-bs-target="#mission" type="button" role="tab" aria-controls="mission"
                                            aria-selected="true">Mission</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="vission-tab" data-bs-toggle="tab"
                                            data-bs-target="#vission" type="button" role="tab" aria-controls="vission"
                                            aria-selected="false">Vission</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="goal-tab" data-bs-toggle="tab"
                                            data-bs-target="#goal" type="button" role="tab" aria-controls="goal"
                                            aria-selected="false">Goal</button>
                                    </li>

                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active mt-5" id="mission" role="tabpanel"
                                        aria-labelledby="mission-tab">
                                        <form action="" name="settings_from" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="name" class="col-sm-3 col-form-label">Mission
                                                    Title:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <input class="form-control" type="text" name="mission_title"
                                                        value="<?php echo $data['mission_title']; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="img" class="col-sm-3 col-form-label">Icon :-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="mission_icon"
                                                        value="<?php echo $data['mission_icon']; ?>">
                                                    <!--<div class="fileupload_block">-->
                                                    <!--    <input type="file" name="img" id="fileupload">-->
                                                    <!--    <img style="object-fit:cover;"-->
                                                    <!--        src="images/about-us/<?php echo $data['mission_image']; ?>"-->
                                                    <!--        alt="mission_image" />-->
                                                        <!-- <input type="text" name="img" id="alt_tag" placeholder="Enter image Alternate text" title="Enter about us Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" /> -->
                                                    <!--</div>-->
                                                </div>
                                            </div>

                                            <!-- <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">Short title :-</label>
                                                <div class="col-sm-9">

                                                    <input class="form-control" type="text" name="name" value="<?php echo $data['small_title']; ?>">

                                                </div>
                                            </div> -->
                                            <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">Mission
                                                    Description:-</label>
                                                <div class="col-sm-9">

                                                    <textarea rows="10" class="form-control" id="tinymce-example"
                                                        name="mission_description"><?php echo $data['mission_description']; ?></textarea>

                                                </div>
                                            </div>


                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="mission" class="btn btn-primary"><i
                                                            class="feather icon-send mr-2"></i>Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade mt-5" id="vission" role="tabpanel"
                                        aria-labelledby="vission-tab">
                                        <form action="" name="vission_from" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="vission_title" class="col-sm-3 col-form-label">Vission
                                                    Title:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <input class="form-control" type="text" name="vission_title"
                                                        value="<?php echo $data['vission_title']; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="img" class="col-sm-3 col-form-label">Icon :-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="vission_icon"
                                                        value="<?php echo $data['vission_icon']; ?>">
                                                    <!--<div class="fileupload_block">-->
                                                    <!--    <input type="file" name="img" id="fileupload">-->
                                                    <!--    <img style="object-fit:cover;"-->
                                                    <!--        src="images/about-us/<?php echo $data['vission_image']; ?>"-->
                                                    <!--        alt="vission_image" />-->
                                                        <!-- <input type="text" name="img" id="alt_tag" placeholder="Enter image Alternate text" title="Enter about us Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" /> -->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            
                                            <!--<div class="form-group mt-4 row">-->
                                            <!--    <label for="img" class="col-sm-3 col-form-label">Icon :-</label>-->
                                            <!--    <div class="col-sm-9">-->
                                            <!--        <div class="fileupload_block">-->
                                            <!--            <input type="file" name="img" id="fileupload">-->
                                            <!--            <img style="object-fit:cover;"-->
                                            <!--                src="images/about-us/<?php echo $data['Icon1']; ?>"-->
                                            <!--                alt="vission_image" />-->
                                                        <!-- <input type="text" name="img" id="alt_tag" placeholder="Enter image Alternate text" title="Enter about us Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" /> -->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                            <!-- <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">Short title :-</label>
                                                <div class="col-sm-9">

                                                    <input class="form-control" type="text" name="name" value="<?php echo $data['small_title']; ?>">

                                                </div>
                                            </div> -->
                                            <div class="form-group mt-4 row">
                                                <label for="vission_description" class="col-sm-3 col-form-label">Vission
                                                    Description:-</label>
                                                <div class="col-sm-9">

                                                    <textarea rows="10" class="form-control" id="tinymce-example"
                                                        name="vission_description"><?php echo $data['vission_description']; ?></textarea>

                                                </div>
                                            </div>


                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="vission" class="btn btn-primary"><i
                                                            class="feather icon-send mr-2"></i>Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade mt-5" id="goal" role="tabpanel"
                                        aria-labelledby="goal-tab">
                                        <form action="" name="settings_from" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group mt-4 row">
                                                <label for="goals_title" class="col-sm-3 col-form-label">Goal
                                                    Title:-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id"
                                                        value="<?php echo $data['id']; ?>">
                                                    <input class="form-control" type="text" name="goals_title"
                                                        value="<?php echo $data['goals_title']; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group mt-4 row">
                                                <label for="img" class="col-sm-3 col-form-label">Icon :-</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="goals_icon"
                                                        value="<?php echo $data['goals_icon']; ?>">
                                                    <!--<div class="fileupload_block">-->
                                                    <!--    <input type="file" name="img" id="fileupload">-->
                                                    <!--    <img style="object-fit:cover;"-->
                                                    <!--        src="images/about-us/<?php echo $data['goals_image']; ?>"-->
                                                    <!--        alt="goals_image" />-->
                                                        <!-- <input type="text" name="img" id="alt_tag" placeholder="Enter image Alternate text" title="Enter about us Alternate text here !" value="<?php echo $data['alt_tag']; ?>" class="form-control" /> -->
                                                    <!--</div>-->
                                                </div>
                                            </div>

                                            <!-- <div class="form-group mt-4 row">
                                                <label for="about_us" class="col-sm-3 col-form-label">Short title :-</label>
                                                <div class="col-sm-9">

                                                    <input class="form-control" type="text" name="name" value="<?php echo $data['small_title']; ?>">

                                                </div>
                                            </div> -->
                                            <div class="form-group mt-4 row">
                                                <label for="goals_description" class="col-sm-3 col-form-label">Goal
                                                    Description:-</label>
                                                <div class="col-sm-9">

                                                    <textarea rows="10" class="form-control" id="tinymce-example"
                                                        name="goals_description"><?php echo $data['goals_description']; ?></textarea>

                                                </div>
                                            </div>


                                            <div class="form-group mt-4 row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="goal" class="btn btn-primary"><i
                                                            class="feather icon-send mr-2"></i>Submit</button>
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