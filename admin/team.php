<?php
include 'includes/header.php';
if (isset($_POST['delTeam'])) {
    $del = $_POST['id'];
    deleteRecord('tbl_team', 'id=' . $del);
}


?>
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
                        <h4>Team</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..."
                                            class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="add-team.php" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT  *  FROM tbl_team';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                <tr>
                                    <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                    <td><?php echo $row['name'] ?></td>
                                    <td><img src="images/team/<?php echo $row['image'] ?>"
                                            alt="TEAM MEMBER IMAGE" style="width:60px;height:60px">
                                    </td>

                                    <td>
                                        <?php echo $row['design'] ?>
                                    </td>
                                    <td>

                                        <!-- visiblity -->
                                        <!-- <input type="hidden" value="<?php echo $row['id'] ?>"  name="catId" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                        <form class="d-inline" method="post">
                                            <!-- delete -->
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id" />
                                            <button type="submit" name="delTeam" id=""
                                                class="fas fa-trash-alt text-danger border border-0 bg-white"
                                                onclick=" return confirm('Are you sure you want to delete this data?')">
                                        </form>&nbsp&nbsp
                                        <form class="d-inline" action="update-team.php" method="post">
                                            <!-- update -->
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id" />
                                            <button type="submit" name="update-team" id=""
                                                class="fas fa-edit  border border-0 bg-white">
                                        </form>

                                    </td>
                                </tr>

                                <?php
                                        $cno++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>