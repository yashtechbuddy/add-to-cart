<?php
include 'includes/header.php';
// include 'includes/config.php';
if (isset($_POST['delete'])) {
    $del = $_POST['id'];

    deleteRecord('tbl_blog', 'id=' . $del);
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
                        <h4>Blogs</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="add-blog.php?add=yes" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Blog Title</th>
                                    <th scope="col">Blog Image</th>
                                     <th scope="col">Date</th> 
                                     <th scope="col">Views</th> 
                                    <!-- <th scope="col">Price</th> -->
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM tbl_blog ';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr id="<?php echo $row['id'] ?>">
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>
                                            <td><?php echo $row['title']  ?></td>
                                            <td><?php if($row['image']!=""){?>
                        						<img height="50" width="50" style="object-fit:cover;" src="images/blog/<?php echo $row['image'];?>" />
                            				    <?php }else{ ?><img height="50" width="50" style="object-fit:cover;" src="images/add-image.png" />
                            					<?php } ?>  
                        					</td>
                        					<td><?php echo $row['create_date']; ?></td>
                        					<td><?php echo $row['no_of_click']; ?></td>
                                            <td>

                                                <!-- visiblity -->
                                                <!-- <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                                <form class="d-inline" method="post">
                                                    <!-- delete -->
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                                    <button type="submit" name="delete" id="" class="fas fa-trash-alt text-danger border border-0 bg-white" onclick="alert('Are you sure you want to delete?')">
                                                </form>&nbsp
                                                <form class="d-inline" action="add-blog.php" method="get">
                                                    <!-- update -->
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="edit_id" />
                                                    <button type="submit" class="fas fa-edit  border border-0 bg-white">
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