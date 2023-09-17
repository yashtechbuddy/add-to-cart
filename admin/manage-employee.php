 <?php
    include 'includes/header.php';
    // include 'includes/config.php';
    if (isset($_POST['del'])) {
        $del = $_POST['uid'];


        deleteRecord('tbl_user', 'id=' . $del);
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
                         <h4>Employess</h4>
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
                                 <a href="add-employee.php" class="btn_1">Add New</a>
                             </div>
                         </div>
                     </div>
                     <div class="QA_table ">

                         <table class="table lms_table_active">
                             <thead>
                                 <tr>
                                     <th scope="col">Sr No</th>
                                     <th scope="col">Name</th>
                                     <th scope="col">Department</th>
                                     <th scope="col">role</th>
                                     <!-- <th scope="col"></th> -->
                                     <!-- <th scope="col">Price</th> -->
                                     <th scope="col">Status</th>
                                     <th scope="col">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $sql = 'SELECT tbl_user.*, tbl_user.id as uid, tbl_dept.name as deptname, tbl_role.name as rolename
                                    FROM tbl_user
                                    JOIN tbl_dept ON tbl_user.dept_id = tbl_dept.id
                                    JOIN tbl_role ON tbl_user.role_id = tbl_role.id
                                    WHERE tbl_user.id != 1';
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $cno = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {


                                    ?>
                                 <tr>
                                     <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                     <td><?php echo $row['name'] ?></td>
                                     <td><?php echo $row['deptname']  ?></td>
                                     <td><?php echo $row['rolename']  ?></td>
                                     <td>
                                         <div class="form-check form-switch">
                                             <input class="form-check-input" <?php if ($row['emp_status'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?> type="checkbox"
                                                 role="switch" id="status"
                                                 onclick="toggleStatus('tbl_user','emp_status',<?php echo $row['uid']; ?>);">
                                             <label class="form-check-label" for="status"></label>
                                         </div>
                                     
                                     </td>
                                     <td>

                                         <!-- visiblity -->
                                         <!-- <input type="hidden" value="<?php echo $row['uid'] ?>" />
                                                 <button type="submit" name="status" id="status" class="fas fa-eye text-success border border-0 bg-white"> -->

                                         <form class="d-inline" action="manage-employee.php" method="post" onsubmit="return confirm('Are you sure you want to delete this?');">
                                             <!-- delete -->
                                             <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>" />
                                             <button type="submit" name="del" id=""
                                                 class="fas fa-trash-alt text-danger border border-0 bg-white">
                                         </form>&nbsp&nbsp
                                         <form class="d-inline" action="update-employee.php" method="post">
                                             <!-- update -->
                                             <input type="hidden" value="<?php echo $row['uid'] ?>" name="uid" />
                                             <button type="submit" name="update-employee" id=""
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